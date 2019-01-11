<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitulacionConvenioProfesor extends Model
{
    protected $fillable = [
        'titulacion_convenio_id', 'nombre_profesor'
    ]; //
}
