<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\OrangTua;
use Illuminate\Support\Facades\Auth;
use App\Models\Sekolah;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\DB;


class ProcessController extends Controller
{
    public function prosedur()
    {
        return view('prosedur');
    }

    public function jadwal()
    {
        return view('jadwal'); 
    }

    public function pendaftaran(Request $request)
    {
        $siswa = Siswa::where('user_id', Auth::id())->first();

        if ($request->isMethod('post')) {
            $user = Auth::user();

            // Cek apakah siswa ditemukan sebelum melakukan query pendaftaran
            if ($siswa) {
                $pendaftaran = Pendaftaran::where('nisn_siswa', $siswa->nisn_siswa)->first();

                // Jika status invalid, lakukan update
                if ($pendaftaran && $pendaftaran->status_pendaftaran == 'invalid') {
                    // Validasi input
                    $request->validate([
                        'nisn_siswa' => 'required|unique:siswa,nisn_siswa,' . $siswa->nisn_siswa . ',nisn_siswa', // unique kecuali siswa yang sedang diupdate
                        'nama_siswa' => 'required',
                        'tanggal_lahir' => 'required|date',
                        'jenis_kelamin' => 'required',
                        'alamat' => 'required',
                        'nilai_rapor' => 'required|numeric',
                        'nik' => 'required|numeric',
                        'email' => 'nullable|email',
                        'no_hp_siswa' => 'nullable',
                        'sekolah1' => 'required',
                        'sekolah2' => 'nullable',
                        'sekolah3' => 'nullable',
                        'nama_ayah' => 'required',
                        'nama_ibu' => 'required',
                    ]);

                    // Menggunakan transaction agar update dilakukan secara atomic
                    DB::transaction(function() use ($request, $siswa, $user) {
                        // Update foreign key di tabel orang_tua terlebih dahulu
                        OrangTua::where('nisn_siswa', $siswa->nisn_siswa)
                                ->update(['nisn_siswa' => $request->nisn_siswa]);
                    
                        // Setelah foreign key di orang_tua di-update, baru update data siswa
                        $siswa->update(array_merge($request->only([
                            'nisn_siswa', 'nama_siswa', 'tanggal_lahir', 'jenis_kelamin', 
                            'alamat', 'nilai_rapor', 'nik', 'email', 'no_hp_siswa'
                        ]), [
                            'pilihan_sekolah_1' => $request->sekolah1,
                            'pilihan_sekolah_2' => $request->sekolah2,
                            'pilihan_sekolah_3' => $request->sekolah3
                        ]));

                        // Update data pendaftaran
                        Pendaftaran::where('nisn_siswa', $siswa->nisn_siswa)
                            ->update([
                                'id_sekolah' => $request->sekolah1,
                                'status_pendaftaran' => 'menunggu_validasi', // Set status kembali ke menunggu_validasi setelah update
                            ]);

                        // Update data orang tua
                        // Cek apakah data orang tua ditemukan sebelum update
                        $orangTua = OrangTua::where('user_id', $user->id)->where('no_kk', $request->no_kk)->first();
                        if ($orangTua) {
                            // Lanjutkan update jika data orang tua ditemukan
                            $orangTua->update([
                                'no_kk' => $request->no_kk,
                                'nama_ayah' => $request->nama_ayah,
                                'nama_ibu' => $request->nama_ibu,
                                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                                'penghasilan_ayah' => $request->penghasilan_ayah,
                                'penghasilan_ibu' => $request->penghasilan_ibu,
                                'no_hp_ayah' => $request->no_hp_ayah,
                                'no_hp_ibu' => $request->no_hp_ibu,
                                'alamat_ayah' => $request->alamat_ayah,
                                'alamat_ibu' => $request->alamat_ibu
                            ]);
                        } else {
                            // Logging untuk membantu identifikasi masalah
                            \Log::error("Data orang tua tidak ditemukan untuk user_id: {$user->id}");

                            // Beri respon error jika data orang tua tidak ditemukan
                            return redirect()->route('pendaftaran')->withErrors(['error' => 'Data orang tua tidak ditemukan.']);
                        }
                    });

                    return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil diperbarui!');
                    }
            } else {
                // Validasi input untuk create baru
            $request->validate([
                'nisn_siswa' => 'required|unique:siswa,nisn_siswa',
                'nama_siswa' => 'required',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'nilai_rapor' => 'required|numeric',
                'nik' => 'required|numeric',
                'email' => 'nullable|email',
                'no_hp_siswa' => 'nullable',
                'sekolah1' => 'required',
                'sekolah2' => 'nullable',
                'sekolah3' => 'nullable',
                'nama_ayah' => 'required',
                'nama_ibu' => 'required',
            ]);

            // Membuat data siswa baru
            $siswa = Siswa::create(array_merge($request->only([
                'nisn_siswa', 'nama_siswa', 'tanggal_lahir', 'jenis_kelamin', 
                'alamat', 'nilai_rapor', 'nik', 'email', 'no_hp_siswa'
            ]), [
                'user_id' => $user->id,
                'pilihan_sekolah_1' => $request->sekolah1,
                'pilihan_sekolah_2' => $request->sekolah2,
                'pilihan_sekolah_3' => $request->sekolah3
            ]));

            // Membuat data pendaftaran baru
            Pendaftaran::create([
                'nisn_siswa' => $siswa->nisn_siswa,
                'id_sekolah' => $request->sekolah1,
                'status_pendaftaran' => 'menunggu_validasi',
                'username' => $user->email,
                'password' => bcrypt($request->password)
            ]);

            // Membuat data orang tua baru
            OrangTua::create([
                'user_id' => $user->id,
                'nisn_siswa' => $siswa->nisn_siswa,
                'no_kk' => $request->no_kk,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'penghasilan_ayah' => $request->penghasilan_ayah,
                'penghasilan_ibu' => $request->penghasilan_ibu,
                'no_hp_ayah' => $request->no_hp_ayah,
                'no_hp_ibu' => $request->no_hp_ibu,
                'alamat_ayah' => $request->alamat_ayah,
                'alamat_ibu' => $request->alamat_ibu
            ]);

            // Redirect ke halaman pendaftaran dengan pesan sukses
            return redirect()->route('pendaftaran')->with('success', 'Pendaftaran berhasil!');

            }
        }

        if ($siswa) {
            // Mendapatkan status_pendaftaran berdasarkan nisn_siswa siswa yang ditemukan
            $pendaftaran = Pendaftaran::where('nisn_siswa', $siswa->nisn_siswa)->first();
            $statusPendaftaran = $pendaftaran ? $pendaftaran->status_pendaftaran : null; // Set ke null jika pendaftaran tidak ditemukan
        } else {    
            // Jika siswa tidak ditemukan, set statusPendaftaran ke null
            $statusPendaftaran = null;
        }
        $sekolahList = Sekolah::all();

        // Pass the status_pendaftaran to the view
        return view('pendaftaran', [
            'statusPendaftaran' => $statusPendaftaran,
            'sekolahList' => $sekolahList, // Kirim daftar sekolah
        ]);
    }

    

