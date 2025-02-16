@extends('layouts.admin')

@section('content')
    <h1>Add New Chapter</h1>

    <form action="{{ route('admin.chapters.store') }}" method="POST">
        @csrf
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>

        <label>Content</label>
        <textarea name="content" class="form-control" required></textarea>

        <button type="submit" class="btn btn-success">Save Chapter</button>
    </form>
@endsection
