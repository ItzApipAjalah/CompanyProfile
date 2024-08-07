@extends('layouts.admin.index')

@section('content')
<main class="container mt-5">
    <h2 class="h3 mb-4">Edit Produk</h2>

    <form action="{{ route('produks.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $produk->name }}" required>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail:</label>
            <input type="file" id="thumbnail" name="thumbnail" class="form-control">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required>{{ $produk->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category:</label>
            <select id="category_id" name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $produk->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
</main>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#description',
            plugins: 'advlist autolink lists link image charmap preview anchor textcolor',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image',
            menubar: false,
            height: 500,
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    });
</script>
@endsection
