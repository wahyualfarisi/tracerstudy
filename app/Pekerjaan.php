<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaans';
    protected $fillable = [
        'id_data_pekerjaan',
        'id_mahasiswa',
        'nama_perusahaan',
        'pekerjaan',
        'jabatan',
        'tanggal_bekerja',
        'tanggal_selesai',
        'isCurrent'
    ];

    
}
