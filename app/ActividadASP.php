<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadASP extends Model
{

    protected $fillable = [
        'nombre', 'asignatura', "profesor", "cant_estudiantes", "periodo","evidencia"
    ]; //
    //
    public function actividadesASPOrganizacion(){
        return $this->belongsToMany('App\Organizacion','actividad_a_s_p__organizacions','actividadasp_id','organizacion_id');
    }
}
