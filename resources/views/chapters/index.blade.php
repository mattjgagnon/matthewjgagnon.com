@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">All Chapters</h1>

    @foreach($chapters as $chapter)
        <div class="mb-4 p-4 bg-gray-800 text-contrast rounded-lg shadow">
            <h2 class="text-xl font-semibold">
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => 1]) }}">
                    {{ $chapter->title }}
                </a>
            </h2>
            <p class="mt-2 text-gray-400">{{ Str::limit($chapter->content, 150) }}</p>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $chapters->links('pagination::tailwind') }}
    </div>
@endsection
