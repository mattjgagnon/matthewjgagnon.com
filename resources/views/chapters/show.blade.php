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

            <div class="relative flex items-center justify-center my-6">
                <div class="w-full border-t-2 border-highlight"></div>
                <span class="absolute px-4 text-deep text-xl font-bold text-highlight">✦</span>
            </div>
        @endif

        <!-- Chapter Content -->
        <div class="prose prose-lg leading-loose text-justify">
            <p>
                @if ($currentPage == 1)
                    <span class="drop-cap">{{ Str::substr(strip_tags($content), 0, 1) }}</span>
                    {!! Str::substr($content, 1) !!}
                @else
                    {!! $content !!}
                @endif
            </p>
        </div>

        <!-- Pagination Controls -->
        <div class="flex justify-between items-center mt-8">
            @if($currentPage > 1)
                @if($prevChapter && $currentPage == 1 + ceil($prevChapter->getTotalWords() / $wordsPerPage))
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $prevChapter->id, 'page' => ceil($prevChapter->getTotalWords() / $wordsPerPage)]) }}"
                       class="text-deep py-2 rounded-lg hover:underline">
                        ⬅ Previous Chapter
                    </a>
                @else
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage - 1]) }}"
                       class="text-deep py-2 rounded-lg hover:underline">
                        ⬅ Previous Page
                    </a>
                @endif
            @endif

            <span class="text-gray-700">{{ $currentPage }}</span>

            @if($currentPage < $totalPages)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => $currentPage + 1]) }}"
                   class="text-deep py-2 rounded-lg hover:underline">
                    Next Page ➡
                </a>
            @elseif($nextChapter)
                <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $nextChapter->id, 'page' => 1]) }}"
                   class="text-deep py-2 rounded-lg hover:underline">
                    Next Chapter ➡
                </a>
            @endif
        </div>

        @if ($currentPage == $totalPages)
            <!-- Feedback Form (Only Shown on Last Page) -->
            <div class="mt-12 p-6 bg-deep text-contrast rounded-lg">
                <h2 class="text-2xl font-bold mb-4">Leave Your Feedback</h2>

                @if(session('success'))
                    <p class="text-green-500 font-bold">{{ session('success') }}</p>
                @endif

                <form action="{{ route('chapter.feedback.store', ['book' => $book->slug, 'chapter' => $chapter->id]) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-highlight">Your Name</label>
                        <input type="text" id="name" name="name" required class="w-full p-2 border border-highlight rounded bg-contrast text-deep">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-highlight">Your Email (optional)</label>
                        <input type="email" id="email" name="email" class="w-full p-2 border border-highlight rounded bg-contrast text-deep">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-highlight">Your Feedback</label>
                        <textarea id="message" name="message" required rows="4" class="w-full p-2 border border-highlight rounded bg-contrast text-deep"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-highlight text-deep py-2 rounded-lg font-bold hover:bg-primary hover:text-contrast">
                        Submit Feedback
                    </button>
                </form>
            </div>
        @endif

    </div>

@endsection
