<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPengisian extends Model
{
    protected $table = 'jadwal_pengisians';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'id_jadwal',
        'tanggal_dimulai',
        'tanggal_selesai',
        'tahun_kelulusan',
        'id_user'
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->getDateFormat());
    }
    
    public function dibuatOleh() {
        return $this->hasOne('App\User', 'id_user','id_user');
    }

    public function getDataPengisian(){
        return $this->hasMany('App\Pengisian', 'id_jadwal', 'id_jadwal');
    }
}
