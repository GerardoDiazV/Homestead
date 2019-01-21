<?php

use Faker\Generator as Faker;

$factory->define(App\ActividadASP::class, function (Faker $faker) {
    return [
        'asignatura' => $faker->sentence(2),
        'periodo' => $faker->sentence(2),
        'cant_estudiantes' => rand(1,50),
        //
    ];
});
