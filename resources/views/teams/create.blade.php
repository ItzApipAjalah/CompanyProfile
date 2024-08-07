@extends('layouts.admin.index')

@section('content')
<main class="container mt-5">
    <h2 class="h3 mb-4">Create New Team Member</h2>

    <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position:</label>
            <input type="text" id="position" name="position" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Team Member</button>
    </form>
</main>
@endsection
