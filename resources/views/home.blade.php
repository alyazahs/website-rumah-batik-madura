@extends('layouts.app')
@section('content')
<!-- Hero Section with Fixed Background -->
<div class="relative h-screen flex items-center justify-center text-center overflow-hidden">
    <!-- Background image with proper sizing -->
    <div class="absolute inset-0 bg-[#706D54]">
        <!-- Check if this path is correct - use asset helper properly -->
        <img src="{{ asset('images/batik3.png') }}" alt="Batik Madura Background"
            class="w-full h-full object-cover object-center opacity-0 transition-opacity duration-1000"
            onload="this.style.opacity='1';">

        <!-- Reduced opacity overlay -->
        <div class="absolute inset-0 bg-black opacity-80"></div>
    </div>

    <!-- Content with proper z-index -->
    <div class="relative z-10 max-w-5xl mx-auto px-6">
        <h1 class="text-6xl md:text-7xl font-bold text-white tracking-tight leading-tight">
            <span class="block">Batik Madura</span>
            <span class="block text-3xl md:text-4xl mt-2 text-amber-300">Warisan Budaya dalam Sentuhan Modern</span>
        </h1>
        <p class="mt-6 text-xl text-gray-200 max-w-2xl mx-auto">
            Keindahan batik dengan motif khas Madura yang dikerjakan oleh tangan-tangan terampil pengrajin lokal
        </p>
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/catalog" class="px-8 py-3 rounded-full bg-amber-500 text-black font-medium hover:bg-amber-400 transition duration-300 transform hover:scale-105">
                Jelajahi Koleksi
            </a>
            <a href="/tentang" class="px-8 py-3 rounded-full bg-transparent border-2 border-white text-white font-medium hover:bg-white/10 transition duration-300">
                Tentang Kami
            </a>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</div>

<!-- Features Section - More dynamic with staggered layout -->
<div class="py-24 bg-neutral-50">
    <div class="container mx-auto px-4">
        <!-- Section heading with decorative elements -->
        <div class="flex items-center justify-center mb-16">
            <div class="h-px bg-amber-300 w-12 mr-4"></div>
            <h2 class="text-4xl font-bold text-gray-800">Mengapa Memilih Kami</h2>
            <div class="h-px bg-amber-300 w-12 ml-4"></div>
        </div>

        <!-- Asymmetrical card layout for more visual interest -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mx-auto px-4xl px-12">
            <!-- Feature Card 1 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/home1.png') }}"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                        alt="Batik Unik">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-amber-600 transition duration-300">Motif Unik</h3>
                    <p class="text-gray-600 mt-3">Setiap motif memiliki cerita dan filosofi khusus yang mencerminkan kekayaan budaya Madura yang autentik.</p>
                </div>
            </div>

            <!-- Feature Card 2 - Offset for visual interest -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group md:translate-y-12">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/home2.png') }}"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                        alt="Batik Handmade">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-amber-600 transition duration-300">Handmade Berkualitas</h3>
                    <p class="text-gray-600 mt-3">Dibuat dengan penuh ketelitian oleh pengrajin berpengalaman menggunakan teknik tradisional yang diwariskan turun-temurun.</p>
                </div>
            </div>

            <!-- Feature Card 3 -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="relative h-64 overflow-hidden">
                    <img src="{{ asset('images/home3.png') }}"
                        class="w-full h-full object-cover transition duration-700 group-hover:scale-110"
                        alt="Bahan Premium">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-900 group-hover:text-amber-600 transition duration-300">Bahan Premium</h3>
                    <p class="text-gray-600 mt-3">Hanya menggunakan kain terbaik yang memberikan kenyamanan, ketahanan, dan keanggunan dalam setiap sentuhan.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products Section - New addition -->
<div class="py-24 bg-neutral-50">
    <div class="mx-auto px-4xl px-12 flex flex-col md:flex-row md:items-end justify-between mb-12">
        <div>
            <span class="text-amber-500 font-medium">Koleksi Terbaru</span>
            <h2 class="text-4xl font-bold text-gray-800 mt-2">Batik Pilihan</h2>
        </div>
        <a href="{{ route('catalog') }}" class="mt-4 md:mt-0 text-amber-600 font-medium flex items-center group">
            Lihat Semua
            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
        </a>
    </div>
    <div class="grid md:grid-cols-3 gap-8 mx-auto px-4xl px-12">
        @forelse($latestProducts as $product)
        <div class="bg-white border rounded-2xl shadow hover:shadow-lg transition duration-300 group overflow-hidden">
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('storage/' . $product->path) }}"
                    alt="{{ $product->nameProduct }}"
                    class="w-full h-full object-cover rounded-t-2xl transition duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 rounded-t-2xl"></div>
            </div>
            <div class="p-4 flex flex-col gap-2">
                <h3 class="text-lg font-semibold text-gray-900 group-hover:text-amber-600 transition duration-300">
                    {{ $product->nameProduct }}
                </h3>
                <div class="flex justify-between items-center">
                    <p class="text-grey-900 font-bold">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <a href="{{ route('catalog') }}"
                        class="px-4 py-2 bg-amber-500 text-white rounded hover:bg-amber-400 transition text-sm">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <p class="text-gray-500">Belum ada produk tersedia.</p>
        @endforelse
    </div>
</div>


<!-- Story/Heritage Section - New addition -->
<div class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative mx-auto px-4xl px-12">
                <div class="absolute -top-6 -left-6 w-24 h-24 bg-amber-100 rounded-full z-0"></div>
                <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-amber-200 rounded-full z-0"></div>
                <img src="{{ asset('images/home4.png') }}" alt="Batik Workshop" class="relative z-10 rounded-2xl shadow-xl w-full h-auto">
            </div>
            <div>
                <span class="text-amber-500 font-medium">Cerita Kami</span>
                <h2 class="text-4xl font-bold text-gray-800 mt-2">Warisan Kebanggaan Madura</h2>
                <p class="mt-6 text-gray-600 leading-relaxed">
                    Batik Madura memiliki sejarah panjang yang diwariskan turun-temurun sejak abad ke-16. Setiap motif yang kami ciptakan memiliki makna mendalam yang menceritakan kehidupan, alam, dan filosofi masyarakat Madura.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Kami berkomitmen untuk melestarikan warisan budaya ini dengan tetap menggunakan teknik tradisional sambil menghadirkan sentuhan modern yang sesuai dengan perkembangan zaman.
                </p>

            </div>
        </div>
    </div>
</div>

<!-- Newsletter Section - New addition -->
<div class="py-16 bg-amber-500">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-black">Apakah Anda Penasaran Detail dari Batik Kami?</h2>
        <p class="mt-3 text-black/80 max-w-xl mx-auto">Hubungi kami untuk mendapatkan informasi tentang detail batik, koleksi terbaru, promo eksklusif, dan cerita di balik batik Madura.</p>
        <a href="/tentang"><br>
            <button type="button" class="px-6 py-3 bg-black text-white font-medium rounded-lg hover:bg-gray-800 transition duration-300">
                Contact Us
            </button>
        </a>
    </div>
</div>

<!-- Add any required CSS for animations to your app.css file -->
@push('styles')
<style>
    @keyframes slow-zoom {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.1);
        }
    }

    @keyframes fade-in-up {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-slow-zoom {
        animation: slow-zoom 15s ease-in-out infinite alternate;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
</style>
@endpush
@endsection