@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h1 class="text-3xl font-bold text-grey-600">Tentang Kami</h1>
            <p class="mt-4 text-gray-700 text-lg">
                Selamat datang di <span class="font-semibold">Rumah Batik Madura</span>, pusat batik khas Madura yang memadukan nilai tradisional dengan gaya modern.
                Kami menghadirkan koleksi batik berkualitas dengan motif unik dan warna khas.
            </p>
            <div class="mt-6 p-5 bg-gray-100 rounded-lg shadow-md">
                <h4 class="text-lg font-semibold text-gray-800 mb-3">Informasi Usaha:</h4>
                <ul class="space-y-2 text-gray-600">
                    <li><i class="fas fa-map-marker-alt text-red-500 mr-2"></i> <strong>Alamat:</strong> Jl. Hercules Perum Bumi Antariksa No.E37, Klegen, Kec. Kartoharjo, Kota Madiun, Jawa Timur</li>
                    <li><i class="fas fa-clock text-grey-500 mr-2"></i> <strong>Jam Operasional:</strong> Senin - Minggu (06.00 - 17.00 WIB)</li>
                    <li><i class="fas fa-phone text-green-500 mr-2"></i> <strong>Kontak:</strong> 0878-3032-5994</li>
                    <li><i class="fab fa-instagram text-blue-500 mr-2"></i> <strong>Instagram:</strong> @rumah.batik.madura</li>
                </ul>

            </div>
        </div>

        <div>
            <h3 class="text-xl text-gray-600 font-semibold text-center mb-4">Lokasi Kami</h3>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe
                    class="w-full h-64 md:h-80"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.470796364571!2d111.5372185735776!3d-7.632410575479052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79beec967be5e1%3A0xafb242dd9522f6f9!2sRUMAH%20BATIK%20DAN%20NATASYA%20DASTER!5e0!3m2!1sid!2sid!4v1741413989832!5m2!1sid!2sid"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection