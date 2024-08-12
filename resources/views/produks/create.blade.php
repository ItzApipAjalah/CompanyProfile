@extends('layouts.admin.index')

@section('content')
<main class="container mt-5">
    <h2 class="h3 mb-4">Create New Produk</h2>
    <form action="{{ route('produks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail:</label>
            <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*" required>
            @error('thumbnail')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
            <div id="imagePreview" class="mt-3"></div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Produk</button>
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
