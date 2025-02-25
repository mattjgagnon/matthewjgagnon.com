<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\ChapterFeedback;
use Illuminate\Http\Request;

class ChapterFeedbackController extends Controller
{
    public function store(Request $request, $bookSlug, Chapter $chapter)
    {
        // Fetch the book using its slug
        $book = Book::where('slug', $bookSlug)->firstOrFail();

        // Set words per page (default value if not defined)
        $wordsPerPage = config('reading.words_per_page', 250); // Adjust default if necessary

        // Ensure wordsPerPage is valid
        if ($wordsPerPage <= 0) {
            $wordsPerPage = 250; // Set a sensible default
        }

        // Calculate last page (prevent division by zero)
        $totalWords = str_word_count(strip_tags($chapter->content));
        $lastPage = ($wordsPerPage > 0) ? ceil($totalWords / $wordsPerPage) : 1;

        // Validate the form input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        // Store the feedback
        ChapterFeedback::create([
            'chapter_id' => $chapter->id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('chapters.show', [
            'book' => $book->slug,
            'chapter' => $chapter->id,
            'page' => $lastPage,
        ])->with('success', 'Your feedback has been submitted!');
    }
}
