<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav>
    <a href="{{ route('admin.chapters.index') }}">Chapters</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</nav>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} Admin Panel</p>
</footer>
</body>
</html>
