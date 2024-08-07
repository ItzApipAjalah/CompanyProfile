<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Blog Post - {{ $post->title }}</title>
    <style>
        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
            transition: background 0.3s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        html {
            scroll-behavior: smooth;
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .aos-animate[data-aos="fade-left"] {
            animation: fadeInLeft 1s ease forwards;
        }

        .aos-animate[data-aos="fade-right"] {
            animation: fadeInRight 1s ease forwards;
        }

        .swiper-container {
            width: 100%;
            height: auto;
            overflow: hidden;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 0 0 auto;
            width: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
        }

        .swiper-pagination {
            bottom: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #000;
        }

        header {
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .text-gray-600 {
            white-space: pre-wrap;
        }

        .content-section {
            word-wrap: break-word;
            text-align: justify;
        }

        .container {
            max-width: 80%;
        }

        header {
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        header.scrolled {
            background-color: rgba(17,24,39, 0.9);
            box-shadow: 0 4px 6px rgba(17,24,39, 0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1, h2, h3, h4 {
            font-family: 'Merriweather', serif;
        }

        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://i.ibb.co/w40C2BG/medical-equipment-mrb88uk4se3ksu.png') center/cover no-repeat;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            line-height: 1.3;
        }

        .content-section {
            max-width: 800px;
        }

        .content-section p {
            line-height: 1.75;
            color: #333;
        }

        .content-section strong {
            color: #1f2937;
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 bg-transparent text-white shadow-none z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center space-x-3">
                <a class="text-2xl font-bold tracking-widest" href="{{ route('home') }}">BIOSTARK</a>
            </div>
            <nav class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('profile') }}" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Profile</a>
                <a href="#products" id="scroll-produk" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Products</a>
                <a href="#blog" id="scroll-blog" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Blog</a>
                <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Contact</a>
            </nav>
            <a href="#get-started" class="hidden lg:inline-block ml-4 bg-blue-950 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition" style="visibility: hidden;">Get Started</a>
            <div class="lg:hidden flex items-center">
                <button id="burger-menu-button" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="hidden lg:hidden">
            <nav class="flex flex-col items-center space-y-4 bg-transparent text-white p-4">
                <a href="{{ route('profile') }}" class="hover:text-blue-400">Profile</a>
                <a href="{{ route('produk') }}" id="scroll-produk" class="hover:text-blue-400">Products</a>
                <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-blue-400">Blog</a>
                <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-blue-400">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden hero-section" data-aos="fade-up">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-gray-900"></div>
        <div class="relative z-10 text-center px-6 py-12 md:px-12 md:py-24">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">{{ $post->title }}</h1>
            <a href="#content" id="scroll-to-content" class="mt-8 inline-block">
                <svg class="w-12 h-12 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
        </div>
    </section>

<!-- Blog Post Detail Section -->
<section id="content" class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden" data-aos="fade-up">
            <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-80 object-cover">
            <div class="p-6">
                <h2 class="text-3xl font-bold text-gray-800">{{ $post->title }}</h2>

                <div class="mt-2 text-gray-500">
                    @php
                        use Carbon\Carbon;
                        Carbon::setLocale('id');
                    @endphp
                    <p><strong>Diposting pada:</strong> {{ $post->created_at->translatedFormat('j F Y') }}</p>
                    <p><strong>Diperbarui pada:</strong> {{ $post->updated_at->translatedFormat('j F Y') }}</p>
                </div>

                <div class="text-gray-600 content-section mt-4">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
    <script>
        AOS.init();

        document.getElementById('scroll-to-content').addEventListener('click', function(event) {
            event.preventDefault();
            smoothScrollTo(document.getElementById('content').offsetTop, 800);
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

        document.getElementById('burger-menu-button').addEventListener('click', function () {
            var mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

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
    </script>
</body>
</html>
