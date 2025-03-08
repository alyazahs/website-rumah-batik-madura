@extends('layouts.app')
@section('content')
<div class="min-h-screen flex flex-col bg-blue-950">
    <!-- Navbar -->
    <nav class="bg-gray-300 shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-700">Admin Dashboard</h1>
        <button class="text-gray-700 px-4 py-2 rounded-md">Logout</button>
    </nav>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-5 hidden md:block">
            <ul class="space-y-4">
                <li><a href="#" class="block py-2 px-3 rounded bg-gray-700">Dashboard</a></li>
                <li><a href="#" class="block py-2 px-3 hover:bg-gray-700">Kelola Katalog</a></li>
                <li><a href="#" class="block py-2 px-3 hover:bg-gray-700">Kelola Pesanan</a></li>
                <li><a href="#" class="block py-2 px-3 hover:bg-gray-700">Kelola Pengguna</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h2 class="text-2xl font-semibold text-white">Selamat Datang, Admin!</h2>
        </main>
    </div>
</div>
@endsection