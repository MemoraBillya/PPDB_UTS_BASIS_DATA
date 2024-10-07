@extends('admin.layouts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Home Dashboard</h1>
    
    <!-- Statistik langsung (Live Count) -->
    <div class="row text-center mt-4">
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h3>Total Siswa yang Mendaftar</h3>
                    <h4>{{ $totalSiswa }}</h4> <!-- Menampilkan jumlah total siswa -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h3>Total Sekolah Terdaftar</h3>
                    <h4>{{ $totalSekolah }}</h4> <!-- Menampilkan jumlah total sekolah -->
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h3>Status Pendaftaran</h3>
                    <p>Menunggu Validasi: {{ $statistikPendaftaran->menunggu_validasi }}</p>
                    <p>Valid: {{ $statistikPendaftaran->valid }}</p>
                    <p>Invalid: {{ $statistikPendaftaran->invalid }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Analisis Statistik Deskriptif -->
    <div class="row text-center mt-5">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h3>Rata-rata Pilihan Sekolah</h3>
                    <p>Pilihan Sekolah 1: {{ number_format($rataRataPilihan->pilihan1 * 100, 2) }}%</p>
                    <p>Pilihan Sekolah 2: {{ number_format($rataRataPilihan->pilihan2 * 100, 2) }}%</p>
                    <p>Pilihan Sekolah 3: {{ number_format($rataRataPilihan->pilihan3 * 100, 2) }}%</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    h1{
        margin-bottom: 40px;
        margin top: 0px;
        font-size: 38px;
        font-weight: bold;
        color: black;
    }
    .card-custom {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 300px;
        width: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .card-custom:hover {
        transform: scale(1.05);
    }
    .bg-info {
        background-color: #17a2b8 !important;
        height: 200px;
    }
    .bg-success {
        background-color: #28a745 !important;
        height: 200px;
    }
    .bg-warning {
        background-color: #ffc107 !important;
        height: 200px;
    }
    .bg-light {
        background-color: #f8f9fa !important;
    }
    h3 {
        font-size: 22px;
        font-weight: bold;
    }
    h4 {
        font-size: 18px;
        font-weight: 500;
    }
    p {
        font-size: 16px;
        font-weight: bold;
    }
</style>