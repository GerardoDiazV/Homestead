<?php

use Illuminate\Database\Seeder;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(\App\Convenio::class, 15)->create();

        App\Asignatura::create([
           'nombre_asign'=>'Programación',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Estructura de Datos',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Bases de datos',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Programación avanzada',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Ingenería de Software I',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Ingeniería de Software II',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Sistemas de Información I',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Sistemas de Información II',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Inteligencia Artificial',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Compiladores',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Análisis de Señales',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Lenguaje de Programación',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Análisis de Algoritmos',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Diseño de Sistemas Digitales',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Arquitectura de Computadores',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Circuitos Electrónicos',
        ]);

        App\Asignatura::create([
            'nombre_asign'=>'Laboratorio de Computadores',
        ]);
    }
}
