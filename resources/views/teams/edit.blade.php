@extends('layouts.admin.index')

@section('content')
<main class="container mt-5">
    <h2 class="h3 mb-4">Edit Team</h2>

    <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $team->name }}" required>
        </div>

        <div class="mb-3">
            <label for="position" class="form-label">Position:</label>
            <input type="text" id="position" name="position" class="form-control" value="{{ $team->position }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Team</button>
    </form>
</main>
@endsection
