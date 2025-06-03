<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan - Batik Madura</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.7;
            color: #2c2c2c;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            padding: 3rem 2rem;
            margin-bottom: 2rem;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.8);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #8B4513, #D2691E, #CD853F);
        }

        .header h1 {
            color: #8B4513;
            font-size: 2.8rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .header .subtitle {
            color: #A0522D;
            font-size: 1.3rem;
            font-weight: 500;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .header .updated {
            color: #6c757d;
            font-style: italic;
            font-size: 0.95rem;
        }

        .content {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(15px);
            padding: 2.5rem;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.8);
        }

        .toc {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 2rem;
            border-radius: 20px;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .toc h3 {
            color: #8B4513;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1.4rem;
            font-weight: 600;
        }

        .toc-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 0.8rem;
        }

        .toc a {
            color: #495057;
            text-decoration: none;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.95rem;
            font-weight: 500;
            border: 1px solid transparent;
        }

        .toc a:hover {
            background: rgba(139, 69, 19, 0.05);
            transform: translateY(-2px);
            border-color: rgba(139, 69, 19, 0.2);
            color: #8B4513;
        }

        .section {
            margin-bottom: 3rem;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .section:nth-child(odd) {
            animation-delay: 0.1s;
        }

        .section:nth-child(even) {
            animation-delay: 0.2s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section h2 {
            color: #8B4513;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.8rem;
            border-bottom: 2px solid rgba(139, 69, 19, 0.2);
            position: relative;
            font-weight: 600;
        }

        .section h2::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 60px;
            height: 2px;
            background: #8B4513;
        }

        .section h3 {
            color: #495057;
            font-size: 1.3rem;
            margin: 2rem 0 1rem 0;
            font-weight: 600;
        }

        .section h4 {
            color: #6c757d;
            font-size: 1.1rem;
            margin: 1.5rem 0 0.8rem 0;
            font-weight: 500;
        }

        .section p {
            margin-bottom: 1.2rem;
            text-align: justify;
            color: #495057;
        }

        .section ul, .section ol {
            margin-left: 1.8rem;
            margin-bottom: 1.2rem;
        }

        .section li {
            margin-bottom: 0.6rem;
            color: #495057;
        }

        .section li::marker {
            color: #A0522D;
        }

        .highlight-box {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: #1565c0;
            padding: 2rem;
            border-radius: 16px;
            margin: 2rem 0;
            box-shadow: 0 8px 32px rgba(21, 101, 192, 0.12);
            border: 1px solid rgba(21, 101, 192, 0.15);
        }

        .warning-box {
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd9 100%);
            color: #c2185b;
            padding: 2rem;
            border-radius: 16px;
            margin: 2rem 0;
            box-shadow: 0 8px 32px rgba(194, 24, 91, 0.12);
            border: 1px solid rgba(194, 24, 91, 0.15);
        }

        .info-box {
            background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c9 100%);
            color: #2e7d32;
            padding: 2rem;
            border-radius: 16px;
            margin: 2rem 0;
            box-shadow: 0 8px 32px rgba(46, 125, 50, 0.12);
            border: 1px solid rgba(46, 125, 50, 0.15);
        }

        .contact-info {
            background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
            color: white;
            padding: 2.5rem;
            border-radius: 20px;
            margin-top: 2.5rem;
            text-align: center;
            box-shadow: 0 16px 48px rgba(139, 69, 19, 0.25);
            position: relative;
            overflow: hidden;
        }

        .contact-info::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="batik" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23batik)"/></svg>');
            opacity: 0.3;
        }

        .contact-info * {
            position: relative;
            z-index: 1;
        }

        .contact-info h3 {
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 600;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .contact-item {
            background: rgba(255, 255, 255, 0.15);
            padding: 1.5rem;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-2px);
        }

        .contact-item strong {
            display: block;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }

        .contact-item a {
            color: white;
            text-decoration: none;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .contact-item a:hover {
            opacity: 1;
        }

        .footer {
            text-align: center;
            margin-top: 2.5rem;
            padding: 2rem;
            background: rgba(139, 69, 19, 0.05);
            border-radius: 20px;
            color: #6c757d;
            font-style: italic;
            border: 1px solid rgba(139, 69, 19, 0.1);
        }

        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #8B4513, #A0522D);
            color: white;
            border: none;
            border-radius: 50%;
            width: 56px;
            height: 56px;
            cursor: pointer;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(139, 69, 19, 0.3);
            font-size: 1.2rem;
        }

        .scroll-top.visible {
            opacity: 1;
        }

        .scroll-top:hover {
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 12px 40px rgba(139, 69, 19, 0.4);
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .header {
                padding: 2rem 1.5rem;
            }

            .header h1 {
                font-size: 2.2rem;
            }

            .content {
                padding: 2rem;
            }

            .toc-grid {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .section h2 {
                font-size: 1.5rem;
            }
        }

        /* Elegant scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #8B4513, #A0522D);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #A0522D, #8B4513);
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Syarat & Ketentuan</h1>
            <div class="subtitle">Batik Madura - Warisan Budaya Indonesia</div>
            <div class="updated">Terakhir diperbarui: 30 Mei 2025</div>
        </header>

        <div class="content">
            <div class="toc">
                <h3>Daftar Isi</h3>
                <div class="toc-grid">
                    <a href="#section1">1. Penerimaan Syarat</a>
                    <a href="#section2">2. Definisi</a>
                    <a href="#section3">3. Penggunaan Website</a>
                    <a href="#section4">4. Produk dan Layanan</a>
                    <a href="#section5">5. Pemesanan & Pembayaran</a>
                    <a href="#section6">6. Pengiriman</a>
                    <a href="#section7">7. Pengembalian & Penukaran</a>
                    <a href="#section8">8. Jaminan & Kualitas</a>
                    <a href="#section9">9. Hak Kekayaan Intelektual</a>
                    <a href="#section10">10. Privasi & Data</a>
                    <a href="#section11">11. Batasan Tanggung Jawab</a>
                    <a href="#section12">12. Penyelesaian Sengketa</a>
                    <a href="#section13">13. Perubahan S&K</a>
                    <a href="#section14">14. Pemisahan Klausul</a>
                    <a href="#section15">15. Kontak & Dukungan</a>
                </div>
            </div>

            <div id="section1" class="section">
                <h2>1. Penerimaan Syarat</h2>
                <div class="highlight-box">
                    <p>Dengan menggunakan website Batik Madura dan layanan kami, Anda menyetujui untuk terikat oleh Syarat & Ketentuan ini. Jika Anda tidak setuju dengan syarat-syarat ini, mohon untuk tidak menggunakan layanan kami.</p>
                </div>
            </div>

            <div id="section2" class="section">
                <h2>2. Definisi</h2>
                <ul>
                    <li><strong>"Kami", "Kita", "Perusahaan"</strong>: Batik Madura</li>
                    <li><strong>"Anda", "Pengguna"</strong>: Individu atau entitas yang menggunakan layanan kami</li>
                    <li><strong>"Produk"</strong>: Batik dan produk tekstil yang kami jual</li>
                    <li><strong>"Layanan"</strong>: Website, katalog online, dan semua fasilitas yang kami sediakan</li>
                    <li><strong>"Pesanan"</strong>: Permintaan pembelian produk melalui saluran komunikasi kami</li>
                </ul>
            </div>

            <div id="section3" class="section">
                <h2>3. Penggunaan Website</h2>
                <h3>3.1 Hak Penggunaan</h3>
                <ul>
                    <li>Website ini disediakan untuk tujuan informasi dan pemesanan produk</li>
                    <li>Anda dapat menjelajahi katalog dan menghubungi kami untuk pemesanan</li>
                    <li>Konten website dapat dibagikan untuk tujuan non-komersial dengan menyertakan kredit</li>
                </ul>

                <h3>3.2 Larangan Penggunaan</h3>
                <div class="warning-box">
                    <p><strong>Anda dilarang untuk:</strong></p>
                    <ul>
                        <li>Menggunakan website untuk tujuan ilegal atau melanggar hukum</li>
                        <li>Mengganggu atau merusak operasional website</li>
                        <li>Mengakses sistem secara tidak sah atau mencuri data</li>
                        <li>Menyebarkan malware, virus, atau kode berbahaya</li>
                        <li>Melakukan spam atau mengirim komunikasi yang tidak diinginkan</li>
                        <li>Menggunakan konten untuk persaingan usaha tanpa izin</li>
                    </ul>
                </div>
            </div>

            <div id="section4" class="section">
                <h2>4. Produk dan Layanan</h2>
                <h3>4.1 Deskripsi Produk</h3>
                <p>Kami berusaha memberikan deskripsi produk yang akurat. Warna produk pada foto mungkin sedikit berbeda dari aslinya karena pengaturan monitor. Semua produk adalah batik asli Madura dengan jaminan kualitas. Ukuran dan detail produk tercantum dalam deskripsi masing-masing.</p>

                <h3>4.2 Ketersediaan</h3>
                <div class="info-box">
                    <ul>
                        <li>Ketersediaan produk dapat berubah sewaktu-waktu</li>
                        <li>Kami berhak membatasi jumlah pemesanan per pelanggan</li>
                        <li>Produk dengan motif atau ukuran tertentu mungkin memerlukan waktu pembuatan</li>
                    </ul>
                </div>
            </div>

            <div id="section5" class="section">
                <h2>5. Pemesanan dan Pembayaran</h2>
                <h3>5.1 Proses Pemesanan</h3>
                <p>Pemesanan dilakukan melalui WhatsApp, email, atau media komunikasi yang tersedia. Konfirmasi pesanan akan diberikan dalam waktu 1x24 jam. Detail pesanan harus jelas mencakup: produk, ukuran, jumlah, dan alamat pengiriman.</p>

                <h3>5.2 Harga dan Pembayaran</h3>
                <ul>
                    <li>Semua harga dalam Rupiah (IDR) dan belum termasuk ongkos kirim</li>
                    <li>Harga dapat berubah tanpa pemberitahuan sebelumnya</li>
                    <li>Pembayaran dilakukan sebelum pengiriman barang</li>
                    <li>Metode pembayaran yang diterima akan dikonfirmasi saat pemesanan</li>
                    <li>Bukti pembayaran harus dikirimkan untuk konfirmasi</li>
                </ul>

                <h3>5.3 Konfirmasi Pesanan</h3>
                <div class="highlight-box">
                    <p><strong>Pesanan dianggap sah setelah:</strong></p>
                    <ul>
                        <li>Konfirmasi detail pesanan dari kedua belah pihak</li>
                        <li>Pembayaran diterima dan diverifikasi</li>
                        <li>Konfirmasi ketersediaan produk</li>
                    </ul>
                </div>
            </div>

            <div id="section6" class="section">
                <h2>6. Pengiriman</h2>
                <h3>6.1 Wilayah Pengiriman</h3>
                <p>Kami mengirim ke seluruh Indonesia. Pengiriman internasional dapat diatur dengan kesepakatan khusus. Ongkos kirim ditanggung oleh pembeli.</p>

                <h3>6.2 Waktu Pengiriman</h3>
                <ul>
                    <li>Estimasi waktu pengiriman: 3-7 hari kerja (dalam kota), 5-14 hari kerja (luar kota)</li>
                    <li>Waktu dapat berbeda tergantung lokasi dan ekspedisi yang dipilih</li>
                    <li>Produk custom memerlukan waktu tambahan 7-14 hari kerja</li>
                    <li>Keterlambatan akibat force majeure di luar tanggung jawab kami</li>
                </ul>

                <h3>6.3 Risiko Pengiriman</h3>
                <div class="warning-box">
                    <p>Risiko kehilangan atau kerusakan selama pengiriman ditanggung oleh jasa ekspedisi. Kami akan membantu proses klaim jika terjadi masalah pengiriman. Paket harus diperiksa di hadapan kurir saat diterima.</p>
                </div>
            </div>

            <div id="section7" class="section">
                <h2>7. Pengembalian dan Penukaran</h2>
                <h3>7.1 Kebijakan Pengembalian</h3>
                <p>Pengembalian diterima dalam 3 hari setelah barang diterima. Barang harus dalam kondisi asli, belum digunakan, dan kemasan utuh. Biaya pengiriman pengembalian ditanggung pembeli kecuali ada kesalahan dari kami.</p>

                <h3>7.2 Kondisi Pengembalian/Penukaran</h3>
                <div class="info-box">
                    <p><strong>Kami menerima pengembalian/penukaran jika:</strong></p>
                    <ul>
                        <li>Barang yang diterima tidak sesuai pesanan</li>
                        <li>Ada cacat produksi yang tidak terdeteksi sebelum pengiriman</li>
                        <li>Kerusakan akibat pengiriman (dengan bukti foto)</li>
                    </ul>
                </div>

                <h3>7.3 Proses Pengembalian</h3>
                <ol>
                    <li>Hubungi kami dalam 3 hari dengan foto bukti masalah</li>
                    <li>Tunggu konfirmasi persetujuan pengembalian</li>
                    <li>Kirim barang dengan kemasan yang aman</li>
                    <li>Pengembalian uang atau penukaran diproses setelah barang diterima</li>
                </ol>
            </div>

            <div id="section8" class="section">
                <h2>8. Jaminan dan Kualitas</h2>
                <h3>8.1 Jaminan Kualitas</h3>
                <div class="highlight-box">
                    <p>Semua produk adalah batik asli Madura. Kami menjamin kualitas bahan dan pewarnaan sesuai standar batik tradisional. Jaminan tidak berlaku untuk kerusakan akibat pemakaian normal atau perawatan yang salah.</p>
                </div>

                <h3>8.2 Batasan Jaminan</h3>
                <ul>
                    <li>Perubahan warna akibat paparan sinar matahari berlebihan</li>
                    <li>Kerusakan akibat pencucian yang tidak tepat</li>
                    <li>Modifikasi atau perbaikan oleh pihak lain</li>
                </ul>
            </div>

            <div id="section9" class="section">
                <h2>9. Hak Kekayaan Intelektual</h2>
                <h3>9.1 Hak Cipta</h3>
                <p>Semua konten website (teks, gambar, desain) adalah milik Batik Madura. Motif batik mengikuti tradisi dan warisan budaya Madura. Penggunaan foto produk untuk keperluan komersial memerlukan izin tertulis.</p>

                <h3>9.2 Merek Dagang</h3>
                <p>"Batik Madura" adalah merek yang kami gunakan untuk identitas usaha. Penggunaan nama atau logo untuk keperluan komersial tanpa izin dilarang.</p>
            </div>

            <div id="section10" class="section">
                <h2>10. Privasi dan Data</h2>
                <div class="info-box">
                    <p>Informasi pribadi Anda dilindungi sesuai Kebijakan Privasi kami. Data pemesanan digunakan untuk memproses dan melacak pesanan. Kami tidak membagikan informasi pelanggan kepada pihak ketiga tanpa persetujuan.</p>
                </div>
            </div>

            <div id="section11" class="section">
                <h2>11. Batasan Tanggung Jawab</h2>
                <h3>11.1 Batasan Umum</h3>
                <ul>
                    <li>Tanggung jawab kami terbatas pada nilai produk yang dibeli</li>
                    <li>Kami tidak bertanggung jawab atas kerugian tidak langsung atau konsekuensial</li>
                    <li>Force majeure (bencana alam, pandemi, kebijakan pemerintah) dikecualikan dari tanggung jawab</li>
                </ul>

                <h3>11.2 Pengecualian</h3>
                <div class="warning-box">
                    <ul>
                        <li>Kesalahan dalam interpretasi warna atau ukuran berdasarkan foto</li>
                        <li>Ketidakcocokan selera atau ekspektasi pribadi</li>
                        <li>Kerusakan akibat kelalaian pengguna</li>
                    </ul>
                </div>
            </div>

            <div id="section12" class="section">
                <h2>12. Penyelesaian Sengketa</h2>
                <h3>12.1 Mediasi</h3>
                <p>Setiap perselisihan akan diselesaikan melalui diskusi yang baik. Kami berkomitmen untuk mencari solusi win-win untuk semua pihak.</p>

                <h3>12.2 Hukum yang Berlaku</h3>
                <p>Syarat & Ketentuan ini tunduk pada hukum Republik Indonesia. Sengketa yang tidak dapat diselesaikan secara damai akan diselesaikan melalui pengadilan yang berwenang di Madiun, Jawa Timur.</p>
            </div>

            <div id="section13" class="section">
                <h2>13. Perubahan Syarat & Ketentuan</h2>
                <div class="highlight-box">
                    <p>Kami berhak mengubah Syarat & Ketentuan ini kapan saja. Perubahan akan diberitahukan melalui website dan media komunikasi resmi. Penggunaan layanan setelah perubahan dianggap sebagai persetujuan.</p>
                </div>
            </div>

            <div id="section14" class="section">
                <h2>14. Pemisahan Klausul</h2>
                <p>Jika ada bagian dari Syarat & Ketentuan ini yang dianggap tidak berlaku atau tidak dapat dilaksanakan, bagian lainnya tetap berlaku sepenuhnya.</p>
            </div>

            <div id="section15" class="section">
                <h2>15. Kontak dan Dukungan</h2>
                <p>Untuk pertanyaan tentang Syarat & Ketentuan ini atau dukungan pelanggan:</p>

                <div class="contact-info">
                    <h3>Batik Madura</h3>
                    <div class="contact-grid">
                        <div class="contact-item">
                            <strong>📍 Alamat</strong>
                            Jl. Hercules Perum Bumi Antariksa No.E37, Klegen, Kec. Kartoharjo, Kota Madiun, Jawa Timur
                        </div>
                        <div class="contact-item">
                            <strong>📞 Telepon</strong>
                            +62 878-3032-5994
                        </div>
                        <div class="contact-item">
                            <strong>✉️ Email</strong>
                            batikmadurarumah@gmail.com
                        </div>
                        <div class="contact-item">
                            <strong>💬 WhatsApp</strong>
                            <a href="https://wa.me/+6287830325994">wa.me/+6287830325994</a>
                        </div>
                        <div class="contact-item">
                            <strong>📱 Instagram</strong>
                            @rumah.batik.madura
                        </div>
                        <div class="contact-item">
                            <strong>🕐 Jam Operasional</strong>
                            Senin - Sabtu: 08.00 - 17.00 WIB<br>
                            Minggu: 09.00 - 15.00 WIB
                        </div>
                    </div>
                    <p style="margin-top: 1rem;"><strong>Waktu Respons:</strong> Maksimal 1x24 jam untuk hari kerja</p>
                </div>
            </div>
        </div>

        <div class="footer">
            <p><em>Dengan melakukan pemesanan atau menggunakan layanan kami, Anda menyatakan telah membaca, memahami, dan menyetujui Syarat & Ketentuan ini.</em></p>
            <p><strong>Efektif sejak: 30 Mei 2025</strong></p>
        </div>
    </div>

    <button class="scroll-top" id="scrollTop">↑</button>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Scroll to top button functionality
        const scrollTopButton = document.getElementById('scrollTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopButton.classList.add('visible');
            } else {
                scrollTopButton.classList.remove('visible');
            }
        });

        scrollTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all sections for animation
        document.querySelectorAll('.section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>