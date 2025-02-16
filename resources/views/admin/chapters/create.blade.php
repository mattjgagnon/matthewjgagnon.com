@extends('layouts.admin')

@section('content')
    <h1>Add New Chapter</h1>

    <form action="{{ route('admin.chapters.store') }}" method="POST">
        @csrf
        <label class="block text-gray-300">Book</label>
        <select name="book_id" class="w-full p-2 rounded bg-gray-700 text-white">
            @foreach(\App\Models\Book::all() as $book)
                <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>

        <label>Title</label>
        <input type="text" name="title" class="form-control" required>

        <label>Content</label>
        <textarea name="content" class="form-control" required></textarea>

        <button type="submit" class="btn btn-success">Save Chapter</button>
    </form>
@endsection
