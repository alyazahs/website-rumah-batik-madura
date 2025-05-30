@extends('layouts.app')

@section('title', 'Kebijakan Privasi')
@section('meta_description', 'Kebijakan Privasi Batik Madura - Perlindungan data dan privasi pelanggan')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <!-- Header Section -->
    <div class="text-center mb-12">
        <div class="inline-block bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-full text-sm font-medium mb-4">
            <i class="fas fa-shield-alt mr-2"></i>
            Perlindungan Privasi
        </div>
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Kebijakan Privasi</h1>
        <p class="text-xl text-indigo-600 font-medium">Batik Madura - Warisan Budaya Indonesia</p>
        <p class="text-sm text-gray-500 mt-2"><em>Terakhir diperbarui: 30 Mei 2025</em></p>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-8 lg:p-12">
            
            <!-- Section 1: Pendahuluan -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-indigo-600 font-bold text-sm">1</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Pendahuluan</h2>
                </div>
                <div class="ml-11">
                    <p class="text-gray-600 leading-relaxed">
                        Batik Madura ("kami", "kita", atau "perusahaan") berkomitmen untuk melindungi privasi dan keamanan informasi pribadi pengunjung website kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda ketika menggunakan layanan kami.
                    </p>
                </div>
            </section>

            <!-- Section 2: Informasi yang Kami Kumpulkan -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-indigo-600 font-bold text-sm">2</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Informasi yang Kami Kumpulkan</h2>
                </div>
                <div class="ml-11 space-y-6">
                    <!-- Subsection 2.1 -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-user-edit text-indigo-500 mr-2"></i>
                            2.1 Informasi yang Diberikan Secara Sukarela
                        </h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle text-indigo-400 mt-2 mr-3 text-xs"></i>
                                <div>
                                    <strong>Informasi Kontak:</strong> Nama, alamat email, nomor telepon yang Anda berikan saat menghubungi kami
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle text-indigo-400 mt-2 mr-3 text-xs"></i>
                                <div>
                                    <strong>Informasi Pemesanan:</strong> Detail pesanan, alamat pengiriman, preferensi produk
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle text-indigo-400 mt-2 mr-3 text-xs"></i>
                                <div>
                                    <strong>Komunikasi:</strong> Pesan yang Anda kirimkan melalui formulir kontak, email, atau WhatsApp
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Subsection 2.2 -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-robot text-indigo-500 mr-2"></i>
                            2.2 Informasi yang Dikumpulkan Secara Otomatis
                        </h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle text-indigo-400 mt-2 mr-3 text-xs"></i>
                                <div>
                                    <strong>Data Teknis:</strong> Alamat IP, jenis browser, sistem operasi, waktu kunjungan
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle text-indigo-400 mt-2 mr-3 text-xs"></i>
                                <div>
                                    <strong>Data Penggunaan:</strong> Halaman yang dikunjungi, waktu yang dihabiskan, pola navigasi
                                </div>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-dot-circle text-indigo-400 mt-2 mr-3 text-xs"></i>
                                <div>
                                    <strong>Cookies:</strong> Data kecil yang disimpan di perangkat Anda untuk meningkatkan pengalaman browsing
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Section 3: Tujuan Penggunaan Informasi -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-indigo-600 font-bold text-sm">3</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Tujuan Penggunaan Informasi</h2>
                </div>
                <div class="ml-11">
                    <p class="text-gray-600 mb-4">Kami menggunakan informasi Anda untuk:</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-4 rounded-lg border border-blue-100">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-headset text-blue-500 mr-2"></i>
                                <strong class="text-gray-700">Layanan Pelanggan</strong>
                            </div>
                            <p class="text-sm text-gray-600">Merespons pertanyaan dan memberikan dukungan</p>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-4 rounded-lg border border-green-100">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-shopping-cart text-green-500 mr-2"></i>
                                <strong class="text-gray-700">Pemrosesan Pesanan</strong>
                            </div>
                            <p class="text-sm text-gray-600">Mengelola pesanan dan pengiriman produk</p>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-violet-50 p-4 rounded-lg border border-purple-100">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-envelope text-purple-500 mr-2"></i>
                                <strong class="text-gray-700">Komunikasi</strong>
                            </div>
                            <p class="text-sm text-gray-600">Mengirim update produk, konfirmasi pesanan, dan informasi penting</p>
                        </div>
                        <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-4 rounded-lg border border-orange-100">
                            <div class="flex items-center mb-2">
                                <i class="fas fa-chart-line text-orange-500 mr-2"></i>
                                <strong class="text-gray-700">Peningkatan Layanan</strong>
                            </div>
                            <p class="text-sm text-gray-600">Menganalisis penggunaan website untuk meningkatkan pengalaman pengguna</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 4: Pembagian Informasi -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-red-600 font-bold text-sm">4</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Pembagian Informasi</h2>
                </div>
                <div class="ml-11">
                    <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                            <strong class="text-red-700">Penting!</strong>
                        </div>
                        <p class="text-red-700">
                            Kami <strong>TIDAK</strong> akan menjual, menyewakan, atau membagikan informasi pribadi Anda kepada pihak ketiga, kecuali:
                        </p>
                    </div>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <div>
                                <strong>Persetujuan Eksplisit:</strong> Ketika Anda memberikan izin secara tertulis
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-balance-scale text-blue-500 mt-1 mr-3"></i>
                            <div>
                                <strong>Kewajiban Hukum:</strong> Jika diminta oleh otoritas yang berwenang sesuai hukum yang berlaku
                            </div>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-handshake text-purple-500 mt-1 mr-3"></i>
                            <div>
                                <strong>Penyedia Layanan:</strong> Kepada mitra terpercaya yang membantu operasional kami (ekspedisi, payment gateway) dengan perjanjian kerahasiaan yang ketat
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Section 5: Keamanan Data -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-green-600 font-bold text-sm">5</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Keamanan Data</h2>
                </div>
                <div class="ml-11">
                    <p class="text-gray-600 mb-4">Kami menerapkan langkah-langkah keamanan yang memadai:</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="flex items-start space-x-3 p-4 bg-green-50 rounded-lg border border-green-100">
                            <i class="fas fa-lock text-green-500 mt-1"></i>
                            <div>
                                <strong class="text-gray-700 block">Enkripsi</strong>
                                <p class="text-sm text-gray-600">Data sensitif dienkripsi selama transmisi</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-blue-50 rounded-lg border border-blue-100">
                            <i class="fas fa-user-lock text-blue-500 mt-1"></i>
                            <div>
                                <strong class="text-gray-700 block">Akses Terbatas</strong>
                                <p class="text-sm text-gray-600">Hanya karyawan yang berwenang yang dapat mengakses data pribadi</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-purple-50 rounded-lg border border-purple-100">
                            <i class="fas fa-sync-alt text-purple-500 mt-1"></i>
                            <div>
                                <strong class="text-gray-700 block">Pembaruan Keamanan</strong>
                                <p class="text-sm text-gray-600">Sistem kami diperbarui secara berkala untuk mengatasi kerentanan</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3 p-4 bg-orange-50 rounded-lg border border-orange-100">
                            <i class="fas fa-database text-orange-500 mt-1"></i>
                            <div>
                                <strong class="text-gray-700 block">Backup</strong>
                                <p class="text-sm text-gray-600">Data dicadangkan secara teratur dengan proteksi yang sama</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 6: Cookies -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-yellow-600 font-bold text-sm">6</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Cookies dan Teknologi Pelacakan</h2>
                </div>
                <div class="ml-11 space-y-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-cookie-bite text-yellow-500 mr-2"></i>
                            6.1 Jenis Cookies yang Kami Gunakan
                        </h3>
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3 p-3 bg-yellow-50 rounded-lg border border-yellow-100">
                                <i class="fas fa-cog text-yellow-500 mt-1"></i>
                                <div>
                                    <strong class="text-gray-700">Cookies Esensial:</strong>
                                    <span class="text-gray-600">Diperlukan untuk fungsi dasar website</span>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                                <i class="fas fa-chart-bar text-blue-500 mt-1"></i>
                                <div>
                                    <strong class="text-gray-700">Cookies Analitik:</strong>
                                    <span class="text-gray-600">Membantu kami memahami cara penggunaan website</span>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 p-3 bg-green-50 rounded-lg border border-green-100">
                                <i class="fas fa-sliders-h text-green-500 mt-1"></i>
                                <div>
                                    <strong class="text-gray-700">Cookies Fungsional:</strong>
                                    <span class="text-gray-600">Mengingat preferensi dan pengaturan Anda</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                            <i class="fas fa-tools text-yellow-500 mr-2"></i>
                            6.2 Pengelolaan Cookies
                        </h3>
                        <p class="text-gray-600">
                            Anda dapat mengelola cookies melalui pengaturan browser Anda. Namun, menonaktifkan cookies tertentu mungkin mempengaruhi fungsionalitas website.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Section 7: Hak Anda -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-purple-600 font-bold text-sm">7</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Hak Anda</h2>
                </div>
                <div class="ml-11">
                    <p class="text-gray-600 mb-4">Anda memiliki hak untuk:</p>
                    <div class="grid md:grid-cols-2 gap-3">
                        <div class="flex items-center space-x-3 p-3 bg-purple-50 rounded-lg border border-purple-100">
                            <i class="fas fa-eye text-purple-500"></i>
                            <div>
                                <strong class="text-gray-700 block text-sm">Akses</strong>
                                <p class="text-xs text-gray-600">Meminta salinan data pribadi</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                            <i class="fas fa-edit text-blue-500"></i>
                            <div>
                                <strong class="text-gray-700 block text-sm">Perbaikan</strong>
                                <p class="text-xs text-gray-600">Meminta koreksi data yang tidak akurat</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-red-50 rounded-lg border border-red-100">
                            <i class="fas fa-trash text-red-500"></i>
                            <div>
                                <strong class="text-gray-700 block text-sm">Penghapusan</strong>
                                <p class="text-xs text-gray-600">Meminta penghapusan data pribadi</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-yellow-50 rounded-lg border border-yellow-100">
                            <i class="fas fa-ban text-yellow-500"></i>
                            <div>
                                <strong class="text-gray-700 block text-sm">Pembatasan</strong>
                                <p class="text-xs text-gray-600">Meminta pembatasan pemrosesan</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-green-50 rounded-lg border border-green-100">
                            <i class="fas fa-exchange-alt text-green-500"></i>
                            <div>
                                <strong class="text-gray-700 block text-sm">Portabilitas</strong>
                                <p class="text-xs text-gray-600">Meminta transfer data</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 p-3 bg-orange-50 rounded-lg border border-orange-100">
                            <i class="fas fa-times-circle text-orange-500"></i>
                            <div>
                                <strong class="text-gray-700 block text-sm">Penolakan</strong>
                                <p class="text-xs text-gray-600">Menolak pemrosesan untuk pemasaran</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sections 8-11 (shortened for space) -->
            <section class="mb-10">
                <div class="flex items-center mb-4">
                    <div class="w-8 h-8 bg-gray-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-gray-600 font-bold text-sm">8</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Penyimpanan Data</h2>
                </div>
                <div class="ml-11 space-y-3 text-gray-600">
                    <p><strong>Durasi:</strong> Data disimpan selama diperlukan untuk tujuan yang dijelaskan dalam kebijakan ini</p>
                    <p><strong>Penghapusan:</strong> Data yang tidak lagi diperlukan akan dihapus secara aman</p>
                    <p><strong>Arsip:</strong> Beberapa data mungkin diarsipkan untuk keperluan hukum atau bisnis yang sah</p>
                </div>
            </section>

            <!-- Contact Section -->
            <section class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-8 border border-indigo-100">
                <div class="flex items-center mb-6">
                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                        <span class="text-indigo-600 font-bold text-sm">12</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Kontak Kami</h2>
                </div>
                
                <p class="text-gray-600 mb-6">
                    Jika Anda memiliki pertanyaan tentang Kebijakan Privasi ini atau ingin menggunakan hak-hak Anda, silakan hubungi kami:
                </p>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-xl font-bold text-indigo-600 mb-4 flex items-center">
                        <span class="text-yellow-400 mr-2">Batik</span>
                        <span>Madura</span>
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <i class="fas fa-map-marker-alt text-red-500 mt-1 mr-3"></i>
                                <div>
                                    <strong class="text-gray-700 block">Alamat:</strong>
                                    <p class="text-gray-600">Jl. Hercules Perum Bumi Antariksa No.E37, Klegen, Kec. Kartoharjo, Kota Madiun, Jawa Timur</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-green-500 mr-3"></i>
                                <div>
                                    <strong class="text-gray-700">Telepon:</strong>
                                    <a href="tel:+6287830325994" class="text-indigo-600 hover:text-indigo-800 ml-1">+62 878-3032-5994</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-blue-500 mr-3"></i>
                                <div>
                                    <strong class="text-gray-700">Email:</strong>
                                    <a href="mailto:batikmadurarumah@gmail.com" class="text-indigo-600 hover:text-indigo-800 ml-1">batikmadurarumah@gmail.com</a>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fab fa-whatsapp text-green-500 mr-3"></i>
                                <div>
                                    <strong class="text-gray-700">WhatsApp:</strong>
                                    <a href="https://wa.me/+6287830325994" target="_blank" class="text-indigo-600 hover:text-indigo-800 ml-1">Chat Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 p-3 bg-indigo-50 rounded-lg border border-indigo-100">
                        <p class="text-sm text-indigo-700">
                            <i class="fas fa-clock mr-2"></i>
                            <strong>Waktu Respons:</strong> Kami akan merespons permintaan Anda dalam waktu maksimal 7 hari kerja.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Footer Note -->
            <div class="mt-8 p-4 bg-gray-50 rounded-lg border border-gray-200 text-center">
                <p class="text-sm text-gray-600 italic">
                    Dengan menggunakan website kami, Anda menyetujui pengumpulan dan penggunaan informasi sesuai dengan Kebijakan Privasi ini.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection