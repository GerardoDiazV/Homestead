<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $fillable = [
        'nombre', 'year_inicio','year_termino','descripcion','formula','tipo_evidencia'
    ]; //


    public function progresos(){
        return $this->hasMany('App\Progreso');
    }

    public function metas(){
        return $this->hasMany('App\Meta');
    }
    //
}
