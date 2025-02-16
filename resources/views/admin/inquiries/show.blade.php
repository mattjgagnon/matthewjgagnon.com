@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">{{ $inquiry->name }}</h1>
    <p class="text-gray-400">{{ $inquiry->email }}</p>
    <p class="mt-4 text-lg">{{ $inquiry->message }}</p>

    <a href="{{ route('admin.inquiries.index') }}" class="mt-6 block text-darkAccent hover:underline">⬅ Back to Inquiries</a>
@endsection
