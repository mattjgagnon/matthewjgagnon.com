@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold text-darkAccent">{{ $book->title }}</h1>
    <p class="mt-6 text-lg text-gray-300">{{ $book->description }}</p>

    <h2 class="text-2xl font-semibold mt-8">Chapters</h2>
    <ul class="mt-4">
        @forelse ($book->chapters as $chapter)
            <li class="mb-2">
                <a href="{{ route('chapters.show', $chapter) }}" class="text-darkAccent hover:underline">
                    {{ $chapter->title }}
                </a>
            </li>
        @empty
            <p class="text-gray-400">No chapters available for this book.</p>
        @endforelse
    </ul>

    <a href="{{ route('books.index') }}" class="block mt-6 text-darkAccent hover:underline">
        ⬅ Back to Books
    </a>
@endsection
