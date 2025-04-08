@extends('layouts.app')
@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-indigo-100 to-purple-200 py-12 px-4">
    <div class="w-full max-w-5xl">
        <h1 class="text-center mb-8 text-4xl font-extrabold text-gray-800">Dashboard Admin</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
            $cards = [
                ['title' => 'Produk', 'desc' => 'Kelola produk batik', 'color' => 'bg-gradient-to-r from-blue-600 to-blue-700', 'link' => '#', 'icon' => 'fa fa-shopping-bag'],
                ['title' => 'Pesanan', 'desc' => 'Kelola pesanan pelanggan', 'color' => 'bg-gradient-to-r from-green-600 to-green-700', 'link' => '#', 'icon' => 'fa fa-clipboard-list'],
                ['title' => 'Pengguna', 'desc' => 'Kelola akun pengguna', 'color' => 'bg-gradient-to-r from-purple-600 to-purple-700', 'link' => '#', 'icon' => 'fa fa-users']
            ];
            @endphp

            @foreach ($cards as $card)
            <div class="p-6 rounded-2xl shadow-lg text-white {{ $card['color'] }} hover:shadow-2xl transition-transform transform hover:-translate-y-2">
                <div class="text-center py-6">
                    <i class="{{ $card['icon'] }} text-3xl mb-4"></i>
                    <h5 class="text-2xl font-semibold">{{ $card['title'] }}</h5>
                    <p class="mt-2 text-gray-200">{{ $card['desc'] }}</p>
                    <a href="{{ $card['link'] }}" class="inline-block mt-4 px-5 py-2 bg-white text-gray-800 font-semibold rounded-lg hover:bg-gray-200 transition-all duration-300">Kelola</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mt-10">
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all duration-300">Logout</button>
        </form>
    </div>
</div>
@endsection