@extends('layouts.app')

@section('content')

    <div class="max-w-md mx-auto px-8 py-12 text-gray-300 rounded-lg shadow-lg">
        <!-- Page Title -->
        <h1 class="text-4xl font-bold text-center text-highlight mb-6">About the Author</h1>

        <!-- Gagnon Coat of Arms -->
        <div class="text-center">
            <img src="{{ asset('images/GagnonCoatOfArms.png') }}" alt="Gagnon Coat of Arms"
                 class="mx-auto w-2/3 sm:w-1/2 shadow-lg rounded-lg">
            <p class="mt-2 text-sm text-gray-300">The Gagnon family coat of arms.</p>
        </div>

        <!-- Author Bio -->
        <p class="mt-6 text-lg leading-loose text-justify">
            Matthew J. Gagnon is an author of epic high fantasy, crafting worlds filled with magic, adventure, and deep storytelling.
            With a passion for rich character development and immersive world-building, he seeks to create tales that inspire and entertain.
        </p>

        <p class="mt-4 text-lg leading-loose text-justify">
            This site reflects the same values he holds in his storytelling—offering content that is engaging, meaningful, and respectful
            of family-friendly principles while staying true to the nature of the fantasy genre.
        </p>

        <p class="mt-4 text-lg leading-loose text-justify">
            The Gagnon coat of arms, displayed above, is a symbol of strength, honor, and legacy. It represents the author's deep appreciation for
            heritage and storytelling traditions that have stood the test of time.
        </p>

        <!-- Back to Home -->
        <a href="{{ route('home') }}" class="block mt-6 text-primary-600 hover:underline">
            ⬅ Back to Home
        </a>
    </div>

@endsection
