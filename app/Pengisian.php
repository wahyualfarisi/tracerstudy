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

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->getDateFormat());
    }

    public function getPengisianDetails(){
        return $this->hasMany('App\PengisianDetail','id_pengisian','id_pengisian');
    }

    public function getJadwal(){
        return $this->hasOne('App\JadwalPengisian', 'id_jadwal','id_jadwal');
    }

    public function getMahasiswa(){
        return $this->hasOne('App\Mahasiswa', 'id_mahasiswa','id_mahasiswa');
    }
}
