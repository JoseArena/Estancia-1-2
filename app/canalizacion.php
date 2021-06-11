<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class canalizacion extends Model

{
    protected $table = 'canalizacion';
    protected $dates = ['created_at', 'updated_at'];
    public function nombreCompleto($id)
    {
        $canalizacion = canalizacion::find($id);
        $fullName = ' ' . $canalizacion->nombre . ' ' . $canalizacion->apellidoP. ' ' . $canalizacion->apellidoM ;
        return $fullName;
    }
}
