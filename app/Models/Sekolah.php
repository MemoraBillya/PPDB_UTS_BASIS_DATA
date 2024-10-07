<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan konvensi
    protected $table = 'sekolah';

    // Jika menggunakan timestamps, tentukan jika tidak
    public $timestamps = false;

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'nama_sekolah',
        'alamat_sekolah',
        'kuota_siswa',
    ];
}
