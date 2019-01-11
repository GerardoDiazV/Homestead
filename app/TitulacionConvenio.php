<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitulacionConvenio extends Model
{
    protected $fillable = [
        'nombre', 'fecha_inicio', 'fecha_termino', 'evidencia', 'convenio_id'
    ]; //
}
