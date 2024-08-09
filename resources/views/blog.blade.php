@extends('layouts.home.index')
@section('content')
<!-- Header -->
<header class="fixed top-0 left-0 right-0 bg-transparent text-white shadow-none z-50">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo and Brand Name -->
        <div class="flex items-center space-x-3">
            <a class="text-2xl font-bold tracking-widest" href="{{ route('home') }}">BIOSTARK</a>
        </div>
        <!-- Navigation Links (Hidden on mobile by default) -->
        <nav class="hidden lg:flex items-center space-x-6">
            <a href="{{ route('profile') }}" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Profile</a>
            <a href="{{ route('produk') }}" id="scroll-produk" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Produk</a>
            <a href="#blog" id="scroll-blog" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Blog</a>
            <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Kontak</a>
        </nav>
        <!-- Call-to-Action Button (Hidden on mobile by default) -->
        <a href="#get-started" class="hidden lg:inline-block ml-4 bg-blue-950 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition" style="visibility: hidden;" >Get Started</a>
        <!-- Burger Menu Icon -->
        <div class="lg:hidden flex items-center">
            <button id="burger-menu-button" class="focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>
    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="hidden lg:hidden">
        <nav class="flex flex-col items-center space-y-4 bg-transparent text-white p-4">
            <a href="{{ route('profile') }}" class="hover:text-teal-400">Profile</a>
            <a href="{{ route('produk') }}" id="scroll-produk" class="hover:text-teal-400">Produk</a>
            <a href="#blog" id="scroll-blog" class="hover:text-teal-400">Blog</a>
            <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-teal-400">Kontak</a>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-teal-900" style="background-image: url('https://i.ibb.co.com/SBR2x5D/1685488925-en-idei-club-p-medica.png'); background-size: cover; background-position: center;" data-aos="fade-up">
    <!-- Background Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-gray-900"></div>
    <!-- Hero Content -->
    <div class="relative z-10 text-center px-6 py-12 md:px-12 md:py-24">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">Semua Blog <span class="text-teal-500">biostark</span></h1>
        <!-- Scroll Down Animation -->
        <a href="#blog" id="scroll-to-blog" id="scroll-to-about" class="mt-8 inline-block" >
            <svg class="w-12 h-12 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </a>
    </div>
    <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" fill="#000">
        <path fill-opacity="0.5" d="M0,64L48,74.7C96,85,192,107,288,112C384,117,480,107,576,122.7C672,139,768,181,864,192C960,203,1056,181,1152,149.3C1248,117,1344,75,1392,53.3L1440,32L1440,320L0,320Z"></path>
    </svg>
</section>


<!-- Blog Section -->
<section id="blog" class="py-16 bg-gray-200" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800">Blog Kami</h2>
        <p class="mt-4 text-lg text-center text-gray-700">Baca postingan dan pembaruan terbaru kami</p>

        <!-- Blog Grid -->
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <!-- Blog Post -->
            <div class="bg-white shadow-md rounded-lg flex flex-col overflow-hidden">
                <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}" class="slide-image">
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-2xl font-semibold text-gray-800">
                        @php
                            $title = $post->title;
                            $words = explode(' ', $title);

                            if (count($words) > 4) {
                                $title = implode(' ', array_slice($words, 0, 4)) . '...';
                            }
                        @endphp
                        {{ $title }}
                    </h3>

                    <p class="mt-2 text-gray-600 flex-1 overflow-hidden">
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

                                $words = explode(' ', $firstSentence);
                                if (count($words) > 10) {
                                    $firstSentence = implode(' ', array_slice($words, 0, 10)) . '...';
                                }
                            }
                        @endphp
                        {!! nl2br(e($firstSentence)) !!}
                    </p>

                    <a href="{{ route('blog-posts.show', ['title' => $post->title]) }}" class="text-blue-600 hover:underline mt-4 inline-block">Read More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.querySelector('header');
        const heroHeight = document.querySelector('section').offsetHeight;

        window.addEventListener('scroll', function() {
            if (window.scrollY > heroHeight) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    });

    document.getElementById('scroll-blog').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('blog').offsetTop, 800);
    });
    document.getElementById('scroll-to-blog').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('blog').offsetTop, 800);
    });


    function smoothScrollTo(target, duration) {
        const start = window.pageYOffset;
        const distance = target - start;
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = ease(timeElapsed, start, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        requestAnimationFrame(animation);
    }
</script>
@endsection
