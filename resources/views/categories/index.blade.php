@extends('layouts.produk.table_main')
@section('content')
<main class="main-content container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">category List</h2>
        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 transition duration-300 ease-in-out">Add New Category</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-wrapper">
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
                            <a href="{{ route('categories.edit', $category) }}" class="text-blue-500 hover:text-blue-700 transition duration-200">Edit</a>

                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition duration-200">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>


@endsection
