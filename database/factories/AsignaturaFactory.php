<?php

use Faker\Generator as Faker;

$factory->define(App\asignatura::class, function (Faker $faker) {
    return [
       // 'nombre_asign'=> $faker -> randomElement(['Programación','','Sistemas Operativos', 'Programación Avanzada','Estructura de Datos','Compiladores','Análisis de Algoritmos']),
    ];
});
