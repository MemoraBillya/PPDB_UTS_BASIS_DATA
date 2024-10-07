<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Pendaftaran; // Import model Pendaftaran
use Illuminate\Http\Request;

class AdminZonaController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::paginate(10); // Menampilkan daftar sekolah
        return view('admin.zonasi.index', compact('sekolah'));
    }

    public function show($id_sekolah)
    {
        // Ambil data siswa yang mendaftar ke sekolah ini dan memiliki pendaftaran "valid"
        $siswa = Siswa::whereHas('pendaftaran', function($query) {
                        $query->where('status_pendaftaran', 'valid');
                    })
                    ->where(function ($query) use ($id_sekolah) {
                        $query->where('pilihan_sekolah_1', $id_sekolah)
                              ->orWhere('pilihan_sekolah_2', $id_sekolah)
                              ->orWhere('pilihan_sekolah_3', $id_sekolah);
                    })
                    ->get();

        // Tentukan jarak yang relevan untuk sekolah yang dipilih
        foreach ($siswa as $item) {
            if ($item->pilihan_sekolah_1 == $id_sekolah) {
                $item->jarak = $item->jarak_sekolah_1;
            } elseif ($item->pilihan_sekolah_2 == $id_sekolah) {
                $item->jarak = $item->jarak_sekolah_2;
            } else {
                $item->jarak = $item->jarak_sekolah_3;
            }
        }

        // Urutkan berdasarkan jarak terkecil
        $siswa = $siswa->sortBy('jarak');

        return view('admin.zonasi.show', compact('siswa'));
    }
}

