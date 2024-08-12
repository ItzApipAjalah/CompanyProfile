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
            <a href="{{ route('profile') }}" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">@lang('home.about_us')</a>
            <a href="#products" id="scroll-produk" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">@lang('home.products_title')</a>
            <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">@lang('home.blog_title')</a>
            <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">@lang('home.contact_us')</a>
        </nav>
        <!-- Call-to-Action Button (Hidden on mobile by default) -->
        <div class="relative">
            <button id="dropdown-button" class="hidden lg:inline-block ml-4 bg-teal-900 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                @lang('home.leanguage')
            </button>
            <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg hidden">
                <div class="p-2">
                    <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">English</a>
                    <a href="{{ route('language.switch', 'id') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">Indonesian</a>
                </div>
            </div>
        </div>
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
            <a href="{{ route('profile') }}" class="hover:text-teal-400">@lang('home.about_us')</a>
            <a href="#products" id="scroll-produk" class="hover:text-teal-400">@lang('home.products_title')</a>
            <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-teal-400">@lang('home.blog_title')</a>
            <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-teal-400">@lang('home.contact_us')</a>
            <div class="relative mt-4">
                <button id="mobile-dropdown-button" class="bg-teal-900 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                    @lang('home.leanguage')
                </button>
                <div id="mobile-dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white text-black rounded-lg shadow-lg hidden">
                    <div class="p-2">
                        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">English</a>
                        <a href="{{ route('language.switch', 'id') }}" class="block px-4 py-2 text-sm hover:bg-gray-200">Indonesian</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-teal-900" style="background-image: url('https://i.ibb.co.com/SBR2x5D/1685488925-en-idei-club-p-medica.png'); background-size: cover; background-position: center;" data-aos="fade-up">
    <!-- Background Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-gray-900"></div>
    <!-- Hero Content -->
    <div class="relative z-10 text-center px-6 py-12 md:px-12 md:py-24">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">Produk <span class="text-teal-500">{{ $product->name }}</span></h1>
        <!-- Scroll Down Animation -->
        <a href="#products" id="scroll-to-products" class="mt-8 inline-block" >
            <svg class="w-12 h-12 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </a>
    </div>
    <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" fill="#000">
        <path fill-opacity="0.5" d="M0,64L48,74.7C96,85,192,107,288,112C384,117,480,107,576,122.7C672,139,768,181,864,192C960,203,1056,181,1152,149.3C1248,117,1344,75,1392,53.3L1440,32L1440,320L0,320Z"></path>
    </svg>
</section>

<div class="container mx-auto px-6 py-16" id="products">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
        <!-- Image Section -->
        <div class="w-full md:w-1/2">
            <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }} Image" class="w-full h-full object-cover object-center rounded-t-lg md:rounded-t-none md:rounded-l-lg">
        </div>
        <!-- Details Section -->
        <div class="w-full md:w-1/2 p-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h2>
            <p class="text-gray-700 mb-6">{!! $product->description !!}</p>
                <!-- Display success or error messages -->
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <!-- Contact Form -->
            <form action="{{ route('product.contact.submit') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out" required>
                </div>
                <div class="mb-5">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out" required>
                </div>
                <div class="mb-5">
                    <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                    <textarea id="message" name="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 transition duration-200 ease-in-out" required></textarea>
                </div>

                <!-- Hidden Fields for Product Details -->
                <input type="hidden" name="product_name" value="{{ $product->name }}">
                <input type="hidden" name="product_description" value="{{ $product->description }}">
                <input type="hidden" name="product_image" value="{{ url('storage/' . $product->thumbnail) }}">

                <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">Send Message</button>
            </form>
        </div>
    </div>
</div>








@endsection

@section('script')


<script>
        // Toggle dropdown menu
        document.getElementById('dropdown-button').addEventListener('click', function() {
    var dropdownMenu = document.getElementById('dropdown-menu');
    dropdownMenu.classList.toggle('hidden');
});

document.addEventListener('DOMContentLoaded', function() {
    const mobileDropdownButton = document.getElementById('mobile-dropdown-button');
    const mobileDropdownMenu = document.getElementById('mobile-dropdown-menu');

    if (mobileDropdownButton && mobileDropdownMenu) {
        mobileDropdownButton.addEventListener('click', function() {
            // Toggle visibility of dropdown menu
            if (mobileDropdownMenu.classList.contains('hidden')) {
                mobileDropdownMenu.classList.remove('hidden');
            } else {
                mobileDropdownMenu.classList.add('hidden');
            }
        });
    }
});
</script>
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

    document.getElementById('scroll-produk').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('products').offsetTop, 800);
    });

    document.getElementById('scroll-to-products').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('products').offsetTop, 800);
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

