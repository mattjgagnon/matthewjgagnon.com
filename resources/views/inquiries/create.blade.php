@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">Contact the Author</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded-lg mt-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('inquiries.store') }}" method="POST" class="mt-6 bg-gray-800 p-6 rounded-lg">
        @csrf
        <label class="block text-gray-300">Name</label>
        <input type="text" name="name" class="w-full p-2 rounded bg-gray-700 text-white">

        <label class="block text-gray-300 mt-4">Email</label>
        <input type="email" name="email" class="w-full p-2 rounded bg-gray-700 text-white">

        <label class="block text-gray-300 mt-4">Message</label>
        <textarea name="message" class="w-full p-2 rounded bg-gray-700 text-white"></textarea>

        <button type="submit" class="mt-4 bg-darkAccent text-white px-4 py-2 rounded-lg">Send Inquiry</button>
    </form>
@endsection
