<?php

use Faker\Generator as Faker;

$factory->define(App\RegistroTitulados::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'rut' => $faker->dateTime(),
        'telefono'=>$faker->phoneNumber,
        'email' => $faker->unique()->companyEmail,
        'empresa'=> $faker->company,
        'anio_titulacion' => $faker->dateTime(),
        'carrera' => $faker->dateTime(),
    ];
});
