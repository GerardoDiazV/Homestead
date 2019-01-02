<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $fillable = [
        'nombre', 'email',
    ]; //

    public function convenios(){
        return $this->hasMany('App\Convenio');
    }
}
