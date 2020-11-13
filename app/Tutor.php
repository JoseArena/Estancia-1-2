<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutores';
    protected $fillable = [
        'perfil_slug'
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function nombreCompleto($id)
    {
        $tutor = Tutor::find($id);
        $fullName = '' . $tutor->nombres . ' ' . $tutor->apellidoP . ' ' . $tutor->apellidoM;
        return $fullName;
    }

    public function scopeBuscarPor($query,$tipo,$buscar){
        if( ($tipo) && ($buscar) ){
            return $query->where($tipo, 'like', "%$buscar%");
        }
    }
}
