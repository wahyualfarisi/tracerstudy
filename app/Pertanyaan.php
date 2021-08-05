<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaans';
    protected $primaryKey = 'id_pertanyaan';
    protected $fillable = [
        'id_pertanyaan',
        'pertanyaan'
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format($this->getDateFormat());
    }

    public function getJawabans(){
        return $this->hasMany('App\Jawaban', 'id_pertanyaan', 'id_pertanyaan');
    }
}
