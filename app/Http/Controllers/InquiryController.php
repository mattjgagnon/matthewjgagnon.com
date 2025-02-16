<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function create(): View|Application|Factory
    {
        return view('inquiries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Inquiry::create($request->all());

        return redirect()->route('inquiries.create')->with('success', 'Your inquiry has been submitted.');
    }
}
