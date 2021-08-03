<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id_mahasiswa';
    protected $hidden = [
        'password'
    ];
    
    protected $fillable = [
        'id_mahasiswa',
        'nim',
        'tahun_lulus',
        'kode_prodi',
        'nama_lengkap',
        'no_telepon',
        'email',
        'password',
        'alamat',
        'kode_pos',
        'photo',
        'tanggal_ujian_skripsi',
        'judul_skripsi',
        'dospem_1',
        'dospem_2',
        'ipk',
        'status'
    ];

    public function getPekerjaans(){
        return $this->hasMany('App\Pekerjaan', 'id_mahasiswa', 'id_mahasiswa');
    }

    
}
