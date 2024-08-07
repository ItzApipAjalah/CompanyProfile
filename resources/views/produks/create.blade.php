@extends('layouts.produk.create')
@section('content')
<main class="main-content container mx-auto">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Create New Produk</h2>
    <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <div class="file-input" id="fileInput">
                <input type="file" id="thumbnail" name="thumbnail" accept="image/*" required>
                <span>Drag & Drop or Click to Upload</span>
            </div>
            @error('thumbnail')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <div id="imagePreview" style="margin-top: 10px;"></div>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id" required>
                <option value="" disabled selected>Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="submit-button">Add Produk</button>
    </form>
</main>
@endsection
