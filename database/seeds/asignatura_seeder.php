<?php

use Illuminate\Database\Seeder;

class asignatura_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(\App\Convenio::class, 15)->create();

        App\asignatura::create([
           'nombre_asign'=>'Programación',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Estructura de Datos',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Bases de datos',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Programación avanzada',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Ingenería de Software I',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Ingeniería de Software II',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Sistemas de Información I',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Sistemas de Información II',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Inteligencia Artificial',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Compiladores',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Análisis de Señales',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Lenguaje de Programación',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Análisis de Algoritmos',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Diseño de Sistemas Digitales',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Arquitectura de Computadores',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Circuitos Electrónicos',
        ]);

        App\asignatura::create([
            'nombre_asign'=>'Laboratorio de Computadores',
        ]);
    }
}
