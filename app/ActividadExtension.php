<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadExtension extends Model
{
    protected $fillable = [
        'nombre', 'localizacion',"fecha", "cant_asistentes", "evidencia"
        , "convenio_id"
    ]; //

    public function convenio(){
        return $this->belongsTo('App\Convenio');
    }
    ////
}
