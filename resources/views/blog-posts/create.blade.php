@extends('layouts.all.layout')
@section('content')
<main class="main-content container mx-auto p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Create New Blog</h2>
    <form action="{{ route('blog-posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
        </div>
        <div class="form-group mb-4">
            <label for="content" class="block text-gray-700">Content:</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content') }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="image" class="block text-gray-700">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="submit-button bg-blue-500 text-white">Add Blog</button>
    </form>
</main>
@endsection