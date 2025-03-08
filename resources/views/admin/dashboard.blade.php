@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Produk</h5>
                    <p class="card-text">Kelola produk batik</p>
                    <a href="#" class="btn btn-light">Kelola</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pesanan</h5>
                    <p class="card-text">Kelola pesanan pelanggan</p>
                    <a href="#" class="btn btn-light">Kelola</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pengguna</h5>
                    <p class="card-text">Kelola akun pengguna</p>
                    <a href="#" class="btn btn-light">Kelola</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
