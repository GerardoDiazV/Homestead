<?php

use Faker\Generator as Faker;

$factory->define(App\Organizacion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'email' => $faker->unique()->companyEmail,
    ];
});
