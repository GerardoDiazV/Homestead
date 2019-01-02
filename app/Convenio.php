<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{

    protected $fillable = [
        'fecha_inicio', 'fecha_termino', "tipo_convenio", "evidencia", "organizacion_id"
    ]; //

    public function organizacion(){
        return $this->belongsTo('App\Organizacion');
    }

    public function actividadesExtension(){
        return $this->hasMany('App\ActividadExtension');
    }
    //
}
