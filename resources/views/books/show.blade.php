@extends('layouts.app')

@section('content')
    <div class="max-w-sm mx-auto px-12 py-12 text-gray-300 rounded-lg shadow-lg">

        <h1 class="text-4xl font-bold">{{ $book->title }}</h1>

        <p class="text-lg mt-4 leading-relaxed text-justify">{{ $book->description }}</p>

        <ul class="mt-4">
            @forelse ($chapters as $chapter)
                <li class="mt-2">
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => 1]) }}"
                       class="text-highlight hover:underline">
                        {{ $chapter->title }}
                    </a>
                </li>
            @empty
                <li class="text-gray-600">No chapters available yet.</li>
            @endforelse
        </ul>

        <a href="{{ route('books.index') }}" class="block mt-6 text-highlight hover:underline">
            ⬅ Back to Books
        </a>
    </div>
@endsection
