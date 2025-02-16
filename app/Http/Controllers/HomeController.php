<?php

namespace App\Http\Controllers;

use App\Models\Chapter;

class HomeController extends Controller
{
    public function index()
    {
        $featuredChapter = Chapter::latest()->first();
        return view('welcome', compact('featuredChapter'));
    }
}
