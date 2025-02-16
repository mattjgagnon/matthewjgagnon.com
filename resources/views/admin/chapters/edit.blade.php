@extends('layouts.admin')

@section('content')
    <h1>Edit Chapter</h1>

    <form action="{{ route('admin.chapters.update', $chapter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $chapter->title }}" required>

        <label>Content</label>
        <textarea name="content" class="form-control" required>{{ $chapter->content }}</textarea>

        <button type="submit" class="btn btn-primary">Update Chapter</button>
    </form>
@endsection
