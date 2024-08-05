@extends('layouts.produk.table_main')
@section('content')
<main class="main-content container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Produk List</h2>
        <a href="{{ route('produks.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 transition duration-300 ease-in-out">Add New Produk</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($produks as $produk)
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
            <h2 class="text-2xl font-semibold mb-4">{{ $produk->name }}</h2>
            <img src="{{ asset('storage/' . $produk->thumbnail) }}" alt="{{ $produk->name }}" class="w-full h-48 object-cover rounded-md mb-4">
            <p class="text-gray-700 mb-4 flex-1 overflow-hidden text-ellipsis">Description : {{ $produk->description }}</p>
            <p class="text-gray-700 mb-4 flex-1 overflow-hidden text-ellipsis">Category : {{ $produk->category->name }}</p>
            <div class="flex space-x-4 mt-auto">
                <a href="{{ route('produks.edit', $produk->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md shadow hover:bg-yellow-600">Edit</a>
                <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md shadow hover:bg-red-600">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</main>


@endsection
