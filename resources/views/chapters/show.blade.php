@extends('layouts.app')

@section('content')

    <div class="max-w-md mx-auto px-12 py-12 bg-[#FAF3E0] text-gray-900 rounded-lg shadow-lg">

        <!-- Show Header Only If Not First Page -->
        @if ($currentPage > 1)
            <div class="flex justify-between text-sm text-gray-600 mb-4">
                @if ($currentPage % 2 == 0)
                    <!-- Verso (Even Page) -> Show Chapter Title -->
                    <span>{{ $chapter->title }}</span>
                    <span></span> <!-- Keeps alignment -->
                @else
                    <!-- Recto (Odd Page) -> Show Book Title -->
                    <span></span> <!-- Keeps alignment -->
                    <span>{{ $book->title }}</span>
                @endif
            </div>

            <hr class="border-t-2 border-gold w-3/4 mx-auto mb-6">
        @endif

        <!-- Chapter Content -->
        <div class="prose prose-lg leading-loose text-justify">
            <p>
                <span class="drop-cap">{{ Str::substr(strip_tags($content), 0, 1) }}</span>
                {!! Str::substr($content, 1) !!}
            </p>
        </div>

        <!-- Pagination Controls -->
        <div class="flex justify-between items-center mt-8">
            @if($currentPage > 1)
                @if($prevChapter && $currentPage == 1 + ceil($prevChapter->getTotalWords() / $wordsPerPage))
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $prevChapter->id, 'page' => ceil($prevChapter->getTotalWords() / $wordsPerPage)]) }}"
                       class="text-black px-4 py-2 rounded-lg hover:underline">
                        ⬅ Previous Chapter
                    </a>
                @else
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage - 1]) }}"
                       class="text-black px-4 py-2 rounded-lg hover:underline">
                        ⬅ Previous Page
                    </a>
                @endif
            @endif

            <span class="text-gray-700">Page {{ $currentPage }}</span>

            @if($currentPage < $totalPages)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage + 1]) }}"
                   class="text-black px-4 py-2 rounded-lg hover:underline">
                    Next Page ➡
                </a>
            @elseif($nextChapter)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $nextChapter->id, 'page' => 1]) }}"
                   class="text-black px-4 py-2 rounded-lg hover:underline">
                    Next Chapter ➡
                </a>
            @endif
        </div>
    </div>

@endsection
