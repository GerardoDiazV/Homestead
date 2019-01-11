<?php

use Faker\Generator as Faker;

$factory->define(App\TitulacionConvenio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->sentence(1),
        'fecha_inicio' => $faker->dateTime(),
        'fecha_termino'=>$faker->dateTime(),
        'evidencia' => $faker->url,
        'convenio_id' => rand(1,App\Convenio::count()),
        //
    ];
});
