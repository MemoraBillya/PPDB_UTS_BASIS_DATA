<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prosedur PPDB Surabaya 202X') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Konten jadwal bisa ditampilkan di sini -->
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
</x-app-layout>
