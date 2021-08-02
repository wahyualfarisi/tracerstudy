<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
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

    
}
