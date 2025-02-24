@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold">Edit Profile</h1>

    @if(session('success'))
        <div class="bg-primary-600 text-contrast p-3 rounded-lg mt-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" class="mt-6 bg-gray-800 p-6 rounded-lg">
        @csrf

        <label class="block text-gray-300">Email</label>
        <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="w-full p-2 rounded bg-gray-700 text-contrast" required>

        <label class="block text-gray-300 mt-4">New Password (optional)</label>
        <input type="password" name="password" class="w-full p-2 rounded bg-gray-700 text-contrast">

        <label class="block text-gray-300 mt-4">Confirm New Password</label>
        <input type="password" name="password_confirmation" class="w-full p-2 rounded bg-gray-700 text-contrast">

        <button type="submit" class="mt-4 bg-darkAccent text-contrast px-4 py-2 rounded-lg">Update Profile</button>
    </form>
@endsection
