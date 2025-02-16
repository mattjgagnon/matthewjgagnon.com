<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Writing Website')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Tailwind -->
    @vite('resources/css/app.css')
</head>
<body class="bg-darkBg text-darkText font-serif">

<nav class="bg-gray-900 text-white p-4 flex justify-between">
    <a href="{{ route('books.index') }}" class="text-lg font-bold">📚 Books</a>
    <div>
        @auth
            <a href="{{ route('admin.books.index') }}" class="px-3 hover:text-gray-300">Books</a>
            <a href="{{ route('admin.chapters.index') }}" class="px-3 hover:text-gray-300">Chapters</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="px-3 hover:text-gray-300">Logout</a>
            <a href="{{ route('admin.profile.edit') }}" class="px-3 hover:text-gray-300">Profile</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        @else
            <a href="{{ route('books.index') }}" class="px-3 hover:text-gray-300">Books</a>
            <a href="{{ route('chapters.index') }}" class="px-3 hover:text-gray-300">Chapters</a>
            <a href="{{ route('login') }}" class="px-3 hover:text-gray-300">Login</a>
        @endauth
    </div>
</nav>

<main class="max-w-3xl mx-auto p-6">
    @yield('content')
</main>

<footer class="text-center text-gray-500 p-4">
    &copy; {{ date('Y') }} My Writing Website
</footer>

</body>
</html>
