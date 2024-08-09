@extends('layouts.admin.index')
@section('content')
<main class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3">Team Members</h2>
        <a href="{{ route('teams.create') }}" class="btn btn-success">Add New Member</a>
    </div>

    <div class="row">
        @foreach($teams as $team)
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $team->name }}</h5>
                    <p class="card-text text-muted mb-3">{{ $team->position }}</p>
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
