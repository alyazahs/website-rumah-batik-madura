@extends('layouts.app')
@section('content')
<div class="min-h-screen flex flex-col bg-[#dee2e6] text-white">
    <nav class="bg-[#6c757d] shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-xl font-bold text-gray-800">Admin Dashboard</h1>
        <button class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md transition">Logout</button>
    </nav>

    <div class="flex flex-1">
        <aside class="w-64 bg-gray-800 p-5 hidden md:block shadow-lg">
            <h2 class="text-lg font-semibold text-gray-300 mb-4">Menu</h2>
            <ul class="space-y-4">
                <li><a href="#" class="block py-3 px-4 rounded-lg bg-gray-800 hover:bg-blue-600 transition">Dashboard</a></li>
                <li><a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-600 transition">Kelola Katalog</a></li>
                <li><a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-600 transition">Kelola Pesanan</a></li>
                <li><a href="#" class="block py-3 px-4 rounded-lg hover:bg-blue-600 transition">Kelola Pengguna</a></li>
            </ul>
        </aside>

        <main class="flex-1 p-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-3xl font-bold text-gray-800">Selamat Datang, Admin!</h2>
                <p class="text-gray-600 mt-2">Kelola toko batik dengan mudah di sini.</p>
            </div>
        </main>
    </div>
</div>
@endsection
