<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoMonitor extends Model
{
    protected $table = 'alumno_monitor';
    protected $dates = ['created_at', 'updated_at'];

    public function scopeBuscarPor($query,$tipo,$buscar){
        if( ($tipo) && ($buscar) ){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }
}

