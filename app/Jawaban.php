<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawabans';
    protected $primaryKey = 'id_jawaban';
    protected $fillable = [
        'id_pertanyaan',
        'jawaban'
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->getDateFormat());
    }

    
}
