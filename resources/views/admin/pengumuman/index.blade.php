@extends('admin.layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Pengumuman Zonasi</h2>
    
    <!-- Button to trigger Zonasi process -->
    <form action="{{ route('admin.zonasi.process') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary mb-4">Lakukan Zonasi</button>
    </form>
    
    <!-- Tabel Pengumuman -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID Pengumuman</th>
                <th>ID Pendaftaran</th>
                <th>Nama Siswa</th>
                <th>ID Sekolah</th>
                <th>Nama Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengumuman as $item)
            <tr>
                <td>{{ $item->id_pengumuman }}</td>
                <td>{{ $item->id_pendaftaran }}</td>
                <td>{{ $item->siswa->nama_siswa }}</td> <!-- Nama Siswa -->
                <td>{{ $item->id_sekolah }}</td>
                <td>{{ $item->sekolah->nama_sekolah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.zonasi.index') }}" class="btn btn-primary mt-3">Kembali ke Zonasi</a>
</div>
@endsection
