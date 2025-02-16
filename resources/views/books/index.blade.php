@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">All Books</h1>

    @foreach($books as $book)
        <div class="mb-4 p-4 bg-gray-800 text-white rounded-lg shadow">
            <h2 class="text-xl font-semibold">
                <a href="{{ route('books.show', $book) }}" class="text-darkAccent hover:underline">
                    {{ $book->title }}
                </a>
            </h2>
            <p class="mt-2 text-gray-400">{{ Str::limit($book->description, 150) }}</p>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $books->links('pagination::tailwind') }}
    </div>
@endsection
