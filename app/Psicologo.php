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
}