<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutores';
    protected $dates = ['created_at', 'updated_at'];
}
