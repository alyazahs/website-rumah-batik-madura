@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    {{-- Kategori --}}
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Product Catalog</h1>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6 mb-12">
        @foreach ($categories as $category)
            <div x-data="{ open: false }" class="relative">
                <!-- Category Button -->
                <button @click="open = !open"
                        class="block bg-indigo-100 hover:bg-indigo-200 text-center py-4 rounded-lg shadow-md transition duration-300 ease-in-out w-full">
                    <h2 class="text-lg font-semibold text-indigo-800">{{ $category->nameCategory }}</h2>
                </button>

                <!-- Subcategories Dropdown -->
                <div x-show="open" x-transition
                     class="absolute left-0 mt-2 w-full bg-white rounded-lg shadow-lg z-10">
                    <ul>
                        @foreach ($category->subCategories as $subCategory)
                            <li>
                                <a href="{{ route('catalog.subcategory', $subCategory->idSubCategory) }}"
                                   class="block py-2 px-4 text-sm text-gray-800 hover:bg-indigo-100">
                                    {{ $subCategory->nameSubCategory }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Produk --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($products as $product)
            <div class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 ease-in-out">
                @if ($product->path)
                    <img src="{{ asset('storage/' . $product->path) }}" alt="{{ $product->nameProduct }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                        No Image
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->nameProduct }}</h3>
                    <p class="text-gray-600 text-sm mb-2">
                        {{ $product->subCategory->category->nameCategory ?? '' }} - {{ $product->subCategory->nameSubCategory ?? '' }}
                    </p>
                    <p class="text-indigo-600 font-bold mb-3">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-medium 
                        {{ $product->status == 'Available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ ucfirst($product->status) }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $products->links() }}
    </div>
</div>
@endsection
