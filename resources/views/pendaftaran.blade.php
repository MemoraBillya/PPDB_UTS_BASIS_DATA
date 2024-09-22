<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaftaran PPDB Surabaya 202X') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="#" method="POST">
                        @csrf
                        <!-- Form Siswa -->
                        <h3 class="font-semibold text-lg mb-4">Data Calon Peserta Didik</h3>
                        
                        <div class="mb-4">
                            <label for="nisn_siswa" class="block text-sm font-medium text-gray-700">NISN Siswa</label>
                            <input type="text" name="nisn_siswa" id="nisn_siswa" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="mt-1 block w-full" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea name="alamat" id="alamat" class="mt-1 block w-full" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="nilai_rapor" class="block text-sm font-medium text-gray-700">Rata-rata Nilai Rapor</label>
                            <input type="number" step="0.01" name="nilai_rapor" id="nilai_rapor" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                            <input type="number" name="nik" id="nik" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="no_hp_siswa" class="block text-sm font-medium text-gray-700">No HP Siswa</label>
                            <input type="text" name="no_hp_siswa" id="no_hp_siswa" class="mt-1 block w-full">
                        </div>

                        <!-- Form Pilihan Sekolah -->
                        <h3 class="font-semibold text-lg mb-4 mt-6">Pilihan Sekolah</h3>

                        <p class="text-sm mb-4">Pilih maksimal 3 sekolah</p>

                        <div class="mb-4">
                            <label for="sekolah1" class="block text-sm font-medium text-gray-700">Pilihan Sekolah 1</label>
                            <select name="sekolah1" id="sekolah1" class="mt-1 block w-full">
                                <option value="">-- Pilih Sekolah --</option>
                                <!-- TTambahin opsi sekolah di sini, sementara kosong ygy -->
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="sekolah2" class="block text-sm font-medium text-gray-700">Pilihan Sekolah 2</label>
                            <select name="sekolah2" id="sekolah2" class="mt-1 block w-full">
                                <option value="">-- Pilih Sekolah --</option>
                                <!-- Tambahin opsi sekolah di sini, sementara kosong ygy  -->
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="sekolah3" class="block text-sm font-medium text-gray-700">Pilihan Sekolah 3</label>
                            <select name="sekolah3" id="sekolah3" class="mt-1 block w-full">
                                <option value="">-- Pilih Sekolah --</option>
                                <!-- Tambahin opsi sekolah di sini, sementara kosong ygy -->
                            </select>
                        </div>

                        <!-- Form Orang Tua -->
                        <h3 class="font-semibold text-lg mb-4 mt-6">Data Orang Tua Calon Peserta Didik</h3>
                        
                        <div class="mb-4">
                            <label for="no_kk" class="block text-sm font-medium text-gray-700">No KK</label>
                            <input type="number" name="no_kk" id="no_kk" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="nama_ayah" class="block text-sm font-medium text-gray-700">Nama Ayah</label>
                            <input type="text" name="nama_ayah" id="nama_ayah" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="nama_ibu" class="block text-sm font-medium text-gray-700">Nama Ibu</label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="pekerjaan_ayah" class="block text-sm font-medium text-gray-700">Pekerjaan Ayah</label>
                            <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="pekerjaan_ibu" class="block text-sm font-medium text-gray-700">Pekerjaan Ibu</label>
                            <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="penghasilan_ayah" class="block text-sm font-medium text-gray-700">Penghasilan Ayah</label>
                            <input type="number" name="penghasilan_ayah" id="penghasilan_ayah" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="penghasilan_ibu" class="block text-sm font-medium text-gray-700">Penghasilan Ibu</label>
                            <input type="number" name="penghasilan_ibu" id="penghasilan_ibu" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="no_hp_ayah" class="block text-sm font-medium text-gray-700">No HP Ayah</label>
                            <input type="text" name="no_hp_ayah" id="no_hp_ayah" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="no_hp_ibu" class="block text-sm font-medium text-gray-700">No HP Ibu</label>
                            <input type="text" name="no_hp_ibu" id="no_hp_ibu" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="alamat_ayah" class="block text-sm font-medium text-gray-700">Alamat Ayah</label>
                            <textarea name="alamat_ayah" id="alamat_ayah" class="mt-1 block w-full" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="alamat_ibu" class="block text-sm font-medium text-gray-700">Alamat Ibu</label>
                            <textarea name="alamat_ibu" id="alamat_ibu" class="mt-1 block w-full" required></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" style="background-color: #000000; color: white;">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
