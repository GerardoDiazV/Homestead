<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadASP extends Model
{

    protected $fillable = [
        'nombre', 'asignatura', "profesor", "cant_estudiantes", "periodo","socio_comunitario","evidencia"
    ]; //
    //
    protected function actividadesASPOrganizacion(){
        $this->hasMany('App\ActividadASP_Organizacion');
    }
}
