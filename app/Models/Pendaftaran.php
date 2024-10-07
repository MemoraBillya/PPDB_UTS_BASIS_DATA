<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_pendaftaran';

    // Gunakan 'tanggal_pendaftaran' sebagai created_at, dan matikan updated_at
    const CREATED_AT = 'tanggal_pendaftaran';
    const UPDATED_AT = null;

    protected $fillable = [
        'nisn_siswa', 'id_sekolah', 'tanggal_pendaftaran', 'status_pendaftaran', 'username', 'password'
    ];
    

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn_siswa', 'nisn_siswa');
    }

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'id_sekolah', 'id_sekolah');
    }
}
