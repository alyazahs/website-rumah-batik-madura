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
            max-width: 1280px; /* max-w-screen-xl equivalent */
            margin: 1rem auto;
            border-radius: 9999px; /* Oval shape */
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

                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="menu-button focus:outline-none" :class="{'active': mobileMenuOpen}">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation with Enhanced Styling -->
    <div x-data="{}" x-show="$store.navStore.mobileMenuOpen" 
        x-cloak
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="mobile-menu lg:hidden"
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
               class="block py-2 px-3 text-base font-medium rounded-md hover:bg-indigo-500 transition duration-150 {{ Request::is('/') ? 'bg-indigo-600 text-white' : 'text-gray-100' }}">
               Beranda
            </a>

            <div x-data="{ open: false }">
                <button @click="open = !open" 
                    class="flex w-full justify-between items-center py-2 px-3 text-base font-medium rounded-md hover:bg-indigo-500 transition duration-150 {{ Request::is('catalog*') ? 'bg-indigo-600 text-white' : 'text-gray-100' }}">
                    <span>Katalog</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="open" class="ml-4 mt-2 space-y-1">
                    <a href="{{ route('catalog') }}" 
                       class="block py-2 px-3 text-sm rounded-md hover:bg-indigo-500 transition duration-150 {{ Request::is('catalog') && !Request::is('catalog/category*') ? 'bg-indigo-700 text-white' : 'text-gray-100' }}">
                       Semua Jenis
                    </a>
                    
                    @foreach ($categories as $category)
                    <a href="{{ route('catalog.category', $category->idCategory) }}" 
                       class="block py-2 px-3 text-sm rounded-md hover:bg-indigo-500 transition duration-150 {{ Request::is('catalog/category/'.$category->idCategory) ? 'bg-indigo-700 text-white' : 'text-gray-100' }}">
                        {{ $category->nameCategory }}
                    </a>
                    @endforeach
                </div>
            </div>

            <a href="{{ route('tentang') }}" 
               class="block py-2 px-3 text-base font-medium rounded-md hover:bg-indigo-500 transition duration-150 {{ Request::is('tentang') ? 'bg-indigo-600 text-white' : 'text-gray-100' }}">
               Tentang Kami
            </a>
        </div>
    </div>
    @endif

    {{-- Main Content --}}
    <main class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow">
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
                        <a href="https://wa.me/+6287830325994" target="_blank" class="social-icon text-white hover:text-green-400" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.instagram.com/rumah.batik.madura" target="_blank" class="social-icon text-white hover:text-pink-400" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="mailto:batikmadurarumah@gmail.com" class="social-icon text-white hover:text-red-400" aria-label="Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:col-span-2 lg:grid-cols-3">
                    <div>
                        <p class="font-medium text-white text-lg mb-3 border-b border-gray-500 pb-2">Kategori Batik</p>
                        <ul class="mt-4 space-y-3 text-sm">
                            @foreach ($categories->take(5) as $category)
                            <li>
                                <a href="{{ route('catalog.category', $category->idCategory) }}" class="footer-link text-gray-300 hover:text-white flex items-center">
                                    <i class="fas fa-chevron-right text-xs mr-2 text-yellow-300"></i>
                                    {{ $category->nameCategory }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-white text-lg mb-3 border-b border-gray-500 pb-2">Navigasi</p>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li>
                                <a href="{{ route('home') }}" class="footer-link text-gray-300 hover:text-white flex items-center">
                                    <i class="fas fa-home text-xs mr-2 text-yellow-300"></i>
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('catalog') }}" class="footer-link text-gray-300 hover:text-white flex items-center">
                                    <i class="fas fa-th-large text-xs mr-2 text-yellow-300"></i>
                                    Semua Produk
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tentang') }}" class="footer-link text-gray-300 hover:text-white flex items-center">
                                    <i class="fas fa-info-circle text-xs mr-2 text-yellow-300"></i>
                                    Tentang Kami
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="font-medium text-white text-lg mb-3 border-b border-gray-500 pb-2">Kontak</p>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-2 text-yellow-300"></i>
                                <span class="text-gray-300">Jl. Hercules Perum Bumi Antariksa No.E37, Klegen, Kec. Kartoharjo, Kota Madiun, Jawa Timur</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone mt-1 mr-2 text-yellow-300"></i>
                                <a href="tel:+6287830325994" class="footer-link text-gray-300 hover:text-white">
                                    +62 878-3032-5994
                                </a>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mt-1 mr-2 text-yellow-300"></i>
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

    <script>
    document.addEventListener('alpine:init', () => {
        // Connect mobile menu button with Alpine store
        document.querySelector('.menu-button').addEventListener('click', function() {
            Alpine.store('navStore').mobileMenuOpen = !Alpine.store('navStore').mobileMenuOpen;
        });
    });
    </script>

    @stack('scripts')
</body>
</html>