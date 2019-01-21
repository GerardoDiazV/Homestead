<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progreso extends Model
{
    protected $fillable = [
        'nombre', 'year','valor_progreso','indicador_id'
    ];
    //
}
