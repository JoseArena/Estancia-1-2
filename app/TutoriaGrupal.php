<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TutoriaGrupal extends Model
{
    protected $table = 'tutoria_grupal';
    protected $dates = ['created_at', 'updated_at', 'fecha'];
}
