@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="w-100 px-4">
        <h1 class="text-center mb-5 text-dark fw-bold">Dashboard Admin</h1>
        <div class="row g-4 justify-content-center">
            @php
                $cards = [
                    ['title' => 'Produk', 'desc' => 'Kelola produk batik', 'color' => 'primary', 'link' => '#'],
                    ['title' => 'Pesanan', 'desc' => 'Kelola pesanan pelanggan', 'color' => 'success', 'link' => '#'],
                    ['title' => 'Pengguna', 'desc' => 'Kelola akun pengguna', 'color' => 'warning', 'link' => '#']
                ];
            @endphp

            @foreach ($cards as $card)
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-white bg-{{ $card['color'] }} rounded-4 transition-hover">
                    <div class="card-body text-center py-5">
                        <h5 class="card-title fs-4">{{ $card['title'] }}</h5>
                        <p class="card-text">{{ $card['desc'] }}</p>
                        <a href="{{ $card['link'] }}" class="btn btn-light fw-bold">Kelola</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .transition-hover {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
