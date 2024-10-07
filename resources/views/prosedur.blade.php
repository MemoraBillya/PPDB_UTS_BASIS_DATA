<x-app-layout>
    <x-slot name="header">
        <head class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prosedur PPDB Surabaya 202X') }}
                    <!-- Google Web Fonts -->
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

                    <!-- Icon Font Stylesheet -->
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

                    <!-- Libraries Stylesheet -->
                    <link rel="stylesheet" href="lib/animate/animate.min.css" />
                    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
                    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

                    <!-- Customized Bootstrap Stylesheet -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">

                    <!-- Template Stylesheet -->
                    <link href="css/style.css" rel="stylesheet">
        </head>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Konten jadwal -->
                    <div x-data="{ openTab: 1 }" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <!-- Tab Buttons -->
                        <div class="border-b border-gray-200">
                            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                <button @click="openTab = 1" :class="{'border-indigo-500 text-indigo-600': openTab === 1}" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Tata Cara Pendaftaran</button>
                                <button @click="openTab = 2" :class="{'border-indigo-500 text-indigo-600': openTab === 2}" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Kriteria Pemeringkatan</button>
                                <button @click="openTab = 3" :class="{'border-indigo-500 text-indigo-600': openTab === 3}" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Pengumuman dan Cetak Bukti Penerimaan</button>
                                <button @click="openTab = 4" :class="{'border-indigo-500 text-indigo-600': openTab === 4}" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">Tata Cara Daftar Ulang</button>
                            </nav>
                        </div>
                    
                        <!-- Tab Content -->
                        <div class="py-6">
                            <div x-show="openTab === 1">
                                <h2 class="text-xl font-semibold">Tata Cara Pendaftaran</h2>
                                <ol class="mt-4 list-decimal list-inside">
                                    <li>1. Login ke situs BASDAT GACOR 🔥💥🌪🌊 dengan menggunakan akun yang sudah terdaftar.</li>
                                    <li>2. Memilih paling banyak 3 (tiga) sekolah dengan ketentuan paling banyak 3 (tiga) sekolah di wilayah Surabaya.</li>
                                    <li>3. Mengunduh bukti pendaftaran.</li>
                                </ol>
                            </div>
                    
                            <div x-show="openTab === 2">
                                <h2 class="text-xl font-semibold">Kriteria Pemeringkatan</h2>
                                <p class="mt-4">Apabila pendaftar melebihi kuota pagu sekolah, maka pemeringkatan berdasarkan urutan:</p>
                                <ol class="mt-4 list-decimal list-inside">
                                    <li>1. Jarak domisili terdekat dengan sekolah tujuan</li>
                                    <li>2. Jika jarak domisili terdekat dengan sekolah tujuan sama, maka diperingkat berdasarkan usia calon peserta didik baru yang lebih tua.</li>
                                    <li>3. Jika jarak domisili terdekat dengan sekolah tujuan dan usia calon peserta didik baru yang lebih tua masih sama, maka diperingkat berdasarkan waktu pendaftaran.</li>
                                </ol>
                                <p class="mt-6">Berikut simulasi perangkingan Jalur Zonasi:</p>
                                <div class="mt-6">
                                    <img src="{{ asset('images/simulasi-perangkingan-zonasi.png') }}" alt="Contoh Gambar" class="w-full h-auto rounded-md shadow-md">
                                </div>
                            </div>                            
                    
                            <div x-show="openTab === 3">
                                <h2 class="text-xl font-semibold">Pengumuman dan Cetak Bukti Penerimaan</h2>
                                <p class="mt-4">1. Pengumuman jalur PPDB Zonasi diumumkan melalui aplikasi PPDB online pada situs BASDAT GACOR sesuai dengan jadwal yang telah ditentukan.</p>
                                <p class="mt-4">2. Calon peserta didik yang lolos merupakan calon peserta didik yang memenuhi persyaratan dan masuk dalam kuota daya tampung sekolah.</p>
                                <p class="mt-4">3. Calon peserta didik yang tidak lolos terdiri dari:</p>
                                <ul class="mt-4 list-disc list-inside">
                                    <li>Calon peserta didik yang tidak memenuhi persyaratan, dan/atau</li>
                                    <li>Calon peserta didik yang memenuhi persyaratan, namun tidak masuk dalam kuota daya tampung sekolah.</li>
                                </ul>
                                <p class="mt-4">4. Calon peserta didik yang lolos sebagaimana dimaksud pada nomor 2 tidak dapat mendaftar di jalur dan tahap berikutnya.</p>
                                <p class="mt-4">5. Calon peserta didik yang tidak lolos sebagaimana dimaksud pada nomor 3 dapat mendaftar di tahap dan jalur berikutnya.</p>
                                <p class="mt-4">6. Calon peserta didik yang lolos di sekolah pilihannya sesuai jalur yang dipilih, wajib melakukan cetak bukti pendaftaran melalui situs ppdb.jatimprov.go.id sesuai dengan jadwal yang telah ditentukan.</p>
                                <p class="mt-4">7. Calon peserta didik yang lolos dan telah melakukan cetak bukti pendaftaran, wajib melaksanakan proses daftar ulang sesuai jadwal yang telah ditentukan.</p>
                            </div>                            
                    
                            <div x-show="openTab === 4">
                                <h2 class="text-xl font-semibold">Tata Cara Daftar Ulang</h2>
                                <ol class="mt-4">
                                    <li>1. Daftar ulang dilakukan oleh calon peserta didik baru yang telah diterima di sekolah tujuan/diterima.</li>
                                    <li>2. Daftar ulang dilakukan untuk memastikan statusnya sebagai peserta didik pada sekolah yang bersangkutan dengan menyerahkan foto copy dan menunjukkan dokumen asli (KK/SKD/SKPD, Ijazah/SKL, dan dokumen lainnya) yang dibutuhkan sesuai dengan persyaratan.</li>
                                    <li>3. Sekolah menyelenggarakan daftar ulang bagi calon peserta didik yang lolos sesuai dengan jadwal yang telah ditentukan dalam petunjuk teknis.</li>
                                    <li>4. Dalam hal terdapat calon peserta didik yang dinyatakan telah lolos pada jalur zonasi, namun tidak melakukan daftar ulang/mengundurkan diri sehingga berdampak pada timbulnya kuota daya tampung, maka daya tampung diisi melalui mekanisme pemenuhan pagu.</li>
                                    <li>5. Calon peserta didik yang dapat masuk pemenuhan pagu yang dimaksud pada nomor 4 adalah calon peserta didik yang memenuhi persyaratan, namun tidak masuk dalam kuota daya tampung sekolah.</li>
                                    <li>6. Daftar ulang calon peserta didik baru tidak dipungut biaya.</li>
                                    <li>7. Apabila ditemukan pemalsuan pengisian data dan/atau dokumen, maka akan diproses sesuai dengan aturan hukum yang berlaku dan dicabut haknya sebagai peserta didik baru.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Include Alpine.js -->
                    <script src="//unpkg.com/alpinejs" defer></script>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-4">
                    <h4 class="text-white"><i class="fas fa-school me-3"></i>PPDB Surabaya</h4>
                    <p>PPDB Surabaya 2024 adalah platform resmi untuk pendaftaran peserta didik baru di Kota Surabaya.</p>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-2">
                    <h4 class="text-white mb-4">Tautan Cepat</h4>
                    <a href="/prosedur"><i class="fas fa-angle-right me-2"></i> Prosedur</a>
                    <a href="/jadwal"><i class="fas fa-angle-right me-2"></i> Jadwal</a>
                    <a href="/pendaftaran"><i class="fas fa-angle-right me-2"></i> Pendaftaran</a>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <h4 class="text-white mb-4">Info Kontak</h4>
                    <p><i class="fas fa-map-marker-alt text-primary me-3"></i> Jl. Raya Surabaya No.123</p>
                    <p><i class="fas fa-envelope text-primary me-3"></i> ppdb@surabaya.go.id</p>
                    <p><i class="fa fa-phone-alt text-primary me-3"></i> (+62) 123 456 789</p>
                    <p><i class="fab fa-firefox-browser text-primary me-3"></i> ppdb.surabaya.go.id</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</x-app-layout>
