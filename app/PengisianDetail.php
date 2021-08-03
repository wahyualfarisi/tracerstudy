<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengisianDetail extends Model
{
    protected $table = 'pengisian_details';
    protected $fillable = [
        'id_pengisian',
        'id_pertanyaan',
        'id_jawaban',
        'additional'
    ];
}
