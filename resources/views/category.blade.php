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
            <a href="#products" id="scroll-produk" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Produk</a>
            <a href="{{ route('blog') }}" id="scroll-blog" class="hover:text-teal-400 hover:bg-white hover:bg-opacity-20 px-3 py-2 rounded transition">Blog</a>
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
            <a href="#products" id="scroll-produk" class="hover:text-teal-400">Produk</a>
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
        <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">Produk <span class="text-teal-500">{{ $category->name }}</span></h1>
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
        <h2 class="text-3xl font-bold text-center text-gray-800">Produk {{ $category->name }}</h2>


        <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @forelse($produks as $produk)
                <div class="relative bg-white rounded-lg overflow-hidden cursor-pointer"
                     onclick="showProductModal('{{ $produk->name }}', '{{ asset('storage/' . $produk->thumbnail) }}', `{!! addslashes($produk->description) !!}`)"
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <img src="{{ asset('storage/' . $produk->thumbnail) }}" alt="{{ $produk->name }} Image" class="w-full h-56 object-cover">
                    <div class="absolute inset-0 flex items-end justify-start p-6 bg-black bg-opacity-10">
                        <div class="text-left">
                            <h3 class="text-xl font-semibold text-white">{{ $produk->name }}</h3>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Tidak ada produk dalam kategori ini.</p>
            @endforelse
        </div>
    </div>
</section>


<!-- Modal Structure -->
<div id="productModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 hidden transition-opacity duration-300 ease-out opacity-0">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-6xl md:w-11/12 lg:w-2/3 xl:w-1/2 relative overflow-hidden transform scale-95 transition-transform duration-300 ease-out">
        <div class="p-8 max-h-[80vh] overflow-y-auto">
            <h3 id="modalName" class="text-4xl font-semibold text-gray-900 mb-6"></h3>
            <img id="modalThumbnail" src="" alt="Product Image" class="w-full h-96 object-cover rounded-md mb-6">
            <p id="modalDescription" class="text-gray-700 mb-8 text-xl"></p>
            <a id="modalWhatsappButton" href="#" class="flex items-center justify-center space-x-3 w-full text-center py-3 px-6 bg-green-500 text-white rounded-lg font-semibold hover:bg-green-600 transition duration-300">
                <svg width="24" height="24" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 31c7.732 0 14-6.268 14-14S23.732 3 16 3 2 9.268 2 17c0 2.51.661 4.867 1.818 6.905L2 31l7.315-1.696A13.94 13.94 0 0 0 16 31m0-2.154c6.543 0 11.846-5.303 11.846-11.846 0-6.542-5.303-11.846-11.846-11.846C9.458 5.154 4.154 10.458 4.154 17c0 2.526.79 4.868 2.138 6.79L5.23 27.77l4.049-1.013a11.8 11.8 0 0 0 6.72 2.09" fill="#BFC8D0"/><path d="M28 16c0 6.627-5.373 12-12 12-2.528 0-4.873-.782-6.807-2.116L5.09 26.909l1.075-4.03A11.95 11.95 0 0 1 4 16C4 9.373 9.373 4 16 4s12 5.373 12 12" fill="url(#a)"/><path fill-rule="evenodd" clip-rule="evenodd" d="M16 30c7.732 0 14-6.268 14-14S23.732 2 16 2 2 8.268 2 16c0 2.51.661 4.867 1.818 6.905L2 30l7.315-1.696A13.94 13.94 0 0 0 16 30m0-2.154c6.543 0 11.846-5.303 11.846-11.846 0-6.542-5.303-11.846-11.846-11.846C9.458 4.154 4.154 9.458 4.154 16c0 2.526.79 4.868 2.138 6.79L5.23 26.77l4.049-1.013a11.8 11.8 0 0 0 6.72 2.09" fill="#fff"/><path d="M12.5 9.5c-.333-.669-.844-.61-1.36-.61-.921 0-2.359 1.105-2.359 3.16 0 1.684.742 3.528 3.243 6.286 2.414 2.662 5.585 4.039 8.218 3.992s3.175-2.313 3.175-3.078c0-.339-.21-.508-.356-.554-.897-.43-2.552-1.233-2.928-1.384-.377-.15-.573.054-.695.165-.342.325-1.019 1.284-1.25 1.5s-.578.106-.721.024c-.53-.212-1.964-.85-3.107-1.958-1.415-1.371-1.498-1.843-1.764-2.263-.213-.336-.057-.542.021-.632.305-.351.726-.894.914-1.164s.04-.679-.05-.934c-.387-1.097-.715-2.015-.981-2.55" fill="#fff"/><defs><linearGradient id="a" x1="26.5" y1="7" x2="4" y2="28" gradientUnits="userSpaceOnUse"><stop stop-color="#5BD066"/><stop offset="1" stop-color="#27B43E"/></linearGradient></defs></svg>
                <span>Hubungi via WhatsApp</span>
            </a>
        </div>
        <button id="modalClose" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900 text-4xl font-bold">
            &times;
        </button>
    </div>
</div>







@endsection

@section('script')
<script>
    function showProductModal(name, thumbnail, description) {
        const modal = document.getElementById('productModal');
        const modalContent = modal.querySelector('div');

        document.getElementById('modalName').textContent = name;
        document.getElementById('modalThumbnail').src = thumbnail;
        document.getElementById('modalDescription').innerHTML = description;
        document.getElementById('modalWhatsappButton').href = `https://wa.me/6281380568978?text=Halo,%20Aku%20tertarik%20dengan%20Produk%20ini%20 ( ${name} )`;

        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0', 'scale-95');
            modal.classList.add('opacity-100', 'scale-100');
        }, 10); // Slight delay to allow class change to take effect

        document.getElementById('modalClose').onclick = function() {
            closeProductModal();
        }

        document.getElementById('productModal').onclick = function(event) {
            if (event.target === this) {
                closeProductModal();
            }
        }
    }

    function closeProductModal() {
        const modal = document.getElementById('productModal');
        modal.classList.remove('opacity-100', 'scale-100');
        modal.classList.add('opacity-0', 'scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300); // Match the duration with the CSS transition duration
    }
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

