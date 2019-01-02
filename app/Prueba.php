<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $table = 'prueba';
    protected $fillable = ['nombre','rut'];
}
