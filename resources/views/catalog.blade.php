@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 pt-6 pb-12">

    {{-- Filter Section --}}
    <div class="mb-8 bg-white p-5 rounded-xl shadow-md border border-gray-100">
        <form method="GET" action="{{ route('catalog') }}" class="flex flex-wrap items-center gap-4">
            {{-- Pertahankan parameter category jika ada --}}
            @if(isset($category))
            <input type="hidden" name="category" value="{{ $category->idCategory }}">
            @elseif(request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="flex items-center gap-3 flex-grow">
                <label for="jenis" class="text-sm font-semibold text-gray-700">PILIH JENIS:</label>
                <select name="jenis" id="jenis" onchange="this.form.submit()"
                    class="border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 flex-grow max-w-xs">
                    <option value="">Semua Jenis</option>
                    @foreach ($subCategories as $subCat)
                    <option value="{{ $subCat->idSubCategory }}"
                        {{ ($subCategoryId ?? '') == $subCat->idSubCategory ? 'selected' : '' }}>
                        {{ $subCat->category->nameCategory ?? 'Kategori Tidak Ditemukan' }} - {{ $subCat->nameSubCategory }}
                    </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    {{-- Daftar Produk --}}
    @if($products->isNotEmpty())
    <div class="mt-8">
        @if(isset($subCategory))
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ $subCategory->nameSubCategory }}
            </h2>
            <div class="h-0.5 flex-grow ml-4 bg-gradient-to-r from-indigo-500 to-transparent"></div>
        </div>
        @else
        <div class="flex items-center justify-between mb-5">
            <h2 class="text-2xl font-bold text-gray-800">Semua Produk</h2>
            <div class="h-0.5 flex-grow ml-4 bg-gradient-to-r from-indigo-500 to-transparent"></div>
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <a href="{{ route('catalog.show', $product->idProduct) }}"
                class="block bg-white border border-gray-100 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 group">
                <div class="relative pt-[100%] bg-gray-50 overflow-hidden">
                    @if ($product->path)
                    <img src="{{ asset('storage/' . $product->path) }}"
                        alt="{{ $product->nameProduct }}"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                    <div class="absolute inset-0 flex items-center justify-center text-gray-300 group-hover:text-indigo-300 transition duration-300">
                        <i class="fas fa-tshirt text-6xl"></i>
                    </div>
                    @endif
                    <div class="absolute top-3 right-3">
                        <span class="inline-block px-3 py-1 rounded-full text-xs font-medium 
                        {{ $product->status == 'Available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($product->status) }}
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2 group-hover:text-indigo-600 transition duration-300">
                        {{ $product->nameProduct }}
                    </h3>
                    <p class="text-indigo-600 font-bold text-xl mb-3">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @else
    <div class="bg-white rounded-xl shadow-md p-8 text-center mt-6 border border-gray-100">
        <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-box-open text-4xl text-indigo-500"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-3">Tidak ada produk ditemukan</h3>
        <p class="text-gray-500 mb-6 max-w-md mx-auto">Silakan coba kategori atau filter lain untuk menemukan produk yang Anda cari</p>
        <a href="{{ route('catalog') }}" class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Lihat Semua Produk
        </a>
    </div>
    @endif

    {{-- Pagination --}}
    @if($products->hasPages())
    <div class="mt-10">
        <div class="flex justify-center">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
    @endif
</div>
@endsection