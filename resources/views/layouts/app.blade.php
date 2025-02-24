<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Matthew J Gagnon | Epic High Fantasy Author')</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite('resources/css/app.css')
    @if(env('GOOGLE_ANALYTICS_ID'))
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS_ID') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{ env('GOOGLE_ANALYTICS_ID') }}');
        </script>
    @endif
</head>
<body class="bg-black text-highlight font-serif">

<nav class="bg-gray-900 text-contrast p-4 flex justify-between items-center">
    <div class="flex items-center">
        <a href="/"><img src="{{ asset('images/MatthewJGagnonAuthor.png') }}" alt="Matthew J Gagnon, Author Logo" class="h-12"></a>
        <a class="ml-3 text-lg font-bold text-highlight hover:text-gray-300" href="/">Matthew J Gagnon | Epic Fantasy Author</a>
    </div>
    <div>
        @auth
        <a href="{{ route('admin.books.index') }}" class="px-3 text-highlight hover:text-gray-300">Admin/Books</a>
        <a href="{{ route('admin.chapters.index') }}" class="px-3 text-highlight hover:text-gray-300">Admin/Chapters</a>
        @endauth
        <a href="{{ route('books.index') }}" class="px-3 text-highlight hover:text-gray-300">Books</a>
        <a href="{{ route('chapters.index') }}" class="px-3 text-highlight hover:text-gray-300">Chapters</a>
        <a href="{{ route('inquiries.create') }}" class="px-3 text-highlight hover:text-gray-300">Author Inquiries</a>
{{--        <a href="{{ route('admin.profile.edit') }}" class="px-3 text-highlight hover:text-gray-300">Profile</a>--}}
    </div>
</nav>

<div class="container mx-auto py-8">
    @yield('content')
</div>

<footer class="text-center text-gray-400 py-6 bg-gray-900 p-6">
    <p class="text-sm">&copy; {{ date('Y') }} Matthew J Gagnon | Epic High Fantasy Author</p>
    <p class="text-sm"><a href="{{ route('pages.about-author') }}" class="text-highlight">About the Author</a></p>
    <p class="text-sm">This site is a designated <a class="text-highlight" href="/family-values" title="What do you mean by family-values?">family-values-friendly</a>.</p>
</footer>

</body>
</html>
