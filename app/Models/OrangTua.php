<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    protected $table = 'orang_tua';
    const CREATED_AT = null;
    const UPDATED_AT = null;

    protected $fillable = [
        'user_id', 'no_kk', 'nisn_siswa', 'nama_ayah', 'nama_ibu', 'pekerjaan_ayah', 'pekerjaan_ibu', 
        'penghasilan_ayah', 'penghasilan_ibu', 'no_hp_ayah', 'no_hp_ibu', 'alamat_ayah', 'alamat_ibu'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn_siswa', 'nisn_siswa');
    }
}
