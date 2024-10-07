@extends('admin.layouts.layout') <!-- Menggunakan layout yang sama dengan zonasi -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Data Pendaftar</h2>
    
    <!-- Tabel Data Pendaftar -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID Pendaftar</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Sekolah Pilihan 1</th>
                <th>Sekolah Pilihan 2</th>
                <th>Sekolah Pilihan 3</th>
                <th>Status Pendaftaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaran as $item)
            <tr>
                <td>{{ $item->id_pendaftaran }}</td>
                <td>{{ $item->siswa->nisn_siswa }}</td>
                <td>{{ $item->siswa->nama_siswa }}</td>
                <td>{{ $item->siswa->alamat }}</td>
                <td>{{ optional($item->siswa->sekolahPilihan1)->nama_sekolah ?? 'Tidak ditemukan' }}</td>
                <td>{{ optional($item->siswa->sekolahPilihan2)->nama_sekolah ?? 'Tidak ditemukan' }}</td>
                <td>{{ optional($item->siswa->sekolahPilihan3)->nama_sekolah ?? 'Tidak ditemukan' }}</td>
                <td>{{ $item->status_pendaftaran }}</td>
                <td>
                    <!-- Tombol Show -->
                    <a href="{{ route('admin.pendaftaran.show', $item->id_pendaftaran) }}" class="btn btn-info">
                        <i class="fa-solid fa-eye" color="white"></i>Show
                    </a>

                    <!-- Tombol Valid -->
                    <form action="{{ route('admin.pendaftaran.update', $item->id_pendaftaran) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status_pendaftaran" value="valid">
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-circle-check" color="white"></i>Valid
                        </button>
                    </form>

                    <!-- Tombol Invalid -->
                    <form action="{{ route('admin.pendaftaran.update', $item->id_pendaftaran) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status_pendaftaran" value="invalid">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-circle-xmark" color="white"></i>Invalid
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
    .table-custom {
        width: 100% !important;
        margin-bottom: 20px !important;
        border-collapse: collapse !important;
    }

    .table-custom th, .table-custom td {
        padding: 12px 15px !important;
        border: 1px solid #ddd !important;
        text-align: center !important;
        vertical-align: middle !important;
    }

    .thead-dark th {
        background-color: #343a40 !important;
        color: white !important;
    }

    .table-custom tbody tr:hover {
        background-color: #f1f1f1 !important;
    }

    .btn {
        padding: 5px 10px !important;
        font-size: 14px !important;
    }
    .btn i {
        margin-right: 5px; 
    }

    .btn-sm {
        font-size: 12px !important;
        padding: 4px 8px !important;
    }

    td:nth-child(8) {
        font-weight: bold !important;
    }
</style>