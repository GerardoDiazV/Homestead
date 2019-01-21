<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{

    protected $fillable = [
        'nombre', 'year','valor_meta','indicador_id'
    ];
    //
}
