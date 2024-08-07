@extends('layouts.admin.index')
@section('content')
<main class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3">Blog List</h2>
        <a href="{{ route('blog-posts.create') }}" class="btn btn-primary">Add New Blog</a>
    </div>

    <div class="row">
        @foreach($posts as $post)
        <div class="col-12 col-sm-6 col-lg-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}" class="card-img-top">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>

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

                    <p class="card-text flex-grow-1">{{ $firstSentence }}</p>

                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('blog-posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('blog-posts.destroy', $post->id) }}" method="POST" class="d-inline">
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
