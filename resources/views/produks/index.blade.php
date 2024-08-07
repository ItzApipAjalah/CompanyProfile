@extends('layouts.admin.index')
@section('content')
<main class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3">Produk List</h2>
        <a href="{{ route('produks.create') }}" class="btn btn-primary">Add New Produk</a>
    </div>

    @foreach($categories as $category)
        <div class="mb-5">
            <h3 class="h5 mb-3">Category: {{ $category->name }}</h3>
            <div class="row">
                @foreach($category->produks as $produk)
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset('storage/' . $produk->thumbnail) }}" alt="{{ $produk->name }}" class="card-img-top" style="height: 12rem; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $produk->name }}</h5>
                            <p class="card-text flex-grow-1">
                                @php
                                $contentHtml = $produk->description;
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
                            <div class="d-flex justify-content-between mt-auto">
                                <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" class="d-inline">
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
        </div>
    @endforeach
</main>
@endsection
