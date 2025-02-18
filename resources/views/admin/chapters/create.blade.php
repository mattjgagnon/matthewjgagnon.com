@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">{{ isset($book) ? 'Edit Chapter' : 'Add New Chapter' }}</h1>

    <form action="{{ route('admin.chapters.store') }}" method="POST" class="mt-6 bg-gray-800 p-6 rounded-lg">
        @csrf
        <label class="block text-gray-300 mt-4">Book</label>
        <select name="book_id" class="w-full p-2 rounded bg-gray-700 text-white">
            @foreach(\App\Models\Book::all() as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>

        <label class="block text-gray-300 mt-4">Title</label>
        <input class="w-full p-2 rounded bg-gray-700 text-white" type="text" name="title" required>

        <label class="block text-gray-300 mt-4">Content</label>
        <textarea class="w-full p-2 rounded bg-gray-700 text-white" name="content" required></textarea>

        <button class="mt-4 btn-green text-white px-4 py-2 rounded-lg" type="submit">Save</button>
    </form>
@endsection
