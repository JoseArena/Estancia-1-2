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
}
