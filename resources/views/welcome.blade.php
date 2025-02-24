@extends('layouts.app')

@section('content')
    <header class="hero-banner h-96 flex items-center justify-center">
        <div class="relative z-10 px-6 columns-1">
            <h1 class="text-5xl font-bold text-deep drop-shadow-lg leading-relaxed">Epic High Fantasy, <br>One Chapter at a Time</h1>
            <p class="mt-3 text-xl text-gray-900 drop-shadow-md">Step into a world of magic, heroes, and adventure.</p>
            <p class="mt-8"><a href="{{ route('books.index') }}" class="btn-primary text-contrast px-6 py-3 rounded-lg text-lg font-semibold transition">Start the Adventure →</a></p>
        </div>
    </header>

    <main class="max-w-3xl mx-auto py-12 px-6">
        <h2 class="text-4xl text-highlight font-bold">Welcome!</h2>
        <p class="mt-4 text-lg text-gray-300 leading-relaxed">I am an epic high fantasy serial novelist, crafting worlds filled with legendary heroes, mystical creatures, and unforgettable adventures. Follow the journey as new chapters unfold here on this site.</p>

        <div class="mt-8">
            <a href="{{ route('books.index') }}" class="btn-primary text-contrast px-6 py-3 rounded-lg text-lg font-semibold transition">Explore the Books</a>
        </div>
    </main>
@endsection
