<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Menghitung total siswa yang mendaftar
        $totalSiswa = Siswa::count();

        // Menghitung total sekolah terdaftar
        $totalSekolah = Sekolah::count();

        // Menghitung statistik pendaftaran berdasarkan status_pendaftaran
        $statistikPendaftaran = Pendaftaran::selectRaw('
            SUM(CASE WHEN status_pendaftaran = "menunggu_validasi" THEN 1 ELSE 0 END) as menunggu_validasi,
            SUM(CASE WHEN status_pendaftaran = "valid" THEN 1 ELSE 0 END) as valid,
            SUM(CASE WHEN status_pendaftaran = "invalid" THEN 1 ELSE 0 END) as invalid
        ')->first();

        // Menghitung rata-rata pilihan sekolah
        $rataRataPilihan = Siswa::selectRaw('
            AVG(CASE WHEN pilihan_sekolah_1 IS NOT NULL THEN 1 ELSE 0 END) as pilihan1,
            AVG(CASE WHEN pilihan_sekolah_2 IS NOT NULL THEN 1 ELSE 0 END) as pilihan2,
            AVG(CASE WHEN pilihan_sekolah_3 IS NOT NULL THEN 1 ELSE 0 END) as pilihan3
        ')->first();

        // Mengirim data ke view
        return view('admin.dashboard', [
            'totalSiswa' => $totalSiswa,
            'totalSekolah' => $totalSekolah,
            'statistikPendaftaran' => $statistikPendaftaran,
            'rataRataPilihan' => $rataRataPilihan,
        ]);
    }
}
