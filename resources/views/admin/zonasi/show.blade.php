@extends('admin.layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Detail Siswa Berdasarkan Sekolah</h2>
    
    <!-- Tabel Detail Siswa -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>NISN Siswa</th>
                <th>Nama Siswa</th>
                <th>Alamat Siswa</th>
                <th>Jarak ke Sekolah (m)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $item)
            <tr>
                <td>{{ $item->nisn_siswa }}</td>
                <td>{{ $item->nama_siswa }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->jarak }}</td> <!-- This now correctly references the jarak -->
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.zonasi.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar Sekolah</a>
</div>
@endsection
