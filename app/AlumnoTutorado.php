<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoTutorado extends Model
{
    protected $table = 'alumno_tutorado';
    protected $dates = ['created_at', 'updated_at'];
}
