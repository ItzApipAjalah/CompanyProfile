@extends('layouts.admin.index')

@section('content')
<main class="container mt-5">
    <h2 class="h3 mb-4">Edit Team</h2>

    <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="tentang" class="form-label">Tentang:</label>
            <textarea id="tentang" name="tentang" class="form-control resizable-textarea" rows="4" required>{{ $profile->tentang }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="visi" class="form-label">Visi:</label>
            <textarea id="visi" name="visi" class="form-control resizable-textarea" rows="4" required>{{ $profile->visi }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="misi" class="form-label">Misi:</label>
            <textarea id="misi" name="misi" class="form-control resizable-textarea" rows="4" required>{{ $profile->misi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Team</button>
    </form>
</main>
@endsection

@section('style')
<style>
/* Make textareas resizable with a minimum height */
.resizable-textarea {
    resize: vertical; /* Allows resizing vertically */
    height: 100px;
}
</style>
@endsection
