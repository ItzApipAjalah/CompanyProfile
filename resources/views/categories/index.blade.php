@extends('layouts.admin.index')
@section('content')

<div class="main-panel">

    <div class="content-wrapper">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3">Category List</h2>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
        </div>
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card table">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Manage Category</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th>Nama Category</th>
                        <th>Thumbnail</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="100">

                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>



@endsection
