@extends('admin.layouts.layout') <!-- Menggunakan layout yang sama dengan zonasi -->

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Pendaftar</h2>
    
    <!-- Tabel Daftar Pendaftar -->
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
                    <a href="{{ route('admin.pendaftaran.show', $item->id_pendaftaran) }}" class="btn btn-info">Show</a>

                    <!-- Tombol Valid -->
                    <form action="{{ route('admin.pendaftaran.update', $item->id_pendaftaran) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status_pendaftaran" value="valid">
                        <button type="submit" class="btn btn-success">Valid</button>
                    </form>

                    <!-- Tombol Invalid -->
                    <form action="{{ route('admin.pendaftaran.update', $item->id_pendaftaran) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status_pendaftaran" value="invalid">
                        <button type="submit" class="btn btn-danger">Invalid</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
