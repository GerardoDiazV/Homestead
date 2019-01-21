<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadASP extends Model
{

    protected $fillable = [
        'asignatura', "profesor", "cant_estudiantes", "periodo",
    ]; //
    //
    public function organizaciones(){
        return $this->belongsToMany('App\Organizacion','actividad_a_s_p__organizacions','actividadasp_id','organizacion_id')->withPivot('actividadasp_id', 'organizacion_id','evidencia');;
    }

    public function profesores(){
        return $this->hasMany('App\ActividadASPProfesor','actividad_asp_id','id');
    }
}
