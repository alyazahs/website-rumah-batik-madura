@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <!-- Main Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Left Column: About Description -->
        <div class="order-2 lg:order-1">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Warisan Batik Madura</h2>
                <p class="text-gray-700 text-lg leading-relaxed">
                    Selamat datang di <span class="font-semibold text-orange-700">Rumah Batik Madura</span>, pusat batik khas Madura yang memadukan nilai tradisional dengan gaya modern. Kami berkomitmen untuk melestarikan warisan budaya Madura melalui kerajinan batik berkualitas tinggi.
                </p>
                <p class="text-gray-700 text-lg leading-relaxed mt-4">
                    Setiap motif yang kami hadirkan memiliki keunikan dan cerita tersendiri, dengan warna-warna khas yang mencerminkan kekayaan budaya Pulau Madura.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Informasi Usaha
                </h3>
                <ul class="space-y-4 text-gray-600">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>
                        <div class="ml-3">
                            <span class="font-medium text-gray-800">Alamat:</span><br>
                            <span>Jl. Hercules Perum Bumi Antariksa No.E37, Klegen, Kec. Kartoharjo, Kota Madiun, Jawa Timur</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <div class="ml-3">
                            <span class="font-medium text-gray-800">Jam Operasional:</span><br>
                            <span>Senin - Minggu (06.00 - 17.00 WIB)</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </span>
                        <div class="ml-3">
                            <span class="font-medium text-gray-800">Kontak:</span><br>
                            <span>0878-3032-5994</span>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </span>
                        <div class="ml-3">
                            <span class="font-medium text-gray-800">Email:</span><br>
                            <a href="mailto:batikmadurarumah@gmail.com" class="text-orange-600 hover:underline">batikmadurarumah@gmail.com</a>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>
                        </span>
                        <div class="ml-3">
                            <span class="font-medium text-gray-800">Instagram:</span><br>
                            <a href="https://www.instagram.com/rumah.batik.madura" class="text-orange-600 hover:underline">@rumah.batik.madura</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Right Column: Map and Image -->
        <div class="order-1 lg:order-2">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
                <div class="p-4 bg-orange-100">
                    <h3 class="text-xl font-semibold text-gray-800 text-center flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Lokasi Kami
                    </h3>
                </div>
                <iframe
                    class="w-full h-80 md:h-96"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.470796364571!2d111.5372185735776!3d-7.632410575479052!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79beec967be5e1%3A0xafb242dd9522f6f9!2sRUMAH%20BATIK%20DAN%20NATASYA%20DASTER!5e0!3m2!1sid!2sid!4v1741413989832!5m2!1sid!2sid"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- CTA Button -->
            <div class="text-center">
                <a href="/" class="inline-block px-8 py-4 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                    Kunjungi Toko Kami
                </a>
            </div>
        </div>
    </div>

    <!-- Our Values Section -->
    <div class="mt-16">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Nilai-Nilai Kami</h2>
            <div class="w-20 h-1 bg-orange-500 mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 border-t-4 border-orange-500">
                <div class="text-orange-500 text-4xl mb-4 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 text-center mb-2">Kualitas</h3>
                <p class="text-gray-600 text-center">Kami hanya menggunakan bahan terbaik dan teknik pembuatan batik yang terjaga kualitasnya.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 border-t-4 border-orange-500">
                <div class="text-orange-500 text-4xl mb-4 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 text-center mb-2">Kerajinan Tradisional</h3>
                <p class="text-gray-600 text-center">Melestarikan warisan budaya batik Madura dengan sentuhan modern untuk generasi masa kini.</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition duration-300 border-t-4 border-orange-500">
                <div class="text-orange-500 text-4xl mb-4 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 text-center mb-2">Layanan Pelanggan</h3>
                <p class="text-gray-600 text-center">Kepuasan pelanggan adalah prioritas utama kami dengan layanan yang ramah dan profesional.</p>
            </div>
        </div>
    </div>
</div>
@endsection
