<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaans';
    protected $fillable = [
        'id_pertanyaan',
        'pertanyaan'
    ];


    public function getJawabans(){
        return $this->hasMany('App\Jawaban', 'id_pertanyaan', 'id_pertanyaan');
    }
}
