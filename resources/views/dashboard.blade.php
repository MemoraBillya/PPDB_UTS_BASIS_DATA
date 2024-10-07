<x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>PPDB GACORRRR</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="lib/animate/animate.min.css"/>
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
            <!-- Carousel Start -->
            <div class="header-carousel owl-carousel">
                <div class="header-carousel-item">
                    <img src="img/carousel-1.jpg" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row gy-0 gx-5">
                                <div class="col-lg-0 col-xl-5"></div>
                                <div class="col-xl-7 animated fadeInLeft">
                                    <div class="text-sm-center text-md-end">
                                        <h4 class="text-primary text-uppercase fw-bold mb-4">Selamat Datang di PPDB Surabaya 2024</h4>
                                        <h1 class="display-4 text-uppercase text-white mb-4">Penerimaan Peserta Didik Baru</h1>
                                        <p class="mb-5 fs-5">Proses seleksi untuk penerimaan siswa baru di Surabaya. Pilih sekolah sesuai zonasi dan jadwal yang ditentukan.</p>
                                        <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-4">
                                            <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="/pendaftaran">Daftar Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-carousel-item">
                    <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row g-5">
                                <div class="col-12 animated fadeInUp">
                                    <div class="text-center">
                                        <h4 class="text-primary text-uppercase fw-bold mb-4">Selamat Datang di PPDB Surabaya 2024</h4>
                                        <h1 class="display-4 text-uppercase text-white mb-4">Ayo Bergabung dengan Sekolah Favoritmu</h1>
                                        <p class="mb-5 fs-5">Persiapkan dokumen dan ikuti petunjuk pendaftaran sesuai jadwal yang berlaku.</p>
                                        <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                            <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="/pendaftaran">Daftar Sekarang</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        <!-- Navbar & Hero End -->



        <!-- About Start -->
        <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                        <div>
                            <h4 class="text-primary">Tentang Kami</h4>
                            <h1 class="display-5 mb-4">PPDB Surabaya 2024, Kesempatan Terbaik Untuk Masa Depan</h1>
                            <p class="mb-4">PPDB Surabaya 2024 hadir untuk memberikan kesempatan bagi siswa-siswi berprestasi di Surabaya dalam menempuh pendidikan yang berkualitas. Pastikan Anda mengikuti semua prosedur dengan tepat waktu untuk memaksimalkan peluang ini.</p>
                        </div>
                    </div>
                    <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="img/about-2.png" class="img-fluid rounded w-100" alt="">
                            <!-- Gambar tetap -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Services Start -->
        <div class="container-fluid service pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Pusat Informasi</h4>
                    <h1 class="display-5 mb-4">Pelajari Semua Tentang PPDB Surabaya!</h1>
                    <p class="mb-0">Pelajari lebih lanjut mengenai prosedur, jadwal, dan pendaftaran PPDB Surabaya 2024 melalui halaman-halaman berikut.</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="img/service-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="{{ url('/prosedur') }}" class="h4 d-inline-block mb-4">Prosedur PPDB</a>
                                <p class="mb-4">Pelajari tata cara pendaftaran PPDB Surabaya 2024 agar Anda tidak ketinggalan informasi penting.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ url('/prosedur') }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="img/service-2.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="{{ url('/jadwal') }}" class="h4 d-inline-block mb-4">Jadwal PPDB</a>
                                <p class="mb-4">Lihat jadwal lengkap pelaksanaan PPDB, mulai dari pendaftaran hingga pengumuman hasil.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ url('/jadwal') }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="img/service-3.jpg" class="img-fluid rounded-top w-100" alt="Image">
                            </div>
                            <div class="rounded-bottom p-4">
                                <a href="{{ url('/pendaftaran') }}" class="h4 d-inline-block mb-4">Pendaftaran PPDB</a>
                                <p class="mb-4">Daftarkan diri Anda secara online dan ikuti proses pendaftaran dengan mudah.</p>
                                <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ url('/pendaftaran') }}">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Services End -->

    
        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5 border-start-0 border-end-0" style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
                <div class="row g-5">
                    <!-- About PPDB Surabaya -->
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-item">
                            <a href="/" class="p-0">
                                <h4 class="text-white"><i class="fas fa-school me-3"></i>PPDB Surabaya</h4>
                            </a>
                            <p class="mb-4">PPDB Surabaya 2024 adalah platform resmi untuk pendaftaran peserta didik baru di Kota Surabaya, memudahkan calon siswa untuk mendaftar secara online dengan prosedur yang jelas dan transparan.</p>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Tautan Cepat</h4>
                            <a href="/prosedur"><i class="fas fa-angle-right me-2"></i> Prosedur</a>
                            <a href="/jadwal"><i class="fas fa-angle-right me-2"></i> Jadwal</a>
                            <a href="/pendaftaran"><i class="fas fa-angle-right me-2"></i> Pendaftaran</a>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Info Kontak</h4>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt text-primary me-3"></i>
                                <p class="text-white mb-0">Jl. Raya Surabaya No.123, Surabaya, Indonesia</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope text-primary me-3"></i>
                                <p class="text-white mb-0">ppdb@surabaya.go.id</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa fa-phone-alt text-primary me-3"></i>
                                <p class="text-white mb-0">(+62) 123 456 789</p>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <i class="fab fa-firefox-browser text-primary me-3"></i>
                                <p class="text-white mb-0">ppdb.surabaya.go.id</p>
                            </div>
                            <div class="d-flex">
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f text-white"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="#"><i class="fab fa-twitter text-white"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="#"><i class="fab fa-instagram text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


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
    </body>
</x-app-layout>
