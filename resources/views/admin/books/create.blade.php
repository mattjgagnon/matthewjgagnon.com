@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">{{ isset($book) ? 'Edit Book' : 'Add New Book' }}</h1>

    <form action="{{ isset($book) ? route('admin.books.update', $book->id) : route('admin.books.store') }}" method="POST" class="mt-6 bg-gray-800 p-6 rounded-lg">
        @csrf
        @if(isset($book)) @method('PUT') @endif

        <label class="block text-gray-300">Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}" class="w-full p-2 rounded bg-gray-700 text-white">

        <label class="block text-gray-300 mt-4">Description</label>
        <textarea name="description" class="w-full p-2 rounded bg-gray-700 text-white">{{ old('description', $book->description ?? '') }}</textarea>

        <button type="submit" class="mt-4 bg-darkAccent text-white px-4 py-2 rounded-lg">Save</button>
    </form>
@endsection
