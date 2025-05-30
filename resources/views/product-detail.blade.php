@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="container mx-auto px-4 py-12">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <div class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="hover:text-indigo-600 transition-colors duration-200">Home</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="#" class="hover:text-indigo-600 transition-colors duration-200">Products</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium">{{ $product->nameProduct }}</span>
            </div>
        </nav>
        
            <!-- Product Image Section - Now on Top -->
            <div class="relative bg-gradient-to-br from-gray-50 to-gray-100 p-8 lg:p-12 flex items-center justify-center min-h-[500px]">
                    <div class="relative group">
                        <!-- Image Container with Hover Effects -->
                        <div class="relative bg-white rounded-2xl p-6 shadow-lg group-hover:shadow-2xl transition-all duration-500 transform group-hover:-translate-y-2">
                            @if ($product->path)
                                <img src="{{ asset('storage/' . $product->path) }}"
                                    alt="{{ $product->nameProduct }}"
                                    class="w-full max-h-[700px] aspect-video object-contain rounded-xl transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="w-full h-96 flex items-center justify-center text-gray-400 bg-gray-50 rounded-xl">
                                    <div class="text-center">
                                        <i class="fas fa-tshirt text-8xl mb-4 opacity-50"></i>
                                        <p class="text-lg font-medium">No Image Available</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Image Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 rounded-xl"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Details Section - Now Below Image -->
            <div class="p-8 lg:p-12 flex flex-col justify-between">
                <div class="space-y-8">
                    <!-- Product Header -->
                    <div class="space-y-4">
                        <div class="flex items-start justify-between">
                            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                                {{ $product->nameProduct }}
                            </h1>
                        </div>
                        
                        <!-- Price -->
                        <div class="relative">
                            <div class="flex items-baseline space-x-2">
                                <span class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Status Badge with Enhanced Design -->
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-bold shadow-lg transition-all duration-300 hover:scale-105
                                {{ $product->status == 'Available' ? 'bg-gradient-to-r from-green-400 to-green-600 text-white' : 'bg-gradient-to-r from-red-400 to-red-600 text-white' }}">
                                <span class="w-3 h-3 rounded-full mr-2 animate-pulse
                                    {{ $product->status == 'Available' ? 'bg-green-200' : 'bg-red-200' }}"></span>
                                {{ ucfirst($product->status) }}
                            </span>
                        </div>
                        
                        <!-- Stock Indicator -->
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span>In Stock</span>
                        </div>
                    </div>

                    <!-- Product Description -->
                    <div class="space-y-4">
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Deskripsi Produk
                        </h2>
                        <div class="bg-gray-50 rounded-2xl p-6 border-l-4 border-indigo-500">
                            <p class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                                {!! nl2br(e($product->description ?? 'Tidak ada deskripsi tersedia untuk produk ini. Hubungi kami untuk informasi lebih lanjut.')) !!}
                            </p>
                        </div>
                    </div>

                    <!-- Product Features -->
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-blue-50 rounded-xl p-4 text-center">
                            <svg class="w-8 h-8 mx-auto mb-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                            <p class="font-semibold text-blue-800">Quality Guaranteed</p>
                        </div>
                        <div class="bg-green-50 rounded-xl p-4 text-center">
                            <svg class="w-8 h-8 mx-auto mb-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="font-semibold text-green-800">Best Price</p>
                        </div>
                    </div>
                </div>

                <!-- Enhanced WhatsApp Order Button -->
                <div class="mt-10 space-y-4">
                    <a href="https://wa.me/6285927457129?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->nameProduct) }}"
                       target="_blank"
                       class="group relative w-full flex items-center justify-center gap-4 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-5 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                        
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-green-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- WhatsApp Icon with Animation -->
                        <div class="relative z-10 transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20.52 3.48A11.95 11.95 0 0012 0C5.373 0 0 5.373 0 12c0 2.12.55 4.1 1.51 5.87L0 24l6.4-1.68A11.952 11.952 0 0012 24c6.627 0 12-5.373 12-12 0-3.22-1.252-6.216-3.48-8.52zM12 22c-1.77 0-3.448-.53-4.84-1.52l-.34-.21-3.8 1 1.02-3.7-.22-.37A9.978 9.978 0 012 12c0-5.514 4.486-10 10-10 2.676 0 5.157 1.042 6.997 2.918a9.97 9.97 0 012.97 7.082c0 5.514-4.486 10-10 10zm5.446-7.28c-.252-.126-1.49-.736-1.723-.819-.232-.084-.4-.126-.57.126-.168.252-.65.82-.8.986-.147.168-.296.19-.547.063-.252-.126-1.06-.39-2.02-1.24-.746-.665-1.25-1.49-1.4-1.74-.147-.252-.016-.39.11-.516.114-.115.252-.295.38-.44.127-.147.168-.252.252-.42.084-.168.042-.315-.021-.44-.063-.126-.57-1.38-.78-1.892-.205-.5-.414-.43-.57-.438l-.488-.009c-.168 0-.44.063-.67.315-.232.252-.89.87-.89 2.12 0 1.252.91 2.463 1.037 2.635.126.168 1.78 2.72 4.312 3.81.602.26 1.07.415 1.437.53.603.19 1.15.163 1.58.1.482-.07 1.49-.61 1.7-1.2.21-.59.21-1.096.147-1.2-.063-.105-.232-.168-.484-.294z" />
                            </svg>
                        </div>
                        
                        <span class="relative z-10 text-xl group-hover:tracking-wide transition-all duration-300">
                            Order via WhatsApp
                        </span>
                        
                        <!-- Ripple Effect -->
                        <div class="absolute inset-0 -z-10 bg-white opacity-25 scale-0 group-hover:scale-100 rounded-2xl transition-transform duration-500"></div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Trust Indicators -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center border border-gray-100">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Secure Transaction</h3>
                <p class="text-gray-600 text-sm">Your payment is protected and secure</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center border border-gray-100">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Quality Guarantee</h3>
                <p class="text-gray-600 text-sm">100% authentic products guaranteed</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center border border-gray-100">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 100 19.5 9.75 9.75 0 000-19.5z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">24/7 Support</h3>
                <p class="text-gray-600 text-sm">Get help whenever you need it</p>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles for Enhanced Animations -->
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

@keyframes shimmer {
    0% { background-position: -1000px 0; }
    100% { background-position: 1000px 0; }
}

.animate-shimmer {
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    background-size: 1000px 100%;
    animation: shimmer 2s infinite;
}
</style>
@endsection