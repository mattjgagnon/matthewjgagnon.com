@extends('layouts.app')

@section('content')

    <div class="max-w-md mx-auto px-12 py-12 bg-[#FAF3E0] text-gray-900 rounded-lg shadow-lg">
        <h1 class="font-bold text-gold mb-4">{{ $chapter->title }}</h1>

        <div class="relative flex items-center justify-center my-6">
            <div class="w-full border-t-2 border-gold"></div>
            <span class="absolute bg-[#FAF3E0] px-4 text-gold text-xl font-bold">✦</span>
        </div>

        <div class="prose prose-lg leading-loose text-justify tracking-wide">
            <p>
                <span class="drop-cap">{{ Str::substr(strip_tags($chapter->formatted_content), 0, 1) }}</span>
                {!! Str::substr($chapter->formatted_content, 4) !!}
            </p>
        </div>

        <div class="flex justify-between items-center mt-8">
            @if($currentPage > 1)
                @if($prevChapter && $currentPage == 1 + ceil($prevChapter->getTotalWords() / $wordsPerPage))
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $prevChapter->id, 'page' => ceil($prevChapter->getTotalWords() / $wordsPerPage)]) }}" class="text-black px-4 py-2 rounded-lg hover:underline">
                        ⬅ Previous Chapter
                    </a>
                @else
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage - 1]) }}" class="text-black px-4 py-2 rounded-lg hover:underline">
                        ⬅ Previous Page
                    </a>
                @endif
            @endif

            <span class="text-gray-700">Page {{ $currentPage }} of {{ $totalPages }}</span>

            @if($currentPage < $totalPages)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage + 1]) }}" class="text-black px-4 py-2 rounded-lg hover:underline">
                    Next Page ➡
                </a>
            @elseif($nextChapter)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $nextChapter->id, 'page' => 1]) }}" class="text-black px-4 py-2 rounded-lg hover:underline">
                    Next Chapter ➡
                </a>
            @endif
        </div>
    </div>

@endsection
