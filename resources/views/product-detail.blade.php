@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 grid grid-cols-1 md:grid-cols-2 gap-10 p-8">
    <!-- Gambar Produk -->
    <div class="w-full flex justify-center items-center">
        <div class="relative max-w-md w-full h-[400px] bg-gray-100 rounded-2xl overflow-hidden shadow-md">
            @if ($product->path)
                <img src="{{ asset('storage/' . $product->path) }}"
                    alt="{{ $product->nameProduct }}"
                    class="w-full h-full object-contain">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-400">
                    <i class="fas fa-tshirt text-6xl"></i>
                </div>
            @endif
        </div>
    </div>

        <!-- Detail Produk -->
        <div class="flex flex-col justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->nameProduct }}</h1>

                <div class="mb-4">
                    <span class="text-xl font-semibold text-indigo-600">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                <div class="mb-6">
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold
                        {{ $product->status == 'Available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ ucfirst($product->status) }}
                    </span>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Produk</h2>
                    <p class="text-gray-700 leading-relaxed mb-6 min-h-[120px] whitespace-pre-line">
                        {!! nl2br(e($product->description ?? 'Tidak ada deskripsi tersedia.')) !!}
                    </p>
                </div>
            </div>

            <!-- Tombol Order -->
            <div class="mt-8">
                <a href="https://wa.me/6285927457129?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->nameProduct) }}"
                   target="_blank"
                   class="w-full flex items-center justify-center gap-3 bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl shadow-lg transition duration-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20.52 3.48A11.95 11.95 0 0012 0C5.373 0 0 5.373 0 12c0 2.12.55 4.1 1.51 5.87L0 24l6.4-1.68A11.952 11.952 0 0012 24c6.627 0 12-5.373 12-12 0-3.22-1.252-6.216-3.48-8.52zM12 22c-1.77 0-3.448-.53-4.84-1.52l-.34-.21-3.8 1 1.02-3.7-.22-.37A9.978 9.978 0 012 12c0-5.514 4.486-10 10-10 2.676 0 5.157 1.042 6.997 2.918a9.97 9.97 0 012.97 7.082c0 5.514-4.486 10-10 10zm5.446-7.28c-.252-.126-1.49-.736-1.723-.819-.232-.084-.4-.126-.57.126-.168.252-.65.82-.8.986-.147.168-.296.19-.547.063-.252-.126-1.06-.39-2.02-1.24-.746-.665-1.25-1.49-1.4-1.74-.147-.252-.016-.39.11-.516.114-.115.252-.295.38-.44.127-.147.168-.252.252-.42.084-.168.042-.315-.021-.44-.063-.126-.57-1.38-.78-1.892-.205-.5-.414-.43-.57-.438l-.488-.009c-.168 0-.44.063-.67.315-.232.252-.89.87-.89 2.12 0 1.252.91 2.463 1.037 2.635.126.168 1.78 2.72 4.312 3.81.602.26 1.07.415 1.437.53.603.19 1.15.163 1.58.1.482-.07 1.49-.61 1.7-1.2.21-.59.21-1.096.147-1.2-.063-.105-.232-.168-.484-.294z" />
                    </svg>
                    Order via WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
