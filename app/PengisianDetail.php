<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengisianDetail extends Model
{
    protected $table = 'pengisian_details';
    protected $primaryKey = 'id_pengisian_detail';
    protected $fillable = [
        'id_pengisian',
        'id_pertanyaan',
        'id_jawaban',
        'additional'
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->getDateFormat());
    }

    public function getPertanyaan(){
        return $this->hasOne('App\Pertanyaan','id_pertanyaan','id_pertanyaan');
    }

    public function getAnswer(){
        return $this->hasOne('App\Jawaban', 'id_jawaban','id_jawaban');
    }
}
