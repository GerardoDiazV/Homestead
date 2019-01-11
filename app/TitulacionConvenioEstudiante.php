<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitulacionConvenioEstudiante extends Model
{
    protected $fillable = [
        'titulacion_convenio_id', 'nombre', 'rut', 'carrera'
    ]; //
}
