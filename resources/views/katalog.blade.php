@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-bold text-center">Katalog Batik</h1>
    <p class="text-center text-gray-600">Berbagai koleksi batik yang tersedia.</p>

    <div class="grid md:grid-cols-3 gap-6 mt-6">
        @forelse ($batiks as $batik)
            <div class="bg-white shadow-lg rounded-lg p-4">
                <img src="{{ asset('images/' . $batik->gambar) }}" class="rounded-lg w-full h-48 object-cover" alt="{{ $batik->nama }}">
                <h2 class="text-xl font-semibold mt-4">{{ $batik->nama }}</h2>
                <p class="text-gray-600 mt-2">{{ $batik->deskripsi }}</p>
                <p class="text-red-500 font-bold mt-2">Rp {{ number_format($batik->harga, 0, ',', '.') }}</p>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-3">Belum ada batik tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
