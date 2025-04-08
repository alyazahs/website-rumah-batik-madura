@extends('layouts.app')
@extends('admin.dashboard')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
    <a href="{{ route('produk.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Produk</a>
    {{-- Di sini nanti ditampilkan daftar produk --}}
</div>
@endsection
