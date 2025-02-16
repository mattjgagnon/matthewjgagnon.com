<?php

namespace App\Http\Controllers;

use App\Models\Chapter;

class ChapterController extends Controller
{
    public function index()
    {
        $chapters = Chapter::latest()->paginate(5);
        return view('chapters.index', compact('chapters'));
    }

    public function show(Chapter $chapter)
    {
        return view('chapters.show', compact('chapter'));
    }
}
