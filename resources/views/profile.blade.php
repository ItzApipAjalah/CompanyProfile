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
            <a href="#about" id="nav-scroll" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Profile</a>
            <a href="{{ route('produk') }}" id="scroll-produk" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Produk</a>
            <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Blog</a>
            <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Kontak</a>
        </nav>
        <!-- Call-to-Action Button (Hidden on mobile by default) -->
        <a href="#get-started" class="hidden lg:inline-block ml-4 bg-blue-950 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition" style="visibility: hidden;">Get Started</a>
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
            <a href="#about" id="scroll-about" class="hover:text-teal-400">Profile</a>
            <a href="{{ route('produk') }}" id="scroll-produk" class="hover:text-teal-400">Produk</a>
            <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-teal-400">Blog</a>
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
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">Tentang <span class="text-teal-500">biostark</span></h1>
        <!-- Scroll Down Animation -->
        <a href="#about" id="scroll-to-about" class="mt-8 inline-block" >
            <svg class="w-12 h-12 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </a>
    </div>
    <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" fill="#011716">
        <path fill-opacity="0.5" d="M0,64L48,74.7C96,85,192,107,288,112C384,117,480,107,576,122.7C672,139,768,181,864,192C960,203,1056,181,1152,149.3C1248,117,1344,75,1392,53.3L1440,32L1440,320L0,320Z"></path>
    </svg>
</section>

<!-- About Us Section -->
<section id="about" class="py-16 bg-gray-200 relative" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800">Tentang Kami</h2>
        @foreach($profiles as $profile)
        <div class="mt-8 max-w-screen-lg mx-auto text-center relative z-10">
            <p class="mt-4 text-lg text-gray-700">
                {{ $profile->tentang }}
            </p>
        </div>
        <div class="mt-12 flex flex-col md:flex-row items-center justify-center gap-8 relative z-10">
            <div class="flex-1 text-center md:text-left p-6 md:p-0" data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-2xl font-semibold text-gray-800">Visi</h3>
                <p class="mt-2 text-gray-600">
                    {{ $profile->visi }}
                </p>
            </div>
            <div class="flex-1 text-center md:text-left p-6 md:p-0" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-2xl font-semibold text-gray-800">Misi</h3>
                <p class="mt-2 text-gray-600">
                    {{ $profile->misi }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="absolute inset-0 bg-cover bg-center opacity-10" style="background-image: url('https://i.ibb.co.com/ZhnqtBq/20180115100741.jpg');"></div>
</section>


<!-- Organizational Structure Section -->
<section id="structure" class="py-16 bg-white" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800">Struktur Organisasi </h2>
        <div class="mt-8 flex flex-col items-center text-center relative">

            @php
                $groupedTeams = $teams->groupBy('position');
            @endphp

            @foreach ($groupedTeams as $position => $members)
                <div class="flex flex-wrap justify-center items-center w-full mb-12" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}">
                    @foreach ($members as $team)
                        <div class="m-4">
                            <h4 class="text-2xl font-semibold text-gray-900">{{ $team->name }}</h4>
                            <p class="text-gray-600">{{ $position }}</p>
                        </div>
                    @endforeach
                </div>

                @if (!$loop->last)
                    <div class="relative flex flex-col items-center w-full mb-12">
                        <div class="h-12 w-px bg-gray-300"></div>
                        <div class="flex items-center justify-center w-full max-w-xl">
                            <div class="h-px w-1/3 bg-gray-300"></div>
                            <div class="h-4 w-4 bg-gray-300 rounded-full mx-1"></div>
                            <div class="h-px w-1/3 bg-gray-300"></div>
                        </div>
                    </div>
                @endif
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

    document.getElementById('scroll-to-about').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('about').offsetTop, 800);
    });

    document.getElementById('nav-scroll').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('about').offsetTop, 800);
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
