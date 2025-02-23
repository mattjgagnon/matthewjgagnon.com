@extends('layouts.app')

@section('content')

    <main class="max-w-3xl mx-auto py-12 px-6 text-gray-300">
        <h1 class="text-4xl font-bold text-center mb-4">Family Values Friendly</h1>

        <hr class="border-t-2 border-gold w-3/4 mx-auto mb-6">

        <div class="prose prose-lg leading-loose text-justify">
            <p>Welcome! This website is dedicated to storytelling that upholds strong values and engaging adventures, ensuring an experience free from excessive violence, profanity, or inappropriate themes.</p>

            <p>As a fantasy-based site, some stories may include moments of action, peril, or conflict&mdash;common elements of the genre. However, you won’t find anything graphic, gory, or needlessly disturbing.</p>

            <p>I strive to create immersive worlds that spark the imagination while remaining respectful to readers who appreciate uplifting narratives and strong moral themes.</p>

            <p>My goal is to provide a space where fantasy fans can enjoy rich storytelling without concerns over unsuitable content. Whether you’re reading alone or as a family, you can expect thoughtful storytelling that balances excitement with integrity.</p>

            <p>&mdash;Matthew J Gagnon</p>
        </div>

        <a href="{{ route('home') }}" class="block mt-6 text-green-600 hover:underline">
            ⬅ Back to Home
        </a>
    </main>

@endsection
