<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Matthew J Gagnon | Epic High Fantasy Author')</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-gold font-serif">

<nav class="bg-gray-900 text-white p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img src="{{ asset('images/MatthewJGagnonAuthor.webp') }}" alt="MJG Logo" class="h-12">
        <span class="ml-3 text-lg font-bold">Matthew J Gagnon | Epic Fantasy Author</span>
    </div>
    <div>
        <a href="{{ route('books.index') }}" class="px-3 hover:text-gray-300">Books</a>
        <a href="{{ route('chapters.index') }}" class="px-3 hover:text-gray-300">Chapters</a>
        <a href="{{ route('admin.profile.edit') }}" class="px-3 hover:text-gray-300">Profile</a>
    </div>
</nav>

<div class="container mx-auto py-8">
    @yield('content')
</div>

<footer class="text-center text-gray-400 py-6 bg-gray-900">
    <p class="text-lg font-bold text-gold">&copy; {{ date('Y') }} Matthew J Gagnon | Epic High Fantasy Author</p>
    <p>Epic High Fantasy, One Chapter at a Time.</p>
    <p>This site is a designated family-values-friendly place.</p>
</footer>

</body>
</html>
