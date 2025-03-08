<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Batik Madura</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<script src="{{ asset('js/menu.js') }}" defer></script>
<body class="bg-gray-100 font-sans">
    @if (!Request::is('admin*'))
    <nav class="bg-gradient-to-r from-gray-800 to-gray-600 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4">
            <a class="text-2xl font-bold" href="#">Batik Madura</a>
            <button class="lg:hidden text-white text-3xl">&#9776;</button>
            <ul class="hidden lg:flex space-x-6">
                <li><a class="hover:text-gray-300" href="{{ route('home') }}">Beranda</a></li>
                <li><a class="hover:text-gray-300" href="{{ route('katalog') }}">Katalog</a></li>
                <li><a class="hover:text-gray-300" href="{{ route('tentang') }}">Tentang Kami</a></li>
            </ul>
        </div>
    </nav>
    @endif
    
    <div class="container mx-auto mt-6 px-6 py-8 bg-white shadow-lg rounded-lg">
        @yield('content')
    </div>
    
    <footer class="bg-gradient-to-r from-gray-800 to-gray-700 text-white py-6 mt-8">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" defer></script>

</body>
</html>