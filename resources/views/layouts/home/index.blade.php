<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioStark</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}" />
    <meta property="og:title" content="BioStark" />
    <meta property="og:type" content="website" />
    <meta
    name="description"
    content="Kami menyediakan obat-obatan dan vaksin untuk meningkatkan kesehatan masyarakat, dengan fokus pada produk yang aman dan efektif."/>
    <meta
    property="og:description"
    content="Kami menyediakan obat-obatan dan vaksin untuk meningkatkan kesehatan masyarakat, dengan fokus pada produk yang aman dan efektif."/>
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
            background-color: rgba(1, 36, 34, 0.945);
            box-shadow: 0 4px 6px rgba(1, 36, 34, 0.5);
        }
        section {
            pointer-events: auto;
        }


    </style>
</head>
<body class="bg-gray-100 text-gray-900 overflow-x-hidden">

@yield('content')

<!-- Footer -->
<footer class="bg-custom-green text-white py-6">
    <div class="container mx-auto px-6 text-center">
        <!-- Logo and Brand centered -->
        <div class="flex flex-col justify-center items-center mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-10 w-auto mb-2">
            <p class="text-lg font-semibold">BIOSTARK</p>
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
    document.getElementById('burger-menu-button').addEventListener('click', function () {
        var mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>

@yield('script')
</body>
</html>
