<?php

use Faker\Generator as Faker;

$factory->define(App\Convenio::class, function (Faker $faker) {
    return [
        'tipo_convenio' => $faker->randomElement(['Capstone','Marco','Especifico','A+S']),
        'fecha_inicio' => $faker->dateTime(),
        'fecha_termino'=>$faker->dateTime(),
        'evidencia' => $faker->url,
        'organizacion_id' => rand(1,App\Organizacion::count()),
        //
    ];
});
