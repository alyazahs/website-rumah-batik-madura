@extends('layouts.app')
@section('content')
<div class="flex flex-col items-center justify-center text-center bg-gradient-to-r from-gray-900 to-gray-700 py-20 text-white rounded-lg shadow-md">
                <h1 class="text-5xl font-bold text-white">Selamat Datang di Batik Madura</h1>
                <p class="mt-4 text-lg text-gray-300">Keindahan Batik Madura dengan sentuhan budaya khas</p>
                <a href="{{ route('katalog') }}" class="mt-6 px-6 py-3 bg-white text-gray-900 font-semibold rounded-lg shadow-md hover:bg-gray-200 transition duration-300">Lihat Katalog</a>
            </div>
            
            <div class="container mx-auto text-center mt-10 px-4">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Kenapa Memilih Batik Kami?</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/btk-unik.jpg') }}" class="rounded-lg w-full h-48 object-cover" alt="Batik Unik">
                        <h3 class="text-xl font-semibold mt-4 text-gray-900">Motif Unik</h3>
                        <p class="text-gray-600 mt-2">Dibuat dengan motif eksklusif yang mencerminkan budaya Madura.</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/btk-unik.jpg') }}" class="rounded-lg w-full h-48 object-cover" alt="Batik Handmade">
                        <h3 class="text-xl font-semibold mt-4 text-gray-900">Handmade Berkualitas</h3>
                        <p class="text-gray-600 mt-2">Ditenun dan dilukis dengan tangan oleh pengrajin terbaik.</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/btk-unik.jpg') }}" class="rounded-lg w-full h-48 object-cover" alt="Bahan Premium">
                        <h3 class="text-xl font-semibold mt-4 text-gray-900">Bahan Premium</h3>
                        <p class="text-gray-600 mt-2">Menggunakan bahan berkualitas tinggi untuk kenyamanan maksimal.</p>
                    </div>
                </div>
            </div>
@endsection
