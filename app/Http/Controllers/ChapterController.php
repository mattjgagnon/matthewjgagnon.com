<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use League\CommonMark\CommonMarkConverter;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::latest()->paginate(5);
        return view('chapters.index', compact('chapters'));
    }

    public function show(Book $book, Chapter $chapter, Request $request, $page = 1)
    {
        $wordsPerPage = 250;
        $page = max(1, (int) $page);

        $converter = new CommonMarkConverter();
        $formattedContent = $converter->convert($chapter->content);

        $totalWords = str_word_count(strip_tags($formattedContent));
        $totalPagesInChapter = (int) ceil($totalWords / $wordsPerPage);

        $previousChapters = $book->chapters()->where('id', '<', $chapter->id)->orderBy('id')->get();
        $previousWords = $previousChapters->sum(fn($ch) => $ch->getTotalWords());
        $previousPages = (int) ceil($previousWords / $wordsPerPage);

        $bookPageNumber = $previousPages + $page - $previousPages;

        $totalBookPages = $previousPages + $totalPagesInChapter;

        $words = preg_split('/\s+/', strip_tags($formattedContent, '<p><br>'));
        $startIndex = max(0, min(($page - 1 - $previousPages) * $wordsPerPage, count($words) - 1));

        $pagedWords = array_slice($words, $startIndex, $wordsPerPage);
        $pagedContent = count($pagedWords) > 0 ? implode(' ', $pagedWords) : "";

        $nextChapter = $book->chapters()->where('id', '>', $chapter->id)->orderBy('id')->first();
        $prevChapter = $book->chapters()->where('id', '<', $chapter->id)->orderBy('id', 'desc')->first();

        return view('chapters.show', [
            'book' => $book,
            'chapter' => $chapter,
            'content' => $pagedContent,
            'currentPage' => $bookPageNumber,
            'totalPages' => $totalBookPages,
            'nextChapter' => $nextChapter,
            'prevChapter' => $prevChapter,
            'previousPages' => $previousPages,
            'startIndex' => $startIndex,
            'wordsPerPage' => $wordsPerPage,
        ]);
    }
}
