@extends('admin.layouts.layout')    

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Sekolah</h2>
    
    <!-- Tabel Daftar Sekolah -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID Sekolah</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>Kuota Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sekolah as $item)
            <tr>
                <td>{{ $item->id_sekolah }}</td>
                <td>{{ $item->nama_sekolah }}</td>
                <td>{{ $item->alamat_sekolah }}</td>
                <td>{{ $item->kuota_siswa }}</td>
                <td>
                    <a href="{{ route('admin.zonasi.show', $item->id_sekolah) }}" class="btn btn-info">Lihat Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {{ $sekolah->links() }}
</div>
@endsection
