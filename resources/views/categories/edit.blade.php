@extends('layouts.admin.index')
@section('content')

<main class="main-content container mx-auto">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Update Category</h2>
    <form action="{{ route('categories.update', $category->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $category->name) }}">
        </div>
        <div class="form-group mb-4">
            <label for="image" class="block text-gray-700">Image (optional): </label>
            <input type="file" name="image" id="image" class="form-control w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
</main>

@endsection
