@extends('layouts.all.layout')
@section('content')

<main class="main-content container mx-auto">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Create New Category</h2>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="form-group mb-4">
            <label for="image" class="block text-gray-700">Image:</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="submit-button">Add Category</button>
    </form>
</main>
@endsection
