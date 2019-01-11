<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TituladoDISC extends Model
{

    protected $fillable = [
        'nombre', 'rut', 'telefono', 'email', 'empresa','titulacion_year','carrera'
    ]; // //
}
