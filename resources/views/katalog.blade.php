@extends('layouts.app')

@section('content')
<h1 class="text-6xl font-extrabold text-center text-gray-800 tracking-wide uppercase">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-800 to-gray-600 drop-shadow-lg">
            Katalog Batik
        </span>
    </h1>
    <p class="text-center text-gray-500 mt-3 italic">Jelajahi koleksi batik khas Madura dengan nuansa budaya.</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-10">
        @forelse ($batiks as $batik)
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                <div class="relative w-full h-64 bg-gray-200">
                    <img src="{{ asset('images/' . $batik->gambar) }}" 
                         class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out hover:opacity-80" 
                         alt="{{ $batik->nama }}">
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900">{{ $batik->nama }}</h2>
                    <p class="text-gray-600 mt-2">{{ Str::limit($batik->deskripsi, 80) }}</p>
                    <p class="text-red-600 font-bold text-lg mt-3">Rp {{ number_format($batik->harga, 0, ',', '.') }}</p>
                    <a href="#" class="block text-center bg-gradient-to-r from-blue-500 to-blue-700 text-white font-semibold py-3 px-5 rounded-lg mt-5 hover:from-blue-600 hover:to-blue-800 transition-all">
                        🔍 Lihat Detail
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-400 col-span-3">Belum ada batik yang tersedia saat ini.</p>
        @endforelse
    </div>
</div>
@endsection