    public function penerimaan()
    {
        // Ambil user_id dari pengguna yang login
        $userId = Auth::user()->id ?? null;

        // Cek apakah user ID ada
        if (!$userId) {
            // Jika user ID tidak ditemukan, tampilkan pesan error atau lakukan redirect
            return redirect()->route('dashboard')->with('error', 'User ID tidak ditemukan. Silakan login kembali.');
        }

        // Dapatkan data siswa berdasarkan user_id
        $siswa = Siswa::where('user_id', $userId)->first();
        
        // Cek apakah siswa ditemukan
        if (!$siswa) {
            return redirect()->route('dashboard')->with('error', 'Data siswa tidak ditemukan. Pastikan Anda sudah mendaftar sebagai siswa.');
        }

        // Dapatkan data pendaftaran berdasarkan nisn_siswa
        $pendaftaran = Pendaftaran::where('nisn_siswa', $siswa->nisn_siswa)->first();
        
        // Cek apakah data pendaftaran ditemukan
        if (!$pendaftaran) {
            return redirect()->route('dashboard')->with('error', 'Data pendaftaran tidak ditemukan. Pastikan Anda sudah mendaftar.');
        }

        // Dapatkan id_pendaftaran dari pendaftaran yang ditemukan
        $idPendaftaran = $pendaftaran->id_pendaftaran;

        // Cek apakah tabel pengumuman memiliki entri
        $pengumumanCount = Pengumuman::count();

        if ($pengumumanCount == 0) {
            // Jika tidak ada pengumuman sama sekali
            $status = 'belum_dimulai';
            $message = "Seleksi Zonasi Belum Dimulai";
            $subtitle = "Harap Melihat Jadwal PPDB Zonasi";
        } elseif (Pengumuman::where('id_pendaftaran', $idPendaftaran)->exists()) {
            // Jika siswa diterima (id_pendaftaran ada di tabel pengumuman)
            $pengumuman = Pengumuman::with('sekolah')->where('id_pendaftaran', $idPendaftaran)->first();
            $status = 'diterima';
            $message = "Selamat, anda diterima di sekolah " . $pengumuman->sekolah->nama_sekolah . " lewat jalur PPDB Zonasi";
            $subtitle = "Silakan melakukan daftar ulang pada sekolah terkait";
        } else {
            // Jika siswa belum diterima (id_pendaftaran tidak ada di tabel pengumuman)
            $status = 'ditolak';
            $message = "Anda belum diterima lewat jalur PPDB Zonasi";
            $subtitle = "Jangan berkecil hati, tetap semangat! Coba kembali di tahap berikutnya.";
        }

        return view('penerimaan', compact('status', 'message', 'subtitle'));
    }
    
}
