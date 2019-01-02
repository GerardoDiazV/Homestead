<?php

use Faker\Generator as Faker;

$factory->define(App\ActividadASP_Organizacion::class, function (Faker $faker) {
    return [
        'actividadasp_id' => rand(1,App\ActividadASP::count()),
        'organizacion_id' => rand(1,App\Organizacion::count()),//
    ];
});
