<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutoriaIndividual extends Model
{
    protected $table = 'tutoria_individual';
    protected $dates = ['created_at', 'updated_at', 'fecha'];

    public function scopeBuscarPor($query,$fI,$fF){
        if( ($fI) && ($fF) ){
            return $query->whereBetween('fecha',[$fI,$fF]);
        }
    }
}
