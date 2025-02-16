@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold text-darkAccent">{{ $chapter->title }}</h1>
    <p class="mt-6 leading-relaxed text-lg text-gray-300">{{ $chapter->content }}</p>

    <a href="{{ route('chapters.index') }}" class="block mt-6 text-darkAccent hover:underline">
        ⬅ Back to Chapters
    </a>
@endsection
