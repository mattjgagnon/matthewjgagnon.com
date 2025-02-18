@extends('layouts.app')

@section('content')

    <div class="max-w-md mx-auto px-12 py-12 bg-[#FAF3E0] text-gray-900 rounded-lg shadow-lg">
        <!-- Chapter Title -->
        <h1 class="font-bold text-gold mb-4">{{ $chapter->title }}</h1>

        <!-- Styled Horizontal Rule -->
        <div class="relative flex items-center justify-center my-6">
            <div class="w-full border-t-2 border-gold"></div>
            <span class="absolute bg-[#FAF3E0] px-4 text-gold text-xl font-bold">✦</span>
        </div>

        <!-- Chapter Content -->
        <div class="prose prose-lg leading-loose text-justify tracking-wide">
            <!-- Extract the first letter and wrap it separately for styling -->
            <p>
                <span class="drop-cap">{{ Str::substr(strip_tags($chapter->formatted_content), 0, 1) }}</span>
                {!! Str::substr($chapter->formatted_content, 4) !!}
            </p>
        </div>

        <!-- Back to Book Link -->
        <a href="{{ route('books.show', $chapter->book) }}" class="block mt-6 text-green-600 hover:underline">
            ⬅ Back to Book
        </a>
    </div>

@endsection
