<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminChapterController extends Controller
{
    public function index(): View|Application|Factory
    {
        $chapters = Chapter::latest()->paginate(10);
        return view('admin.chapters.index', compact('chapters'));
    }

    public function create(): View|Application|Factory
    {
        return view('admin.chapters.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Chapter::create($request->all());

        return redirect()->route('admin.chapters.index')->with('success', 'Chapter created successfully.');
    }

    public function edit(Chapter $chapter): View|Application
    {
        return view('admin.chapters.edit', compact('chapter'));
    }

    public function update(Request $request, Chapter $chapter): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $chapter->update($request->all());

        return redirect()->route('admin.chapters.index')->with('success', 'Chapter updated successfully.');
    }

    public function destroy(Chapter $chapter): RedirectResponse
    {
        $chapter->delete();
        return redirect()->route('admin.chapters.index')->with('success', 'Chapter deleted successfully.');
    }
}
