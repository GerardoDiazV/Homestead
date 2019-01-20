<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $fillable = [
        'nombre', 'email'
    ]; //

    public function convenios(){
        return $this->belongsToMany('App\ActividadASP','actividad_a_s_p__organizacions','actividadasp_id','organizacion_id');
    }
}
