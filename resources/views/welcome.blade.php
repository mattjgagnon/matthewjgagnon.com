@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <header class="relative bg-gray-900 text-center text-white py-16">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10">
            <img src="{{ asset('images/MatthewJGagnonAuthor.webp') }}" alt="MJG Logo" class="mx-auto h-28">
            <h1 class="text-5xl font-bold mt-4 text-gold">Epic High Fantasy, One Chapter at a Time</h1>
            <p class="mt-3 text-lg text-gray-300">Step into a world of magic, heroes, and adventure.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-3xl mx-auto text-center py-12 px-6">
        <h2 class="text-4xl text-gold font-bold">Welcome to MJG Fantasy</h2>
        <p class="mt-4 text-lg text-gray-300 leading-relaxed">
            I am an epic high fantasy serial novelist, crafting worlds filled with legendary heroes,
            mystical creatures, and unforgettable adventures. Follow the journey as new chapters unfold.
        </p>

        <div class="mt-8">
            <a href="{{ route('books.index') }}" class="bg-green-700 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-green-800 transition">
                Explore the Books
            </a>
            <a href="{{ route('chapters.index') }}" class="ml-4 border border-gold text-gold px-6 py-3 rounded-lg text-lg font-semibold hover:bg-gold hover:text-black transition">
                Read the Latest Chapters
            </a>
        </div>
    </main>
@endsection
