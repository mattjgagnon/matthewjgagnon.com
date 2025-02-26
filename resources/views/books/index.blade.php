@extends('layouts.app')

@section('content')
    <div class="max-w-sm mx-auto px-12 py-12 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6 text-contrast">All Books</h1>

        @foreach($books as $book)
            <div class="mb-4 p-4 bg-gray-800 text-contrast rounded-lg shadow">
                <h2 class="text-xl font-semibold">
                    <a href="{{ route('books.show', $book) }}" class="text-highlight hover:underline">
                        {{ $book->title }}
                    </a>
                </h2>
                <p class="mt-2 text-gray-400">{{ Str::limit($book->description, 250) }}</p>
            </div>
        @endforeach

        <div class="mt-6">
            {{ $books->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
