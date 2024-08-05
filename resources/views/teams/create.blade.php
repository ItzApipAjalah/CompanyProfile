@extends('layouts.all.layout')
@section('content')
<main class="main-content container mx-auto">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Create New Produk</h2>
    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" class="form-control" required>
        </div>

        <button type="submit" class="submit-button">Add Team Member</button>
    </form>

</main>
@endsection
