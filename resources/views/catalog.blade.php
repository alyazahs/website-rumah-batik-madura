@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 pt-4 pb-8">
    {{-- Filter Pilih Jenis --}}
    <div class="mb-6 bg-white p-4 rounded-lg shadow">
        <form method="GET" action="{{ route('catalog') }}" class="flex flex-wrap items-center gap-4">
            <div class="flex items-center gap-2">
                <label for="jenis" class="text-sm font-medium text-gray-700">PILIH JENIS:</label>
                <select name="jenis" id="jenis" onchange="this.form.submit()"
                    class="border border-gray-300 rounded-md px-4 py-2 text-sm text-gray-700">
                    <option value="">Semua Jenis</option>
                    @foreach ($subCategories as $subCat)
                    <option value="{{ $subCat->idSubCategory }}"
                        {{ ($subCategoryId ?? '') == $subCat->idSubCategory ? 'selected' : '' }}>
                        {{ $subCat->nameSubCategory }}
                    </option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    {{-- Daftar Subkategori --}}
    @if(isset($category) && $category->subCategories->isNotEmpty())
    <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-3 text-gray-800 border-b pb-2">
            {{ $category->nameCategory }}
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach($category->subCategories as $subCat)
            <a href="{{ route('catalog.subcategory', $subCat->idSubCategory) }}"
                class="bg-white border rounded-lg p-4 hover:shadow-md transition duration-200 text-center">
                <div class="h-32 bg-gray-100 rounded mb-2 flex items-center justify-center">
                    @if($subCat->image)
                    <img src="{{ asset('storage/'.$subCat->image) }}" alt="{{ $subCat->nameSubCategory }}" class="max-h-full max-w-full">
                    @else
                    <i class="fas fa-tshirt text-gray-400 text-4xl"></i>
                    @endif
                </div>
                <h3 class="font-medium text-gray-800">{{ $subCat->nameSubCategory }}</h3>
                <p class="text-xs text-gray-500 mt-1">
                    {{ $subCat->products_count }} produk
                </p>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Daftar Produk --}}
    @if($products->isNotEmpty())
    <div class="mt-6">
        @if(isset($subCategory))
        <h2 class="text-2xl font-semibold mb-4 text-gray-800 border-b pb-2">
            {{ $subCategory->nameSubCategory }}
        </h2>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach ($products as $product)
            <div class="bg-white border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                <div class="relative pt-[100%] bg-gray-100">
                    @if ($product->path)
                    <img src="{{ asset('storage/' . $product->path) }}"
                        alt="{{ $product->nameProduct }}"
                        class="absolute inset-0 w-full h-full object-cover">
                    @else
                    <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                        <i class="fas fa-tshirt text-5xl"></i>
                    </div>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-1 line-clamp-2">
                        {{ $product->nameProduct }}
                    </h3>
                    <p class="text-indigo-600 font-bold mb-2">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="inline-block px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $product->status == 'Available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ ucfirst($product->status) }}
                        </span>
                        <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                            <i class="fas fa-shopping-cart mr-1"></i> Beli
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="bg-white rounded-lg shadow p-6 text-center mt-4">
        <i class="fas fa-box-open text-4xl text-gray-400 mb-3"></i>
        <h3 class="text-xl font-medium text-gray-700 mb-2">Tidak ada produk ditemukan</h3>
        <p class="text-gray-500 mb-3">Silakan coba kategori atau filter lain</p>
        <a href="{{ route('catalog') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Lihat Semua Produk
        </a>
    </div>
    @endif

    {{-- Pagination --}}
    @if($products->hasPages())
    <div class="mt-8">
        {{ $products->appends(request()->query())->links() }}
    </div>
    @endif
</div>
@endsection