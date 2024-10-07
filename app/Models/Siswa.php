<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nisn_siswa';
    public $incrementing = false; // Since NISN is not auto-incrementing
    public $timestamps = false; // Nonaktifkan pengaturan timestamps

    protected $fillable = [
        'nisn_siswa', 'nama_siswa', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 
        'nilai_rapor', 'nik', 'email', 'no_hp_siswa', 'user_id',
        'pilihan_sekolah_1', 'pilihan_sekolah_2', 'pilihan_sekolah_3'
    ];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'nisn_siswa', 'nisn_siswa');
    }

    public function orangTua()
    {
        return $this->hasOne(OrangTua::class, 'nisn_siswa', 'nisn_siswa');
    }
    public function sekolahPilihan1()
    {
        return $this->belongsTo(Sekolah::class, 'pilihan_sekolah_1', 'id_sekolah');
    }

    public function sekolahPilihan2()
    {
        return $this->belongsTo(Sekolah::class, 'pilihan_sekolah_2', 'id_sekolah');
    }

    public function sekolahPilihan3()
    {
        return $this->belongsTo(Sekolah::class, 'pilihan_sekolah_3', 'id_sekolah');
    }
}

