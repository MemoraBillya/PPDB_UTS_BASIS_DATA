<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaftaran PPDB Surabaya 202X') }}
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
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900"> 
                    @php
                        // Cek status pendaftaran
                        if ($statusPendaftaran == 'menunggu_validasi') {
                            $isDisabled = 'disabled';
                            $disabledClass = 'bg-gray-200 text-gray-400 cursor-not-allowed';
                            $message = 'Anda telah terdaftar, tunggu validasi pendaftaran anda!';
                            $messageClass = 'bg-yellow-100 border border-yellow-400 text-yellow-700';
                        } elseif ($statusPendaftaran == 'valid') {
                            $isDisabled = 'disabled';
                            $disabledClass = 'bg-gray-200 text-gray-400 cursor-not-allowed';
                            $message = 'Pendaftaran anda telah divalidasi! Silakan tunggu hasil seleksi.';
                            $messageClass = 'bg-green-100 border border-green-400 text-green-700';
                        } elseif ($statusPendaftaran == 'invalid') {
                            $isDisabled = ''; // Form dapat diisi ulang jika status invalid
                            $disabledClass = ''; // Form tidak dinonaktifkan
                            $message = 'Pendaftaran anda tidak valid! Mohon periksa data formulir anda.';
                            $messageClass = 'bg-red-100 border border-red-400 text-red-700';
                        } else {
                            $isDisabled = ''; // Jika tidak ada status yang relevan, form tetap aktif
                            $disabledClass = '';
                            $message = '';
                            $messageClass = '';
                        }
                @endphp

                <!-- Pesan Pendaftaran -->
                @if (!empty($message))
                    <div class="mb-4 p-4 {{ $messageClass }} rounded">
                        {{ $message }}
                    </div>
                @endif
                    <form id="registrationForm" action="{{ route('pendaftaran') }}" method="POST">
                        @csrf
    
                        <!-- Step 1: Form Siswa -->
                        <div id="step1" class="form-step">
                            <!-- Form Siswa -->
                            <h3 class="font-semibold text-lg mb-4">Data Calon Peserta Didik</h3>
                            
                            <div class="mb-4">
                                <label for="nisn_siswa" class="block text-sm font-medium text-gray-700">NISN Siswa</label>
                                <input type="text" name="nisn_siswa" id="nisn_siswa" value="{{ old('nisn_siswa', $siswa->nisn_siswa ?? '') }}" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }} required>
                            </div>

                            <div class="mb-4">
                                <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $siswa->nama_siswa ?? '') }}" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }} required>
                            </div>

                            <div class="mb-4">
                                <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir ?? '') }}" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }} required>
                            </div>

                            <div class="mb-4">
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }} required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                <textarea name="alamat" id="alamat" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }} required>{{ old('alamat', $siswa->alamat ?? '') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="nilai_rapor" class="block text-sm font-medium text-gray-700">Rata-rata Nilai Rapor</label>
                                <input type="number" step="0.01" name="nilai_rapor" id="nilai_rapor" value="{{ old('nilai_rapor', $siswa->nilai_rapor ?? '') }}" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }} required>
                            </div>

                            <div class="mb-4">
                                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                                <input type="number" name="nik" id="nik" value="{{ old('nik', $siswa->nik ?? '') }}" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }} required>
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $siswa->email ?? '') }}" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }}>
                            </div>

                            <div class="mb-4">
                                <label for="no_hp_siswa" class="block text-sm font-medium text-gray-700">No HP Siswa</label>
                                <input type="text" name="no_hp_siswa" id="no_hp_siswa" value="{{ old('no_hp_siswa', $siswa->no_hp_siswa ?? '') }}" class="mt-1 block w-full {{ $disabledClass }}" {{ $isDisabled }}>
                            </div>
    
                            <div class="flex justify-between">
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md" style="background-color: #000000; color: white;" {{ $isDisabled }} onclick="nextStep()">Selanjutnya</button>
                            </div>
                        </div>
    
                        <!-- Step 2: Form Pilihan Sekolah -->
                        <div id="step2" class="form-step hidden">
                            <h3 class="font-semibold text-lg mb-4 mt-6">Pilihan Sekolah</h3>
                            <p class="text-sm mb-4">Pilih maksimal 3 sekolah</p>
                            @foreach (['sekolah1', 'sekolah2', 'sekolah3'] as $sekolahField)
                            <div class="mb-4">
                                <label for="{{ $sekolahField }}" class="block text-sm font-medium text-gray-700">Pilihan Sekolah {{ $loop->iteration }}</label>
                                <select name="{{ $sekolahField }}" id="{{ $sekolahField }}" class="mt-1 block w-full" {{ $isDisabled }}>
                                    <option value="">-- Pilih Sekolah --</option>
                                    @foreach ($sekolahList as $sekolah)
                                        <option value="{{ $sekolah->id_sekolah }}">{{ $sekolah->nama_sekolah }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                            <div class="flex justify-between">
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md" style="background-color: #000000; color: white;" onclick="prevStep()">Kembali</button>
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md" style="background-color: #000000; color: white;" onclick="nextStep()">Selanjutnya</button>
                            </div>
                        </div>
    
                        <!-- Step 3: Form Orang Tua -->
                        <div id="step3" class="form-step hidden">
                            <h3 class="font-semibold text-lg mb-4 mt-6">Data Orang Tua Calon Peserta Didik</h3>

                            <div class="mb-4">
                                <label for="no_kk" class="block text-sm font-medium text-gray-700">No KK</label>
                                <input type="number" name="no_kk" id="no_kk" value="{{ old('no_kk', $orangtua->no_kk ?? '') }}" class="mt-1 block w-full" required>
                            </div>
                        
                            <div class="mb-4">
                                <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah', $orangtua->nama_ayah ?? '') }}" class="mt-1 block w-full" required>
                            </div>
                        
                            <div class="mb-4">
                                <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu', $orangtua->nama_ibu ?? '') }}" class="mt-1 block w-full" required>
                            </div>
                        
                            <div class="mb-4">
                                <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $orangtua->pekerjaan_ayah ?? '') }}" class="mt-1 block w-full" required>
                            </div>
                        
                            <div class="mb-4">
                                <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
                                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $orangtua->pekerjaan_ibu ?? '') }}" class="mt-1 block w-full" required>
                            </div>
                        
                            <div class="mb-4">
                                <label for="penghasilan_ayah" class="block text-sm font-medium text-gray-700">Penghasilan Ayah</label>
                                <input type="number" name="penghasilan_ayah" id="penghasilan_ayah" value="{{ old('penghasilan_ayah', $orangtua->penghasilan_ayah ?? '') }}" class="mt-1 block w-full" required>
                            </div>
                        
                            <div class="mb-4">
                                <label for="penghasilan_ibu" class="block text-sm font-medium text-gray-700">Penghasilan Ibu</label>
                                <input type="number" name="penghasilan_ibu" id="penghasilan_ibu" value="{{ old('penghasilan_ibu', $orangtua->penghasilan_ibu ?? '') }}" class="mt-1 block w-full" required>
                            </div>
                        
                            <div class="mb-4">
                                <label for="no_hp_ayah" class="block text-sm font-medium text-gray-700">No HP Ayah</label>
                                <input type="text" name="no_hp_ayah" id="no_hp_ayah" value="{{ old('no_hp_ayah', $orangtua->no_hp_ayah ?? '') }}" class="mt-1 block w-full">
                            </div>
                        
                            <div class="mb-4">
                                <label for="no_hp_ibu" class="block text-sm font-medium text-gray-700">No HP Ibu</label>
                                <input type="text" name="no_hp_ibu" id="no_hp_ibu" value="{{ old('no_hp_ibu', $orangtua->no_hp_ibu ?? '') }}" class="mt-1 block w-full">
                            </div>
                        
                            <div class="mb-4">
                                <label for="alamat_ayah" class="block text-sm font-medium text-gray-700">Alamat Ayah</label>
                                <textarea name="alamat_ayah" id="alamat_ayah" class="mt-1 block w-full" required>{{ old('alamat_ayah', $orangtua->alamat_ayah ?? '') }}</textarea>
                            </div>
                        
                            <div class="mb-4">
                                <label for="alamat_ibu" class="block text-sm font-medium text-gray-700">Alamat Ibu</label>
                                <textarea name="alamat_ibu" id="alamat_ibu" class="mt-1 block w-full" required>{{ old('alamat_ibu', $orangtua->alamat_ibu ?? '') }}</textarea>
                            </div>

    
                            <!-- Tambahan form lainnya ... -->
    
                            <div class="flex justify-between">
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md" style="background-color: #000000; color: white;" onclick="prevStep()">Kembali</button>
                                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-md" style="background-color: #000000; color: white;" onclick="openModal(event)">Submit</button>
                            </div>
                            <div id="confirmationModal" style="display:none;" class="fixed z-10 inset-0 flex justify-center items-center">
                                <div class="bg-white rounded-lg shadow-xl sm:max-w-lg sm:w-full">
                                    <div class="px-4 pt-5 pb-4">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Konfirmasi Pengiriman</h3>
                                        <p class="text-sm text-gray-500 mt-2">
                                            Pastikan data yang Anda masukkan sudah benar. Apakah Anda yakin ingin mengirim formulir ini?
                                        </p>
                                    </div>
                                    <div class="modal-footer flex justify-between mt-5 sm:mt-6">
                                        <button type="button" class="bg-green-500 text-white px-4 py-2 rounded-md" onclick="submitForm()" style="background-color: #28a745; color: white;">
                                            Ya, Kirim
                                        </button>
                                        <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md" onclick="closeModal()" style="background-color: #dc3545; color: white;">
                                            Batal
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

    <script>
        let currentStep = 0;
        const formSteps = document.querySelectorAll(".form-step");
    
        // Menampilkan step form berdasarkan currentStep
        function showStep(step) {
            formSteps.forEach((formStep, index) => {
                formStep.classList.toggle("hidden", index !== step);
            });
        }
    
        // Navigasi ke step berikutnya dengan validasi
        function nextStep() {
            if (validateStep(currentStep)) {
                if (currentStep < formSteps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        }
    
        // Navigasi ke step sebelumnya
        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        }
    
        // Fungsi untuk validasi setiap step form
        function validateStep(step) {
            const inputs = formSteps[step].querySelectorAll('input, select, textarea');
            let isValid = true;
    
            inputs.forEach(input => {
                // Bersihkan pesan error sebelumnya
                removeErrorMessage(input);
    
                // Cek apakah field required sudah diisi
                if (input.hasAttribute('required') && !input.value.trim()) {
                    isValid = false;
                    displayErrorMessage(input, 'Field ini harus diisi.');
                }
    
                // Cek format NISN
                if (input.name === 'nisn_siswa' && !/^\d{10}$/.test(input.value.trim())) {
                    isValid = false;
                    displayErrorMessage(input, 'NISN harus terdiri dari 10 digit angka.');
                }
    
                // Cek format email
                if (input.type === 'email' && input.value.trim() && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value.trim())) {
                    isValid = false;
                    displayErrorMessage(input, 'Format email tidak valid.');
                }
    
                // Cek format nomor telepon
                if (input.name.includes('no_hp') && input.value.trim() && !/^\d{10,}$/.test(input.value.trim())) {
                    isValid = false;
                    displayErrorMessage(input, 'Nomor telepon harus terdiri dari minimal 10 digit angka.');
                }
            });
    
            return isValid;
        }
    
        // Fungsi untuk menampilkan pesan error
        function displayErrorMessage(input, message) {
            const error = document.createElement('div');
            error.className = 'text-red-500 text-sm mt-1';
            error.textContent = message;
            input.parentNode.appendChild(error);
        }
    
        // Fungsi untuk membersihkan pesan error
        function removeErrorMessage(input) {
            const error = input.parentNode.querySelector('.text-red-500');
            if (error) {
                error.remove();
            }
        }
    
        // Membuka modal konfirmasi
        function openModal(event) {
        event.preventDefault(); // Mencegah aksi default (submit)
        document.getElementById("confirmationModal").style.display = "block";
        }

        // Menutup modal konfirmasi
        function closeModal() {
            document.getElementById("confirmationModal").style.display = "none";
        }

        // Submit form ketika tombol "Ya, Kirim" di modal ditekan
        function submitForm() {
            document.getElementById("registrationForm").submit(); // Pastikan ID sesuai
        }
    
        // Inisialisasi tampilan form
        showStep(currentStep);
    </script>
    <style>
        #confirmationModal {
            max-width: 500px;
            margin: 50px auto; 
            max-height: 45%;
            overflow-y: auto; 
            display: flex;
            justify-content: center; 
            align-items: center; 
        }

        #confirmationModal .modal-footer {
            display: flex;
            justify-content: center; /* Atur agar tombol berada di tengah */
            gap: 10px; /* Jarak antara tombol */
        }
    </style>
</x-app-layout> 