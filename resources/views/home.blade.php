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
            <a href="#blog" id="scroll-blog" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">@lang('home.blog_title')</a>
            <a href="#contact" id="scroll-contact" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">@lang('home.contact_us')</a>
        </nav>
        <!-- Dropdown for "Get Started" Button and Language Switcher -->
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
            <a href="#blog" id="scroll-blog" class="hover:text-teal-400">@lang('home.blog_title')</a>
            <a href="#contact" id="scroll-contact" class="hover:text-teal-400">@lang('home.contact_us')</a>
            <!-- Dropdown for Language Switcher -->
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
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">@lang('home.welcome') <span class="text-teal-500">biostark</span></h1>
        <p class="mt-4 text-lg md:text-2xl text-gray-200">@lang('home.subtitle')</p>
        <a href="{{ route('profile') }}" class="mt-8 inline-block bg-teal-900 hover:bg-teal-800 text-white py-3 px-8 md:px-12 rounded-full shadow-lg transition-transform transform hover:scale-105">@lang('home.about_us')</a>
    </div>
    <!-- Optional: Add a subtle decorative element like a wave or abstract shape -->
    <svg class="absolute bottom-0 left-0 w-full" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" fill="#011716">
        <path fill-opacity="0.5" d="M0,64L48,74.7C96,85,192,107,288,112C384,117,480,107,576,122.7C672,139,768,181,864,192C960,203,1056,181,1152,149.3C1248,117,1344,75,1392,53.3L1440,32L1440,320L0,320Z"></path>
    </svg>
</section>

<!-- Products Section -->
<section id="products" class="bg-gray-100 py-16" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800">@lang('home.products_title')</h2>
        <p class="mt-4 text-lg text-center text-gray-700">
            @lang('home.products_subtitle')
        </p>

        @if($produks->isEmpty())
            <div class="mt-8 text-center text-gray-600">
                <p>@lang('home.products_empty')</p>
            </div>
        @else
            <div class="mt-8 grid gap-6 grid-cols-1 md:grid-cols-3 lg:grid-cols-3">
                @foreach($produks as $produk)
                <a href="{{ route('product.show', ['id' => $produk->id]) }}">
                <div class="relative bg-white rounded-lg overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <img src="{{ asset('storage/' . $produk->thumbnail) }}" alt="{{ $produk->name }} Image" class="w-full h-56 object-cover">
                    <div class="absolute inset-0 flex items-end justify-start p-6 bg-black bg-opacity-10">
                        <div class="text-left">
                            <h3 class="text-xl font-semibold text-white">{{ $produk->name }}</h3>
                        </div>
                    </div>
                </div>
                </a>
                @endforeach
            </div>
            <div class="text-center mt-8" data-aos="fade-up">
                <a href="{{ route('produk') }}" class="inline-block text-white px-6 py-3 rounded-lg shadow-lg bg-teal-600 hover:bg-teal-700 transition duration-300">@lang('home.view_all_products')</a>
            </div>
        @endif
    </div>
</section>



<!-- Blog Section -->
<section id="blog" class="py-16 bg-gray-200" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800">@lang('home.blog_title')</h2>
        <p class="mt-4 text-lg text-center text-gray-700">@lang('home.blog_subtitle')</p>

        @if($posts->isEmpty())
            <div class="mt-8 text-center text-gray-600">
                <p>@lang('home.blog_empty')</p>
            </div>
        @else
            <!-- Swiper -->
            <div class="swiper-container mt-8">
                <div class="swiper-wrapper">
                    @foreach($posts as $post)
                    <!-- Slide -->
                    <div class="swiper-slide bg-white shadow-md rounded-lg flex flex-col overflow-hidden">
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

                            <a href="{{ route('blog-posts.show', ['title' => $post->title]) }}" class="text-center mt-4 inline-block bg-teal-600 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-teal-700 transition duration-300">@lang('home.read_more')</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="text-center mt-8" data-aos="fade-up">
                    <a href="{{ route('blog') }}" class="inline-block text-white px-6 py-3 rounded-lg shadow-lg bg-teal-600 hover:bg-teal-700 transition duration-300">@lang('home.view_all_blog')</a>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        @endif
    </div>
</section>


<!-- Contact Section -->
<section id="contact" class="bg-gray-100 py-16" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800">@lang('home.contact_us')</h2>
        <p class="mt-4 text-lg text-center text-gray-600">@lang('home.contact_subtitle')</p>

        <div class="mt-12 flex justify-center items-center">
            <div class="bg-white p-8 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:shadow-lg hover:-translate-y-1 w-full max-w-xl">
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

                <form action="{{ route('contact.submit') }}" method="POST">
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
                    <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-medium py-2 px-4 rounded-md transition duration-200 ease-in-out transform hover:scale-105">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>



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

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        var isClickInside = document.getElementById('dropdown-button').contains(event.target) ||
                            document.getElementById('dropdown-menu').contains(event.target);
        if (!isClickInside) {
            document.getElementById('dropdown-menu').classList.add('hidden');
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
    document.getElementById('scroll-blog').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('blog').offsetTop, 800);
    });

    document.getElementById('scroll-contact').addEventListener('click', function(event) {
        event.preventDefault();
        smoothScrollTo(document.getElementById('contact').offsetTop, 800);
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

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 2,
            },
            1280: {
                slidesPerView: 3,
            },
        },
    });

    </script>
@endsection
