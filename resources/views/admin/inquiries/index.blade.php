@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Author Inquiries</h1>

    @if(session('success'))
        <div class="bg-primary-600 text-contrast p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-gray-800 text-contrast rounded-lg">
        <thead>
        <tr class="bg-gray-700">
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inquiries as $inquiry)
            <tr class="border-t border-gray-700">
                <td class="p-3">{{ $inquiry->name }}</td>
                <td class="p-3">{{ $inquiry->email }}</td>
                <td class="p-3">
                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="text-darkAccent hover:underline">View</a>
                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:underline" onclick="return confirm('Delete this inquiry?');">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $inquiries->links('pagination::tailwind') }}
    </div>
@endsection
