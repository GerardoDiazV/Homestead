<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadExtensionOrador extends Model
{
    protected $fillable = [
        'actividad_extension_id', 'orador'
    ]; //
    //
    public function actividad(){
        return $this->belongsTo('App\ActividadExtension');
    }

}
