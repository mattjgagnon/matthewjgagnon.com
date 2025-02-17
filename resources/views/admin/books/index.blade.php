@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Manage Books</h1>
    <a href="{{ route('admin.books.create') }}" class="btn-green text-white px-4 py-2 rounded-lg">+ Add Book</a>

    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded-lg mt-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-gray-800 text-white rounded-lg mt-6">
        <thead>
        <tr class="bg-gray-700">
            <th class="p-3 text-left">Title</th>
            <th class="p-3 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr class="border-t border-gray-700">
                <td class="p-3">{{ $book->title }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.books.edit', $book) }}" class="text-yellow-400 hover:underline">Edit</a> |
                    <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline" onclick="return confirm('Are you sure?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $books->links('pagination::tailwind') }}
    </div>
@endsection
