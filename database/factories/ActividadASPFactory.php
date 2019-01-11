<?php

use Faker\Generator as Faker;

$factory->define(App\ActividadASP::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(3),
        'asignatura' => $faker->sentence(2),
        'profesor'=>$faker->name,
        'periodo' => $faker->sentence(2),
        'cant_estudiantes' => rand(1,50),
        'evidencia' => $faker->imageUrl(),
        //
    ];
});
