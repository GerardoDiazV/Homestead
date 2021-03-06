<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadExtensionFotografia extends Model
{
    protected $fillable = [
        'actividad_extension_id', 'fotografia'
    ]; //

    public function actividad(){
        return $this->belongsTo('App\ActividadExtension');
    }
}
