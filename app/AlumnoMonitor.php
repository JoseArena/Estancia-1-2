<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoMonitor extends Model
{
    protected $table = 'alumno_monitor';
    protected $dates = ['created_at', 'updated_at'];
}

