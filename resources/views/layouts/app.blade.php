<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Batik Madura</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('js/menu.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" defer></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen flex flex-col">

    {{-- Navbar --}}
    @if (!Request::is('admin*'))
    <nav class="bg-gradient-to-r from-gray-800 to-gray-600 text-white py-5 px-6 shadow-md">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center">
            <a class="text-3xl font-bold" href="#">Batik Madura</a>
            <button class="lg:hidden text-white text-3xl">&#9776;</button>
            <ul class="hidden lg:flex space-x-8 text-lg">
                <li><a class="hover:text-gray-300" href="{{ route('home') }}">Beranda</a></li>
                <li><a class="hover:text-gray-300" href="{{ route('katalog') }}">Katalog</a></li>
                <li><a class="hover:text-gray-300" href="{{ route('tentang') }}">Tentang Kami</a></li>
            </ul>
        </div>
    </nav>
    @endif

    {{-- Konten Utama --}}
    <main class="w-full max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @if (!Request::is('admin*'))
    <footer class="bg-gradient-to-r from-gray-800 to-gray-700 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-lg font-semibold">Batik Madura</h2>
            <p class="text-sm text-gray-400 mt-1">&copy; 2025 Batik Madura | All Rights Reserved</p>

            <div class="mt-3 flex justify-center space-x-6">
                <a href="https://wa.me/+6287830325994" target="_blank" class="hover:text-green-400 transition">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
                <a href="https://www.instagram.com/rumah.batik.madura" target="_blank" class="hover:text-pink-400 transition">
                    <i class="fab fa-instagram"></i> Instagram
                </a>
                <a href="mailto:batikmadurarumah@gmail.com?subject=Pesan dari Website&body=Halo, saya tertarik dengan produk Anda." class="hover:text-red-400 transition">
                    <i class="fas fa-envelope"></i> Email
                </a>
            </div>
        </div>
    </footer>
    @endif

</body>
</html>
