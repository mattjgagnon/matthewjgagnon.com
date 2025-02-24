@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Manage Chapters</h1>

    <a href="{{ route('admin.chapters.create') }}" class="btn-primary text-contrast px-4 py-2 rounded-lg">+ Add Chapter</a>

    @if(session('success'))
        <div class="bg-primary-600 text-contrast p-3 rounded-lg mt-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full mt-6 bg-gray-800 text-contrast rounded-lg overflow-hidden">
        <thead>
        <tr class="bg-gray-700">
            <th class="p-3 text-left">Title</th>
            <th class="p-3 text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($chapters as $chapter)
            <tr class="border-t border-gray-700">
                <td class="p-3 text-left">{{ $chapter->title }}</td>
                <td class="p-3 text-left">
                    <a href="{{ route('admin.chapters.edit', $chapter->id) }}" class="text-yellow-400 hover:underline">Edit</a> |
                    <form action="{{ route('admin.chapters.destroy', $chapter->id) }}" method="POST" class="inline-block">
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
        {{ $chapters->links('pagination::tailwind') }}
    </div>
@endsection
