@extends('layouts.app')

@section('content')

    <div class="max-w-md mx-auto px-8 py-12 bg-[#FAF3E0] text-gray-900 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold text-center text-gold mb-4">{{ $chapter->title }}</h1>
        <hr class="border-t-2 border-gold w-3/4 mx-auto mb-6">

        <div class="prose prose-lg leading-loose text-justify">
            <p>
                <span class="drop-cap">{{ Str::substr(strip_tags($content), 0, 1) }}</span>
                {!! Str::substr($content, 1) !!}
            </p>
        </div>

        <div class="flex justify-between items-center mt-8">
            @if($currentPage > 1)
                @if($prevChapter && $currentPage == 1 + ceil($prevChapter->getTotalWords() / $wordsPerPage))
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $prevChapter->id, 'page' => ceil($prevChapter->getTotalWords() / $wordsPerPage)]) }}"
                       class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
                        ⬅ Previous Chapter
                    </a>
                @else
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage - 1]) }}"
                       class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
                        ⬅ Previous Page
                    </a>
                @endif
            @endif

            <span class="text-gray-700">Page {{ $currentPage }} of {{ $totalPages }}</span>

            @if($currentPage < $totalPages)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage + 1]) }}"
                   class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
                    Next Page ➡
                </a>
            @elseif($nextChapter)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $nextChapter->id, 'page' => 1]) }}"
                   class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800">
                    Next Chapter ➡
                </a>
            @endif
        </div>
    </div>

@endsection
