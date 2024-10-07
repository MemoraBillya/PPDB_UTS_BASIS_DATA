<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran; // Pastikan Anda memanggil model yang tepat

class AdminPendaftaranController extends Controller
{
    public function index()
{  
    // Mengambil data dari model Pendaftaran dengan relasi siswa dan sekolah
    $pendaftaran = Pendaftaran::with(['siswa.sekolahPilihan1', 'siswa.sekolahPilihan2', 'siswa.sekolahPilihan3'])->paginate(10);
    return view('admin.pendaftaran.index', compact('pendaftaran'));
}
    public function show($id)
    {
    // Ambil data pendaftaran, siswa, orang tua, dan sekolah pilihan
    $pendaftaran = Pendaftaran::with([
        'siswa', 
        'siswa.orangTua', 
        'siswa.sekolahPilihan1', 
        'siswa.sekolahPilihan2', 
        'siswa.sekolahPilihan3'
    ])->findOrFail($id);

    // Kirim data ke view
    return view('admin.pendaftaran.show', compact('pendaftaran'));
    }


    public function update(Request $request, $id)
    {
        // Mengambil data pendaftaran berdasarkan ID dan mengupdate status pendaftaran
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status_pendaftaran = $request->input('status_pendaftaran');
        $pendaftaran->save();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Status pendaftaran berhasil diupdate');
    }
}
