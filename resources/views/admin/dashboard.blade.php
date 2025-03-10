@extends('layouts.app')
@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-gray-200 to-gray-100">
    <div class="w-full max-w-5xl px-4">
        <h1 class="text-center mb-8 text-3xl font-bold text-gray-800">Dashboard Admin</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $cards = [
                    ['title' => 'Produk', 'desc' => 'Kelola produk batik', 'color' => 'bg-gray-800', 'link' => '#'],
                    ['title' => 'Pesanan', 'desc' => 'Kelola pesanan pelanggan', 'color' => 'bg-gray-700', 'link' => '#'],
                    ['title' => 'Pengguna', 'desc' => 'Kelola akun pengguna', 'color' => 'bg-gray-600', 'link' => '#']
                ];
            @endphp

            @foreach ($cards as $card)
            <div class="p-6 rounded-xl shadow-lg text-white {{ $card['color'] }} hover:shadow-2xl transition-transform transform hover:-translate-y-2">
                <div class="text-center py-6">
                    <h5 class="text-xl font-semibold">{{ $card['title'] }}</h5>
                    <p class="mt-2 text-gray-300">{{ $card['desc'] }}</p>
                    <a href="{{ $card['link'] }}" class="inline-block mt-4 px-4 py-2 bg-white text-gray-800 font-bold rounded-lg hover:bg-gray-200 transition">Kelola</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mt-8">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-6 py-2 bg-red-600 text-white font-bold rounded-lg hover:bg-red-700 transition">Logout</button>
        </form>
    </div>
</div>
@endsection
