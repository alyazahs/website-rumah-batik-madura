<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Batik Madura</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('js/menu.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .hero-debug {
            border: 2px solid red;
        }

        /* Custom styling for modern navbar */
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #F9FAFB;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .dropdown-menu {
            transform: translateY(10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .dropdown-menu.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .menu-button span {
            display: block;
            width: 24px;
            height: 2px;
            margin-bottom: 4px;
            background-color: white;
            transition: all 0.3s ease;
        }

        .menu-button.active span:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }

        .menu-button.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-button.active span:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
        }

        /* Modern footer styling */
        .social-icon {
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 9999px;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .social-icon:hover {
            transform: translateY(-3px);
            background-color: rgba(255, 255, 255, 0.2);
        }

        .footer-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .footer-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background-color: currentColor;
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

    {{-- Navbar --}}
    @if (!Request::is('admin*'))
    <nav class="bg-gradient-to-r from-[#27445D] to-[#497D74] text-white" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-screen-xl mx-auto px-6">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a class="text-2xl font-bold tracking-tight flex items-center" href="{{ route('home') }}">
                        <span class="text-white">Batik</span>
                        <span class="text-yellow-400 ml-1">Madura</span>
                    </a>
                </div>

                <!-- Desktop Navigation with Fixed Dropdown -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="nav-link text-gray-100 hover:text-white font-medium">Beranda</a>

                    <!-- Dropdown Catalog - Fixed Version -->
                    <div x-data="{ open: false }" @click.away="open = false" class="relative">
                        <button @click="open = !open"
                            class="nav-link flex items-center text-gray-100 hover:text-white font-medium focus:outline-none">
                            <span>Catalog</span>
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{'rotate-180': open}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Important: x-cloak will hide the dropdown by default until Alpine initializes -->
                        <div x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="absolute z-50 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                            @foreach ($categories as $category)
                            <a href="{{ route('catalog.category', $category->idCategory) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-600 transition">
                                {{ $category->nameCategory }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('tentang') }}" class="nav-link text-gray-100 hover:text-white font-medium">Tentang Kami</a>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="menu-button focus:outline-none" :class="{'active': mobileMenuOpen}">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="lg:hidden py-3 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('home') }}" class="block py-2 px-3 text-base font-medium rounded-md hover:bg-indigo-500 transition duration-150">Beranda</a>

                    <div x-data="{ open: false }">
                        <button @click="open = !open" class="flex w-full justify-between items-center py-2 px-3 text-base font-medium rounded-md hover:bg-indigo-500 transition duration-150">
                            <span>Catalog</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" class="ml-4 mt-2 space-y-1">
                            @foreach ($categories as $category)
                            <a href="{{ route('catalog.category', $category->idCategory) }}" class="block py-2 px-3 text-sm rounded-md hover:bg-indigo-500 transition duration-150">
                                {{ $category->nameCategory }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('tentang') }}" class="block py-2 px-3 text-base font-medium rounded-md hover:bg-indigo-500 transition duration-150">Tentang Kami</a>
                </div>
            </div>
        </div>
    </nav>
    @endif

    {{-- Konten Utama --}}
    <main class="w-full max-w-screen-l mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow">
        @yield('content')
    </main>

    {{-- Modern Footer --}}
    @if (!Request::is('admin*'))
    <footer class="bg-gradient-to-r from-[#27445D] to-[#497D74] text-white">
        <div class="mx-auto max-w-screen-xl px-4 pt-12 pb-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <div>
                    <div class="flex items-center">
                        <div class="text-3xl font-bold">
                            <span class="text-white">Batik</span>
                            <span class="text-yellow-300">Madura</span>
                        </div>
                    </div>

                    <p class="mt-4 max-w-md text-sm text-gray-300">
                        Menyediakan berbagai batik asli Madura dengan kualitas terbaik. Kami berkomitmen untuk mempertahankan tradisi dan keaslian batik Madura.
                    </p>

                    <div class="mt-6 flex space-x-4">
                        <a href="https://wa.me/+6287830325994" target="_blank" class="social-icon text-white hover:text-green-400">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.instagram.com/rumah.batik.madura" target="_blank" class="social-icon text-white hover:text-pink-400">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="mailto:batikmadurarumah@gmail.com" class="social-icon text-white hover:text-red-400">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-3">
                    <div>
                        <p class="font-medium text-white">Kategori Batik</p>
                        <ul class="mt-4 space-y-2 text-sm">
                            @foreach ($categories->take(5) as $category)
                            <li>
                                <a href="{{ route('catalog.category', $category->idCategory) }}" class="footer-link text-gray-300 hover:text-white">
                                    {{ $category->nameCategory }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-white">Navigasi</p>
                        <ul class="mt-4 space-y-2 text-sm">
                            <li>
                                <a href="{{ route('home') }}" class="footer-link text-gray-300 hover:text-white">Beranda</a>
                            </li>
                            <li>
                                <a href="{{ route('catalog') }}" class="footer-link text-gray-300 hover:text-white">Semua Produk</a>
                            </li>
                            <li>
                                <a href="{{ route('tentang') }}" class="footer-link text-gray-300 hover:text-white">Tentang Kami</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-white">Kontak</p>
                        <ul class="mt-4 space-y-2 text-sm">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-2 text-gray-400"></i>
                                <span class="text-gray-300">Jl. Hercules Perum Bumi Antariksa No.E37, Klegen, Kec. Kartoharjo, Kota Madiun, Jawa Timur</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone mt-1 mr-2 text-gray-400"></i>
                                <a href="tel:+6287830325994" class="footer-link text-gray-300 hover:text-white">
                                    +62 878-3032-5994
                                </a>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mt-1 mr-2 text-gray-400"></i>
                                <a href="mailto:batikmadurarumah@gmail.com" class="footer-link text-gray-300 hover:text-white">
                                    batikmadurarumah@gmail.com
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mt-10 border-t border-white/10 pt-6">
                <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                    <p class="text-center text-sm text-gray-300">
                        &copy; 2025 Batik Madura. Semua Hak Dilindungi.
                    </p>

                    <ul class="flex gap-4 text-sm text-gray-300">
                        <li>
                            <a href="#" class="footer-link hover:text-white">Kebijakan Privasi</a>
                        </li>
                        <li>
                            <a href="#" class="footer-link hover:text-white">Syarat & Ketentuan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    @endif

</body>

</html>