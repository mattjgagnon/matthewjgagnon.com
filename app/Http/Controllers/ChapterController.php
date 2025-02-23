<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::latest()->paginate(5);
        return view('chapters.index', compact('chapters'));
    }

    public function show(Book $book, Chapter $chapter, Request $request, $page = 1)
    {
        $wordsPerPage = 250; // Words per page
        $page = max(1, (int) $page); // Ensure page is at least 1

        // Get all previous chapters to calculate cumulative page numbers
        $previousChapters = $book->chapters()->where('id', '<', $chapter->id)->orderBy('id')->get();
        $previousWords = $previousChapters->sum(fn($ch) => $ch->getTotalWords());
        $previousPages = ceil($previousWords / $wordsPerPage);

        // Compute current chapter's pagination
        $totalWords = $chapter->getTotalWords();
        $totalPagesInChapter = ceil($totalWords / $wordsPerPage);

        // Calculate actual book-wide page number
        $bookPageNumber = $previousPages + $page;
        $totalBookPages = $previousPages + $totalPagesInChapter;

        // Extract correct content for this page
        $words = preg_split('/\s+/', strip_tags($chapter->formatted_content));
        $start = ($page - 1) * $wordsPerPage - $previousWords;
        $content = implode(' ', array_slice($words, max(0, $start), $wordsPerPage));

        // Find next & previous chapters
        $nextChapter = $book->chapters()->where('id', '>', $chapter->id)->orderBy('id')->first();
        $prevChapter = $book->chapters()->where('id', '<', $chapter->id)->orderBy('id', 'desc')->first();

        return view('chapters.show', [
            'book' => $book,
            'chapter' => $chapter,
            'content' => $content,
            'currentPage' => $bookPageNumber,
            'totalPages' => $totalBookPages,
            'nextChapter' => $nextChapter,
            'prevChapter' => $prevChapter,
            'wordsPerPage' => $wordsPerPage,
        ]);
    }
}
