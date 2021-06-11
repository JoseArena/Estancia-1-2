<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class informes extends Model
{
    protected $table = 'informes';
    protected $dates = ['created_at', 'updated_at'];

    public function apellidos($id)
    {
        $informe = informes::find($id);
        $apellido = '' . $informe->apellidoP . ' ' . $informe->apellidoM;
        return $apellido;
    }

    public function nombreCompleto($id)
    {
        $Informe = informes::find($id);
        $fullName = ' ' . $Informe->nombre . ' ' . $Informe->apellidoP. ' ' . $Informe->apellidoM ;
        return $fullName;
    }
}
