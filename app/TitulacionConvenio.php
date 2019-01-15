<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TitulacionConvenio extends Model
{
    protected $fillable = [
        'nombre', 'fecha_inicio', 'fecha_termino', 'evidencia', 'convenio_id'
    ]; //

    public function profesores(){
        return $this->hasMany('App\TitulacionConvenioProfesor');
    }

    public function estudiantes(){
        return $this->hasMany('App\TitulacionConvenioEstudiante');
    }
}
