<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'id_pengumuman';

    protected $fillable = [
        'id_pendaftaran', 
        'id_sekolah', 
        'tanggal_pengumuman'
    ];

    public $timestamps = false; // Disable timestamps

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah', 'id_sekolah');
    }

    public function siswa()
    {
        return $this->hasOneThrough(Siswa::class, Pendaftaran::class, 'id_pendaftaran', 'nisn_siswa', 'id_pendaftaran', 'nisn_siswa');
    }

}
