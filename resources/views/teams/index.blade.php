@extends('layouts.produk.table_main')
@section('content')
<main class="main-content container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Profile Editor</h2>
    </div>

    <div class="grid grid-cols-1  gap-6 mb-6">
        @foreach($profiles as $profile)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 transition-transform transform flex flex-col">
                <div class="p-6 flex-grow">
                    <!-- Title with text wrapping -->
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-700">Tentang</h3>
                        <p class="text-gray-600">{{ $profile->tentang }}</p>
                    </div>
                    <!-- Description with text wrapping and label -->
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-700">Visi</h3>
                        <p class="text-gray-600">{{ $profile->visi }}</p>
                    </div>
                    <!-- Long text handling with label -->
                    <div>
                        <h3 class="text-lg font-medium text-gray-700">Misi</h3>
                        <p class="text-gray-800">{{ $profile->misi }}</p>
                    </div>
                </div>
                <!-- Edit button aligned to the right -->
                <div class="p-6 border-t border-gray-200 flex justify-end">
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-700 transition">Edit</a>
                </div>
            </div>
        @endforeach
    </div>



    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Team Members</h2>
        <a href="{{ route('teams.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 transition duration-300 ease-in-out">Add New Member</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($teams as $team)
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
            <h2 class="text-2xl font-semibold mb-4">{{ $team->name }}</h2>
            <p class="text-gray-600 mb-2">{{ $team->position }}</p>
            <div class="flex space-x-4 mt-auto">
                <a href="{{ route('teams.edit', $team->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md shadow hover:bg-yellow-600">Edit</a>
                <form action="{{ route('teams.destroy', $team->id) }}" method="POST" class="inline">
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
