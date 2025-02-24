@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">Edit Chapter</h1>

    <form action="{{ route('admin.chapters.update', $chapter->id) }}" class="mt-6 bg-gray-800 p-6 rounded-lg" method="POST">
        @csrf
        @method('PUT')

        <label class="block text-gray-300">Title</label>
        <input class="w-full p-2 rounded bg-gray-700 text-contrast" type="text" name="title" value="{{ $chapter->title }}" required>

        <label class="block text-gray-300 mt-4">Content</label>
        <textarea name="content" class="w-full h-96 p-4 text-lg resize-y bg-gray-800 text-contrast border border-gray-600 rounded-md" required>{{ $chapter->content }}</textarea>

        <button class="mt-4 btn-primary text-contrast px-4 py-2 rounded-lg" type="submit">Update</button>
    </form>
@endsection
