<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'administradores';
    protected $fillable = [
        'perfil_slug'
    ];
    protected $dates = ['created_at', 'updated_at'];
    

}