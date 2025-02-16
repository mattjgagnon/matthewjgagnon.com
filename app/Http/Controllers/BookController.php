<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class BookController extends Controller
{
    public function index(): View|Application|Factory
    {
        $books = Book::latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function show(Book $book): View|Application|Factory
    {
        $book->load('chapters');
        return view('books.show', compact('book'));
    }
}
