<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psicologo extends Model
{
    protected $table = 'psicologos';
    protected $fillable = [
        'perfil_slug'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function scopeBuscarPor($query,$tipo,$buscar){
        if( ($tipo) && ($buscar) ){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }

    public function nombreCompleto($id)
    {
        $psicologo = Psicologo::find($id);
        $fullName = ' ' . $psicologo->nombres . ' ' . $psicologo->apellidoP. ' ' . $psicologo->apellidoM ;
        return $fullName;
    }
}
