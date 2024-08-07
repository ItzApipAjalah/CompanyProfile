<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioStark</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
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
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }

        body {
            -ms-overflow-style: scrollbar;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Custom Animations */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
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

        header.scrolled {
            background-color: rgba(17,24,39, 0.9);
            box-shadow: 0 4px 6px rgba(17,24,39, 0.1);
        }
        section {
            pointer-events: auto;
        }


    </style>
</head>
<body class="bg-gray-100 text-gray-900 overflow-x-hidden">

<!-- Header -->
<header class="fixed top-0 left-0 right-0 bg-transparent text-white shadow-none z-50">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <!-- Logo and Brand Name -->
        <div class="flex items-center space-x-3">
            <a class="text-2xl font-bold tracking-widest" href="{{ route('home') }}">BIOSTARK</a>
        </div>
        <!-- Navigation Links (Hidden on mobile by default) -->
        <nav class="hidden lg:flex items-center space-x-6">
            <a href="{{ route('profile') }}" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Profile</a>
            <a href="#products" id="scroll-produk" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Produk</a>
            <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Blog</a>
            <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-blue-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Kontak</a>
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
            <a href="{{ route('profile') }}" class="hover:text-blue-400">Profile</a>
            <a href="#products" id="scroll-produk" class="hover:text-blue-400">Produk</a>
            <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-blue-400">Blog</a>
            <a href="{{ route('home') }}#contact" id="scroll-contact" class="hover:text-blue-400">Kontak</a>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center overflow-hidden bg-gray-900" style="background-image: url('https://i.ibb.co/w40C2BG/medical-equipment-mrb88uk4se3ksu.png'); background-size: cover; background-position: center;" data-aos="fade-up">
    <!-- Background Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-gray-900"></div>
    <!-- Hero Content -->
    <div class="relative z-10 text-center px-6 py-12 md:px-12 md:py-24">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">Produk yang tersedia di <span class="text-blue-400">biostark</span></h1>
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

<!-- Products Section -->
<section id="products" class="bg-gray-100 py-16" data-aos="fade-up">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-gray-800">Semua produk biostark</h2>
        <p class="mt-4 text-lg text-center text-gray-700">
            Kami merupakan distributor alat kesehatan yang menyediakan alat kesehatan. Dengan dukungan merek-merek terpercaya, kami berkomitmen untuk menyediakan produk-produk berkualitas tinggi guna meningkatkan mutu layanan kesehatan di Indonesia.
        </p>

        @foreach($categories as $category)
        <div class="mt-12">
            <h3 class="text-2xl font-semibold text-gray-800">{{ $category->name }}</h3>
            <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach($category->produks as $produk)
                <div class="relative bg-white rounded-lg overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="{{ $loop->parent->index * 100 }}">
                    <img src="{{ asset('storage/' . $produk->thumbnail) }}" alt="{{ $produk->name }} Image" class="w-full h-56 object-cover">
                    <div class="absolute inset-0 flex items-end justify-start p-6 bg-black bg-opacity-50">
                        <div class="text-left">
                            <h3 class="text-xl font-semibold text-white">{{ $produk->name }}</h3>
                            <p class="mt-2 text-white">{{ $produk->category->name }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>


<!-- Footer -->
<footer class="bg-gray-900 text-white py-6">
    <div class="container mx-auto px-6 text-center">
        <!-- Footer Sections -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <!-- Logo and Brand -->
            <div class="mb-4 md:mb-0">
                <img src="https://i.ibb.co.com/NTtNPXr/logo-removebg-preview.png" alt="Logo" class="h-10 w-auto mx-auto mb-2">
                <p class="text-lg font-semibold">BIOSTARK</p>
            </div>
            <div class="flex space-x-3 mb-4 md:mb-0">
                <a href="#" class="text-blue-400 hover:text-blue-500 transition">
                    <svg width="24px" height="24px" viewBox="0 0 0.48 0.48" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#0A66C2" d="M0.367 0.367h-0.053V0.283c0 -0.02 0 -0.046 -0.028 -0.046 -0.028 0 -0.032 0.022 -0.032 0.044v0.085H0.2V0.195h0.051v0.023h0.001c0.01 -0.018 0.03 -0.028 0.051 -0.028 0.054 0 0.064 0.036 0.064 0.082zM0.14 0.171a0.031 0.031 0 0 1 -0.031 -0.031c0 -0.017 0.014 -0.031 0.031 -0.031s0.031 0.014 0.031 0.031c0 0.017 -0.014 0.031 -0.031 0.031zm0.027 0.195h-0.053V0.195h0.053zM0.393 0.06H0.087A0.026 0.026 0 0 0 0.06 0.086v0.308a0.026 0.026 0 0 0 0.027 0.026h0.307a0.026 0.026 0 0 0 0.027 -0.026V0.086a0.026 0.026 0 0 0 -0.027 -0.026z"/></svg>
                </a>
                <a href="#" class="text-blue-600 hover:text-blue-700 transition">
                    <svg width="24" height="24" viewBox="0 0 0.72 0.72" xmlns="http://www.w3.org/2000/svg"><path d="M0.12 0.09c-0.033 0 -0.06 0.027 -0.06 0.06v0.48c0 0.033 0.027 0.06 0.06 0.06h0.48c0.033 0 0.06 -0.027 0.06 -0.06V0.15c0 -0.033 -0.027 -0.06 -0.06 -0.06z" fill="#30497b"/><path d="M0.12 0.06a0.06 0.06 0 0 0 -0.06 0.06v0.48a0.06 0.06 0 0 0 0.06 0.06h0.48a0.06 0.06 0 0 0 0.06 -0.06V0.12a0.06 0.06 0 0 0 -0.06 -0.06z" fill="#3b5998"/><path d="M0.51 0.18c-0.066 0 -0.12 0.054 -0.12 0.12v0.09h-0.06v0.09h0.06v0.21h0.09v-0.21h0.074L0.57 0.39h-0.09v-0.09c0 -0.018 0.013 -0.03 0.03 -0.03h0.06V0.18z" fill="#30497b"/><path d="M0.51 0.15a0.12 0.12 0 0 0 -0.12 0.12v0.09h-0.06v0.09h0.06v0.21h0.09v-0.21h0.074L0.57 0.36h-0.09V0.27a0.03 0.03 0 0 1 0.03 -0.03h0.06V0.15z" fill="#ecf0f1"/><path fill="#bdc3c7" d="M0.39 0.66h0.09v0.03h-0.09z"/></svg>
                </a>
                <a href="#" class="text-red-600 hover:text-red-700 transition">
                    <svg width="24px" height="24px" viewBox="0 0 0.48 0.48" xmlns="http://www.w3.org/2000/svg" fill="none"><path fill="#1D9BF0" d="M0.407 0.154q0 0.006 0 0.011c0 0.114 -0.087 0.245 -0.245 0.245v0A0.244 0.244 0 0 1 0.03 0.372a0.173 0.173 0 0 0 0.128 -0.036 0.086 0.086 0 0 1 -0.08 -0.06c0.013 0.002 0.026 0.002 0.039 -0.002A0.086 0.086 0 0 1 0.047 0.19v-0.001c0.012 0.007 0.025 0.01 0.039 0.011a0.086 0.086 0 0 1 -0.027 -0.115 0.244 0.244 0 0 0 0.178 0.09 0.086 0.086 0 0 1 0.147 -0.079 0.174 0.174 0 0 0 0.055 -0.021 0.086 0.086 0 0 1 -0.038 0.048A0.171 0.171 0 0 0 0.45 0.11a0.174 0.174 0 0 1 -0.043 0.045"/></svg>
                </a>
            </div>
        </div>

        <!-- Footer Links -->
        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-8 mb-4">
            <a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a>
            <a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a>
            <a href="#" class="text-gray-400 hover:text-white transition">FAQ</a>
            <a href="#" class="text-gray-400 hover:text-white transition">Support</a>
        </div>

        <!-- Footer Bottom -->
        <p class="text-gray-400 text-sm">
            &copy; 2024 nama perusahaan. All rights reserved.
        </p>
    </div>
</footer>



<!-- AOS JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    AOS.init({
        duration: 1200,
        once: false,
        mirror: true,
    });
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
<script>
    document.getElementById('burger-menu-button').addEventListener('click', function () {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
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

</body>
</html>
