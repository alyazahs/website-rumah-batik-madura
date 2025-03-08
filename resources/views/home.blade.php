@extends('layouts.app')
@section('content')
<div class="relative flex flex-col items-center justify-center text-center py-20 text-white rounded-lg shadow-md overflow-hidden">
    <div class="absolute inset-0 bg-[url('{{ asset('images/bg.png') }}')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-black opacity-70"></div>
    <div class="relative z-10">
                <h1 class="text-5xl font-bold text-white">Selamat Datang di Batik Madura</h1>
                <p class="mt-4 text-lg text-gray-300">Keindahan Batik Madura dengan sentuhan budaya khas</p>
    </div>
</div>
            
            <div class="container mx-auto text-center mt-10 px-4">
                <h2 class="text-3xl font-bold mb-6 text-gray-800">Kenapa Memilih Batik Kami?</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/home1.png') }}" class="rounded-lg w-full h-48 object-cover" alt="Batik Unik">
                        <h3 class="text-xl font-semibold mt-4 text-gray-900">Motif Unik</h3>
                        <p class="text-gray-600 mt-2">Dibuat dengan motif eksklusif yang mencerminkan budaya Madura.</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/home2.png') }}" class="rounded-lg w-full h-48 object-cover" alt="Batik Handmade">
                        <h3 class="text-xl font-semibold mt-4 text-gray-900">Handmade Berkualitas</h3>
                        <p class="text-gray-600 mt-2">Ditenun dan dilukis dengan tangan oleh pengrajin terbaik.</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                        <img src="{{ asset('images/home3.png') }}" class="rounded-lg w-full h-48 object-cover" alt="Bahan Premium">
                        <h3 class="text-xl font-semibold mt-4 text-gray-900">Bahan Premium</h3>
                        <p class="text-gray-600 mt-2">Menggunakan bahan berkualitas tinggi untuk kenyamanan maksimal.</p>
                    </div>
                </div>
            </div>
@endsection
