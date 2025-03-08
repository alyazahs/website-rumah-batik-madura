<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Batik Madura</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
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
    
    <footer class="bg-gray-900 text-white text-center py-4 mt-8">
        <p>&copy; 2025 Batik Madura | All Rights Reserved</p>
    </footer>
</body>
</html>