<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Batik Madura') - Warisan Budaya Indonesia</title>
    <meta name="description" content="@yield('meta_description', 'Temukan koleksi batik Madura asli dengan kualitas terbaik. Menjaga tradisi dan keaslian batik Madura.')">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/menu.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Base styling */
        :root {
            --primary-dark: #27445D;
            --primary-light: #497D74;
            --accent: #F0C808;
            --text-light: #F9FAFB;
            --transition: all 0.3s ease;
        }

        /* Modern Nav Styling */
        .modern-nav {
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 1280px;
            /* max-w-screen-xl equivalent */
            margin: 1rem auto;
            border-radius: 9999px;
            /* Oval shape */
            background: linear-gradient(to right, var(--primary-dark), var(--primary-light));
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            backdrop-filter: blur(8px);
            transition: transform 0.4s cubic-bezier(0.33, 1, 0.68, 1),
                opacity 0.4s cubic-bezier(0.33, 1, 0.68, 1),
                box-shadow 0.4s cubic-bezier(0.33, 1, 0.68, 1);
            z-index: 50;
        }

        /* Header states */
        .modern-nav.header-hidden {
            transform: translate(-50%, -100%);
            opacity: 0;
            pointer-events: none;
        }

        .modern-nav.header-visible {
            transform: translate(-50%, 0);
            opacity: 1;
        }

        .modern-nav.header-pinned {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Active and hover effects */
        .nav-link {
            position: relative;
            transition: var(--transition);
            padding-bottom: 4px;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            color: var(--accent);
            font-weight: 600;
        }

        .nav-link.active::after {
            width: 100%;
            background-color: var(--accent);
        }

        html {
        scroll-behavior: smooth;
    }
    
    /* Improved hover effects for all links */
    a {
        transition: all 0.3s ease;
    }
    
    /* Enhanced social icons with pulse effect */
    .social-icon {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }
    
    .social-icon:hover {
        background-color: rgba(255, 255, 255, 0.2);
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
    }
    
    /* Subtle float animation for cards if used in the content */
    .card-float {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
    }
    
    .card-float:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    /* Button animations */
    .btn-animated {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    
    .btn-animated:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: all 0.6s ease;
    }
    
    .btn-animated:hover:before {
        left: 100%;
    }
        /* Mobile menu animations */
        .menu-button span {
            display: block;
            width: 24px;
            height: 2px;
            margin-bottom: 5px;
            background-color: white;
            transition: var(--transition);
        }

        .menu-button.active span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }

        .menu-button.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-button.active span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* Modern dropdown styling */
        .dropdown-menu {
            transform: translateY(10px);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 0.75rem;
            overflow: hidden;
        }

        .dropdown-menu.show {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        .dropdown-item {
            transition: var(--transition);
            border-left: 3px solid transparent;
        }

        .dropdown-item:hover {
            border-left-color: var(--primary-dark);
            background-color: rgba(79, 70, 229, 0.1);
        }

        /* Footer styling */
        .social-icon {
            transition: var(--transition);
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
            transition: var(--transition);
        }

        .footer-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background-color: var(--accent);
            transition: width 0.3s ease;
        }

        .footer-link:hover::after {
            width: 100%;
        }

        /* Add extra padding to main content to account for fixed navbar */
        main {
            padding-top: 6rem;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Hide Alpine elements before initialization */
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans min-h-screen flex flex-col">

    {{-- Modern Oval Navbar --}}
    @if (!Request::is('admin*'))
    <nav x-data="{ 
            mobileMenuOpen: false,
            lastScrollTop: 0,
            headerVisible: true,
            headerPinned: false,
            handleScroll() {
                let st = window.pageYOffset || document.documentElement.scrollTop;
                
                // Determine scroll direction
                if (st > this.lastScrollTop && st > 100) {
                    // Scrolling down & past threshold
                    this.headerVisible = false;
                } else {
                    // Scrolling up or at top
                    this.headerVisible = true;
                }
                
                // Set pinned state for styling
                this.headerPinned = st > 50;
                
                this.lastScrollTop = st <= 0 ? 0 : st;
            }
        }"
        x-init="window.addEventListener('scroll', handleScroll)"
        class="modern-nav"
        :class="{
            'header-hidden': !headerVisible,
            'header-visible': headerVisible,
            'header-pinned': headerPinned
        }">
        <div class="px-6">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a class="text-2xl font-bold tracking-tight flex items-center" href="{{ route('home') }}">
                        <span class="text-white">Batik</span>
                        <span class="text-yellow-400 ml-1">Madura</span>
                    </a>
                </div>

                <!-- Desktop Navigation with Active State Indicators -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}"
                        class="nav-link text-gray-100 hover:text-white font-medium {{ Request::is('/') ? 'active' : '' }}">
                        Beranda
                    </a>

                    <!-- Dropdown Catalog with Active State -->
                    <div x-data="{ open: false }" @click.away="open = false" class="relative">
                        <button @click="open = !open"
                            class="nav-link flex items-center text-gray-100 hover:text-white font-medium focus:outline-none {{ Request::is('catalog*') ? 'active' : '' }}">
                            <span>Katalog</span>
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200" :class="{'rotate-180': open}"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-1"
                            class="absolute z-50 mt-2 w-48 rounded-lg shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none dropdown-menu"
                            :class="{'show': open}">

                            <a href="{{ route('catalog') }}"
                                class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:text-indigo-700 transition {{ Request::is('catalog') && !Request::is('catalog/category*') ? 'bg-indigo-50 text-indigo-700 border-l-indigo-700' : '' }}">
                                Semua Jenis
                            </a>

                            @foreach ($categories as $category)
                            <a href="{{ route('catalog.category', $category->idCategory) }}"
                                class="dropdown-item block px-4 py-2 text-sm text-gray-700 hover:text-indigo-700 transition {{ Request::is('catalog/category/'.$category->idCategory) ? 'bg-indigo-50 text-indigo-700 border-l-indigo-700' : '' }}">
                                {{ $category->nameCategory }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <a href="{{ route('tentang') }}"
                        class="nav-link text-gray-100 hover:text-white font-medium {{ Request::is('tentang') ? 'active' : '' }}">
                        Tentang Kami
                    </a>
                </div>

                <!-- Mobile menu button with improved animation -->
<div class="lg:hidden flex items-center">
    <button @click="$store.navStore.mobileMenuOpen = !$store.navStore.mobileMenuOpen"
        class="menu-button focus:outline-none relative w-8 h-8 flex flex-col justify-center items-center"
        :class="{'active': $store.navStore.mobileMenuOpen}">
        <span class="block w-6 h-0.5 bg-indigo-600 transform transition-all duration-300" 
            :class="$store.navStore.mobileMenuOpen ? 'rotate-45 translate-y-1.5' : ''"></span>
        <span class="block w-6 h-0.5 bg-indigo-600 mt-1.5 transition-all duration-300" 
            :class="$store.navStore.mobileMenuOpen ? 'opacity-0' : 'opacity-100'"></span>
        <span class="block w-6 h-0.5 bg-indigo-600 mt-1.5 transform transition-all duration-300" 
            :class="$store.navStore.mobileMenuOpen ? '-rotate-45 -translate-y-1.5' : ''"></span>
    </button>
</div>
</div>
</div>
</nav>

<!-- Mobile Navigation with Enhanced Styling and Animations -->
<div x-data="{}" x-show="$store.navStore.mobileMenuOpen"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform -translate-y-4"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform -translate-y-4"
    class="lg:hidden fixed top-20 inset-x-4 z-40 bg-gradient-to-br from-indigo-600 to-indigo-800 rounded-xl shadow-2xl p-5 space-y-3 text-gray-800"
    x-init="
    window.navStore = function() {
        return {
            mobileMenuOpen: false
        }
    }
    Alpine.store('navStore', navStore())
    ">
    <div class="flex flex-col space-y-1">
        <a href="{{ route('home') }}"
            class="block py-2.5 px-4 text-base font-medium rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out transform hover:translate-x-1 hover:shadow-md {{ Request::is('/') ? 'bg-indigo-700 text-white shadow-md' : 'text-gray-100' }}">
            <div class="flex items-center">
                <i class="fas fa-home mr-2"></i>
                <span>Beranda</span>
            </div>
        </a>

        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="flex w-full justify-between items-center py-2.5 px-4 text-base font-medium rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out transform hover:translate-x-1 hover:shadow-md {{ Request::is('catalog*') ? 'bg-indigo-700 text-white shadow-md' : 'text-gray-100' }}">
                <div class="flex items-center">
                    <i class="fas fa-th-large mr-2"></i>
                    <span>Katalog</span>
                </div>
                <svg class="w-4 h-4 transition-transform duration-300" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <div x-show="open" 
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                class="ml-4 mt-2 space-y-1">
                <a href="{{ route('catalog') }}"
                    class="block py-2 px-3 text-sm rounded-md hover:bg-indigo-700 transition-all duration-300 ease-in-out transform hover:translate-x-1 {{ Request::is('catalog') && !Request::is('catalog/category*') ? 'bg-indigo-800 text-white' : 'text-gray-100' }}">
                    <i class="fas fa-layer-group mr-2"></i>
                    Semua Jenis
                </a>

                @foreach ($categories as $category)
                <a href="{{ route('catalog.category', $category->idCategory) }}"
                    class="block py-2 px-3 text-sm rounded-md hover:bg-indigo-700 transition-all duration-300 ease-in-out transform hover:translate-x-1 {{ Request::is('catalog/category/'.$category->idCategory) ? 'bg-indigo-800 text-white' : 'text-gray-100' }}">
                    <i class="fas fa-tag mr-2"></i>
                    {{ $category->nameCategory }}
                </a>
                @endforeach
            </div>
        </div>

        <a href="{{ route('tentang') }}"
            class="block py-2.5 px-4 text-base font-medium rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out transform hover:translate-x-1 hover:shadow-md {{ Request::is('tentang') ? 'bg-indigo-700 text-white shadow-md' : 'text-gray-100' }}">
            <div class="flex items-center">
                <i class="fas fa-info-circle mr-2"></i>
                <span>Tentang Kami</span>
            </div>
        </a>
    </div>
</div>
@endif

{{-- Main Content --}}
<main class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow">
    @yield('content')
</main>

{{-- Modern Footer with Enhanced Design --}}
@if (!Request::is('admin*'))
<footer class="bg-gradient-to-br from-[#1e3a52] to-[#3d6e65] text-white">
    <div class="mx-auto max-w-screen-xl px-4 pt-16 pb-10">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div class="transform transition duration-500 hover:translate-y-[-5px]">
                <div class="flex items-center">
                    <div class="text-3xl font-bold relative">
                        <span class="text-white">Batik</span>
                        <span class="text-yellow-300">Madura</span>
                        <div class="absolute bottom-0 left-0 w-0 bg-yellow-300 h-0.5 transition-all duration-300 group-hover:w-full"></div>
                    </div>
                </div>

                <p class="mt-4 max-w-md text-sm text-gray-300">
                    Menyediakan berbagai batik asli Madura dengan kualitas terbaik. Kami berkomitmen untuk mempertahankan tradisi dan keaslian batik Madura.
                </p>

                <div class="mt-6 flex space-x-4">
                    <a href="https://wa.me/+6287830325994" target="_blank" 
                        class="social-icon text-white hover:text-green-400 transition-all duration-300 transform hover:scale-110 hover:rotate-6" 
                        aria-label="WhatsApp">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                    <a href="https://www.instagram.com/rumah.batik.madura" target="_blank" 
                        class="social-icon text-white hover:text-pink-400 transition-all duration-300 transform hover:scale-110 hover:rotate-6" 
                        aria-label="Instagram">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="mailto:batikmadurarumah@gmail.com" 
                        class="social-icon text-white hover:text-red-400 transition-all duration-300 transform hover:scale-110 hover:rotate-6" 
                        aria-label="Email">
                        <i class="fas fa-envelope text-xl"></i>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-3">
                <div class="transform transition duration-500 hover:translate-y-[-5px]">
                    <p class="font-medium text-white text-lg mb-3 border-b border-gray-500 pb-2 relative group">
                        <span>Kategori Batik</span>
                        <span class="absolute bottom-0 left-0 w-0 bg-yellow-300 h-0.5 transition-all duration-300 group-hover:w-full"></span>
                    </p>
                    <ul class="mt-4 space-y-3 text-sm">
                        @foreach ($categories->take(5) as $category)
                        <li>
                            <a href="{{ route('catalog.category', $category->idCategory) }}" 
                                class="footer-link text-gray-300 hover:text-white flex items-center transition-all duration-300 transform hover:translate-x-1">
                                <i class="fas fa-chevron-right text-xs mr-2 text-yellow-300"></i>
                                {{ $category->nameCategory }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="transform transition duration-500 hover:translate-y-[-5px]">
                    <p class="font-medium text-white text-lg mb-3 border-b border-gray-500 pb-2 relative group">
                        <span>Navigasi</span>
                        <span class="absolute bottom-0 left-0 w-0 bg-yellow-300 h-0.5 transition-all duration-300 group-hover:w-full"></span>
                    </p>
                    <ul class="mt-4 space-y-3 text-sm">
                        <li>
                            <a href="{{ route('home') }}" 
                                class="footer-link text-gray-300 hover:text-white flex items-center transition-all duration-300 transform hover:translate-x-1">
                                <i class="fas fa-home text-xs mr-2 text-yellow-300"></i>
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('catalog') }}" 
                                class="footer-link text-gray-300 hover:text-white flex items-center transition-all duration-300 transform hover:translate-x-1">
                                <i class="fas fa-th-large text-xs mr-2 text-yellow-300"></i>
                                Semua Produk
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tentang') }}" 
                                class="footer-link text-gray-300 hover:text-white flex items-center transition-all duration-300 transform hover:translate-x-1">
                                <i class="fas fa-info-circle text-xs mr-2 text-yellow-300"></i>
                                Tentang Kami
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="transform transition duration-500 hover:translate-y-[-5px]">
                    <p class="font-medium text-white text-lg mb-3 border-b border-gray-500 pb-2 relative group">
                        <span>Kontak</span>
                        <span class="absolute bottom-0 left-0 w-0 bg-yellow-300 h-0.5 transition-all duration-300 group-hover:w-full"></span>
                    </p>
                    <ul class="mt-4 space-y-3 text-sm">
                        <li class="flex items-start group">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-yellow-300 group-hover:scale-110 transition-transform duration-300"></i>
                            <span class="text-gray-300 group-hover:text-white transition-colors duration-300">
                                Jl. Hercules Perum Bumi Antariksa No.E37, Klegen, Kec. Kartoharjo, Kota Madiun, Jawa Timur
                            </span>
                        </li>
                        <li class="flex items-center group">
                            <i class="fas fa-phone mt-1 mr-2 text-yellow-300 group-hover:scale-110 transition-transform duration-300"></i>
                            <a href="tel:+6287830325994" 
                                class="footer-link text-gray-300 hover:text-white transition-colors duration-300">
                                +62 878-3032-5994
                            </a>
                        </li>
                        <li class="flex items-center group">
                            <i class="fas fa-envelope mt-1 mr-2 text-yellow-300 group-hover:scale-110 transition-transform duration-300"></i>
                            <a href="mailto:batikmadurarumah@gmail.com" 
                                class="footer-link text-gray-300 hover:text-white transition-colors duration-300">
                                batikmadurarumah@gmail.com
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-white/10 pt-8">
            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                <p class="text-center text-sm text-gray-300">
                    &copy; 2025 Batik Madura. Semua Hak Dilindungi.
                </p>

                <ul class="flex gap-6 text-sm text-gray-300">
                    <li>
                        <a href="#" class="footer-link relative hover:text-white transition-colors duration-300 group">
                            Kebijakan Privasi
                            <span class="absolute bottom-0 left-0 w-0 bg-yellow-300 h-0.5 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="footer-link relative hover:text-white transition-colors duration-300 group">
                            Syarat & Ketentuan
                            <span class="absolute bottom-0 left-0 w-0 bg-yellow-300 h-0.5 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@endif

<!-- Additional styles for animations -->
<style>
    /* Smooth scrolling for the whole page */
    
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('navStore', {
            mobileMenuOpen: false
        });
        
        // Intersection Observer for scroll animations
        if ('IntersectionObserver' in window) {
            const appearOnScroll = new IntersectionObserver(
                (entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-fade-in');
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.1 }
            );
            
            document.querySelectorAll('.animate-on-scroll').forEach(element => {
                appearOnScroll.observe(element);
            });
        }
        
        // Smooth background transition on page load
        document.body.classList.add('transition-ready');
        setTimeout(() => {
            document.body.classList.add('transition-complete');
        }, 100);
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        const navStore = Alpine.store('navStore');
        if (navStore.mobileMenuOpen && !e.target.closest('.menu-button') && !e.target.closest('[x-show="$store.navStore.mobileMenuOpen"]')) {
            navStore.mobileMenuOpen = false;
        }
    });
    
    // Add parallax effect to header if there's one
    window.addEventListener('scroll', () => {
        const scrollPosition = window.scrollY;
        const header = document.querySelector('.parallax-header');
        if (header) {
            header.style.backgroundPositionY = `${scrollPosition * 0.5}px`;
        }
    });
</script>

@stack('scripts')