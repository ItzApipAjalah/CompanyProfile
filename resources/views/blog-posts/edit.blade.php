@extends('layouts.admin.index')
@section('content')
<main class="main-content container mx-auto p-6">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit Blog</h2>
    <form action="{{ route('blog-posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-4">
            <label for="title" class="block text-gray-700">Title:</label>
            <input type="text" name="title" id="title" class="form-control w-full px-3 py-2 border border-gray-300 rounded" required value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group mb-4">
            <label for="content" class="block text-gray-700">Content:</label>
            <textarea name="content" id="content" class="form-control w-full px-3 py-2 border border-gray-300 rounded" required>{{ old('content', $post->content) }}</textarea>
        </div>
        <div class="form-group mb-4">
            <label for="image" class="block text-gray-700">Image:</label>
            <input type="file" name="image" id="image" class="form-control w-full px-3 py-2 border border-gray-300 rounded">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#content',
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
