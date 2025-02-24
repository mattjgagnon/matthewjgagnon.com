@extends('layouts.app')

@section('content')
        <h1 class="text-4xl font-bold text-darkAccent">{{ $book->title }}</h1>

        <hr class="border-t-2 border-gold w-3/4 mx-auto mb-6">

        <p class="text-lg leading-relaxed text-justify">{{ $book->description }}</p>

        <h2 class="text-2xl font-bold mt-6">Chapters</h2>

        <ul class="mt-4">
            @forelse ($chapters as $chapter)
                <li class="mt-2">
                    <a href="{{ route('chapters.show', ['book' => $book->slug, 'chapter' => $chapter->id, 'page' => 1]) }}"
                       class="text-green-600 hover:underline">
                        Chapter {{ $chapter->id }}: {{ $chapter->title }}
                    </a>
                </li>
            @empty
                <li class="text-gray-600">No chapters available yet.</li>
            @endforelse
        </ul>

        <a href="{{ route('home') }}" class="block mt-6 text-green-600 hover:underline">
            ⬅ Back to Home
        </a>
@endsection

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <h1 class="text-4xl font-bold text-darkAccent">{{ $book->title }}</h1>--}}
{{--    <p class="mt-6 text-lg text-gray-300">{{ $book->description }}</p>--}}

{{--    <h2 class="text-2xl font-semibold mt-8">Chapters</h2>--}}
{{--    <ul class="mt-4">--}}
{{--        @forelse ($book->chapters as $chapter)--}}
{{--            <li class="mb-2">--}}
{{--                <a href="{{ route('chapters.show', $chapter) }}" class="text-darkAccent hover:underline">--}}
{{--                    {{ $chapter->title }}--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @empty--}}
{{--            <p class="text-gray-400">No chapters available for this book.</p>--}}
{{--        @endforelse--}}
{{--    </ul>--}}

{{--    <a href="{{ route('books.index') }}" class="block mt-6 text-darkAccent hover:underline">--}}
{{--        ⬅ Back to Books--}}
{{--    </a>--}}
{{--@endsection--}}
