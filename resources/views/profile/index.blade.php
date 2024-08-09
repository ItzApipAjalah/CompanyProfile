@extends('layouts.admin.index')
@section('content')
<main class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3">Profile Editor</h2>
    </div>

    <div class="row mb-4">
        @foreach($profiles as $profile)
            <div class="col-12 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body">
                        <!-- Title with text wrapping -->
                        <div class="mb-3">
                            <h3 class="h5">Tentang</h3>
                            <p class="text-muted">{{ $profile->tentang }}</p>
                        </div>
                        <!-- Description with text wrapping and label -->
                        <div class="mb-3">
                            <h3 class="h5">Visi</h3>
                            <p class="text-muted">{{ $profile->visi }}</p>
                        </div>
                        <!-- Long text handling with label -->
                        <div>
                            <h3 class="h5">Misi</h3>
                            <p class="text-muted">{{ $profile->misi }}</p>
                        </div>
                    </div>
                    <!-- Edit button aligned to the right -->
                    <div class="card-footer bg-white border-0 d-flex justify-content-end">
                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
