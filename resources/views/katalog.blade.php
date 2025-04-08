@extends('layouts.app')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-4">Katalog Batik</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="/kategori/batikcap" class="p-4 bg-white rounded shadow text-center hover:bg-blue-100">
            <h2 class="font-semibold">Batik Cap</h2>
        </a>
        <a href="/kategori/batiktulis" class="p-4 bg-white rounded shadow text-center hover:bg-blue-100">
            <h2 class="font-semibold">Batik Tulis</h2>
        </a>
        <a href="/kategori/batikprinting" class="p-4 bg-white rounded shadow text-center hover:bg-blue-100">
            <h2 class="font-semibold">Batik Printing</h2>
        </a>
    </div>
</div>
@endsection
