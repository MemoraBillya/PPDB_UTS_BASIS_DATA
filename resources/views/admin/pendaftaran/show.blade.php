@extends('admin.layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Detail Pendaftar</h2>

    <!-- Data Siswa -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Data Siswa
        </div>
        <div class="card-body">
            <p><strong>NISN: </strong>{{ $pendaftaran->siswa->nisn_siswa }}</p>
            <p><strong>Nama: </strong>{{ $pendaftaran->siswa->nama_siswa }}</p>
            <p><strong>Tanggal Lahir: </strong>{{ $pendaftaran->siswa->tanggal_lahir }}</p>
            <p><strong>Jenis Kelamin: </strong>{{ $pendaftaran->siswa->jenis_kelamin }}</p>
            <p><strong>Alamat: </strong>{{ $pendaftaran->siswa->alamat }}</p>
            <p><strong>Email: </strong>{{ $pendaftaran->siswa->email }}</p>
            <p><strong>No. HP Siswa: </strong>{{ $pendaftaran->siswa->no_hp_siswa }}</p>
            <p><strong>NIK: </strong>{{ $pendaftaran->siswa->nik }}</p>
            <p><strong>Nilai Rapor: </strong>{{ $pendaftaran->siswa->nilai_rapor }}</p>
        </div>
    </div>

    <!-- Data Sekolah Pilihan -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            Data Sekolah Pilihan
        </div>
        <div class="card-body">
            <p><strong>Pilihan Sekolah 1: </strong>{{ optional($pendaftaran->siswa->sekolahPilihan1)->nama_sekolah ?? 'Tidak ditemukan' }}</p>
            <p><strong>Jarak ke Sekolah 1: </strong>{{ $pendaftaran->siswa->jarak_sekolah_1 }} m</p>
            <p><strong>Pilihan Sekolah 2: </strong>{{ optional($pendaftaran->siswa->sekolahPilihan2)->nama_sekolah ?? 'Tidak ditemukan' }}</p>
            <p><strong>Jarak ke Sekolah 2: </strong>{{ $pendaftaran->siswa->jarak_sekolah_2 }} m</p>
            <p><strong>Pilihan Sekolah 3: </strong>{{ optional($pendaftaran->siswa->sekolahPilihan3)->nama_sekolah ?? 'Tidak ditemukan' }}</p>
            <p><strong>Jarak ke Sekolah 3: </strong>{{ $pendaftaran->siswa->jarak_sekolah_3 }} m</p>
        </div>
    </div>

    <!-- Data Orang Tua -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Data Orang Tua
        </div>
        <div class="card-body">
            <p><strong>No KK: </strong>{{ $pendaftaran->siswa->orangTua->no_kk ?? 'Tidak tersedia' }}</p>
            <p><strong>Nama Ayah: </strong>{{ $pendaftaran->siswa->orangTua->nama_ayah ?? 'Tidak tersedia' }}</p>
            <p><strong>Pekerjaan Ayah: </strong>{{ $pendaftaran->siswa->orangTua->pekerjaan_ayah ?? 'Tidak tersedia' }}</p>
            <p><strong>Penghasilan Ayah: </strong>{{ $pendaftaran->siswa->orangTua->penghasilan_ayah ?? 'Tidak tersedia' }}</p>
            <p><strong>No. HP Ayah: </strong>{{ $pendaftaran->siswa->orangTua->no_hp_ayah ?? 'Tidak tersedia' }}</p>
            <p><strong>Nama Ibu: </strong>{{ $pendaftaran->siswa->orangTua->nama_ibu ?? 'Tidak tersedia' }}</p>
            <p><strong>Pekerjaan Ibu: </strong>{{ $pendaftaran->siswa->orangTua->pekerjaan_ibu ?? 'Tidak tersedia' }}</p>
            <p><strong>Penghasilan Ibu: </strong>{{ $pendaftaran->siswa->orangTua->penghasilan_ibu ?? 'Tidak tersedia' }}</p>
            <p><strong>No. HP Ibu: </strong>{{ $pendaftaran->siswa->orangTua->no_hp_ibu ?? 'Tidak tersedia' }}</p>
            <p><strong>Alamat Ayah: </strong>{{ $pendaftaran->siswa->orangTua->alamat_ayah ?? 'Tidak tersedia' }}</p>
            <p><strong>Alamat Ibu: </strong>{{ $pendaftaran->siswa->orangTua->alamat_ibu ?? 'Tidak tersedia' }}</p>
        </div>
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center">
        <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-secondary">Kembali ke Daftar Pendaftar</a>
    </div>
</div>
@endsection
