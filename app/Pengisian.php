<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengisian extends Model
{
    protected $table = 'pengisians';
    protected $primaryKey = 'id_pengisian';
    protected $fillable = [
        'id_jadwal',
        'id_mahasiswa',
        'status'
    ];
}
