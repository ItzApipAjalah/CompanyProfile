@extends('layouts.produk.table_main')
@section('content')
<main class="main-content container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-semibold text-gray-800">Blog List</h2>
        <a href="{{ route('blog-posts.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md shadow hover:bg-blue-600 transition duration-300 ease-in-out">Add New Produk</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col">
            <h2 class="text-2xl font-semibold mb-4">{{ $post->title }}</h2>
            <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-md mb-4">

            {{-- @php
                // Extract the first paragraph from the content using a regular expression
                $contentHtml = $post->content;
                $firstParagraph = '';
                if (preg_match('/<p[^>]*>(.*?)<\/p>/', $contentHtml, $matches)) {
                    $firstParagraph = $matches[0];
                }
            @endphp --}}

            <p class="text-gray-700 mb-4 flex-1 overflow-hidden text-ellipsis">
                @php
                $contentHtml = $post->content;
                $firstSentence = '';

                if (preg_match('/<p[^>]*>(.*?)<\/p>/', $contentHtml, $matches)) {
                    $firstParagraph = $matches[1];

                    $textOnly = strip_tags($firstParagraph);

                    if (preg_match('/[.!?]/', $textOnly, $punctuationMatch, PREG_OFFSET_CAPTURE)) {
                        $punctuationPos = $punctuationMatch[0][1];
                        $firstSentence = substr($textOnly, 0, $punctuationPos + 1);
                    } else {
                        $firstSentence = $textOnly;
                    }
                }
            @endphp
            {!! nl2br(e($firstSentence)) !!}
            </p>

            <div class="flex space-x-4 mt-auto">
                <a href="{{ route('blog-posts.edit', $post->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded-md shadow hover:bg-yellow-600">Edit</a>
                <form action="{{ route('blog-posts.destroy', $post->id) }}" method="POST" class="inline">
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
