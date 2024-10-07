<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class ZonasiController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::with(['sekolah', 'siswa'])->get(); // Eager load relationships
        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    public function processZonasi()
    {
        // Get all schools and their capacities
        $sekolah = Sekolah::all();
        
        // Initialize an array to hold accepted students
        $acceptedStudents = []; // Key: id_pendaftaran, Value: id_sekolah
        
        // Iterate through each school
        foreach ($sekolah as $sekolahItem) {
            // Get all students who chose this school in any position, excluding those who are already accepted
            $siswa = Siswa::where(function($query) use ($sekolahItem) {
                            $query->where('pilihan_sekolah_1', $sekolahItem->id_sekolah)
                                ->orWhere('pilihan_sekolah_2', $sekolahItem->id_sekolah)
                                ->orWhere('pilihan_sekolah_3', $sekolahItem->id_sekolah);
                        })
                        ->whereHas('pendaftaran', function($query) use ($acceptedStudents) {
                            // Only include students with status 'valid'
                            $query->where('status_pendaftaran', 'valid');
                            // Exclude students already accepted in another school
                            if (!empty($acceptedStudents)) {
                                $query->whereNotIn('id_pendaftaran', array_keys($acceptedStudents));
                            }
                        })
                        ->get();

            // Prioritize students based on their choices and distance
            $siswaPrioritas = $siswa->sortBy(function($item) use ($sekolahItem) {
                if ($item->pilihan_sekolah_1 == $sekolahItem->id_sekolah) {
                    return [1, $item->jarak_sekolah_1];
                } elseif ($item->pilihan_sekolah_2 == $sekolahItem->id_sekolah) {
                    return [2, $item->jarak_sekolah_2];
                } else {
                    return [3, $item->jarak_sekolah_3];
                }
            });

            // Filter students into two groups based on distance
            $siswaRadius = $siswaPrioritas->filter(function($item) use ($sekolahItem) {
                return $item->jarak_sekolah_1 <= 300 || $item->jarak_sekolah_2 <= 300 || $item->jarak_sekolah_3 <= 300;
            })->sortBy('jarak'); // 30% closest

            $siswaSebaran = $siswaPrioritas->filter(function($item) use ($sekolahItem) {
                return $item->jarak_sekolah_1 > 300 || $item->jarak_sekolah_2 > 300 || $item->jarak_sekolah_3 > 300;
            })->sortBy('jarak'); // 20% for remaining

            // Calculate the quota based on the school's capacity
            $quotaRadius = round($sekolahItem->kuota_siswa * 0.30); // 30% closest
            $quotaSebaran = round($sekolahItem->kuota_siswa * 0.20); // 20% farther

            // Assign students based on the quota
            $this->assignStudents($siswaRadius->take($quotaRadius), $sekolahItem->id_sekolah, $acceptedStudents);
            $this->assignStudents($siswaSebaran->take($quotaSebaran), $sekolahItem->id_sekolah, $acceptedStudents);
        }

        return redirect()->route('admin.pengumuman.index');
    }

    private function assignStudents($siswa, $id_sekolah, &$acceptedStudents)
    {
        foreach ($siswa as $student) {
            // Retrieve the corresponding pendaftaran record
            $pendaftaran = $student->pendaftaran;

            // Ensure that pendaftaran exists and has a valid id_pendaftaran
            if ($pendaftaran && $pendaftaran->id_pendaftaran) {
                // Check if the student has already been accepted in another school
                if (!isset($acceptedStudents[$pendaftaran->id_pendaftaran])) {
                    // Insert into the pengumuman table
                    Pengumuman::create([
                        'id_pendaftaran' => $pendaftaran->id_pendaftaran,
                        'id_sekolah' => $id_sekolah,
                    ]);

                    // Mark this student as accepted
                    $acceptedStudents[$pendaftaran->id_pendaftaran] = $id_sekolah;
                }
            }
        }
    }

}
