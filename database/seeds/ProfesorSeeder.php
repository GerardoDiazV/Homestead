<?php

use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Profesor::create([
            'nombre_profesor'=>'Vianca Vega'
        ]);

        App\Profesor::create([
            'nombre_profesor'=>'Luis Lobos'
        ]);

        App\Profesor::create([
            'nombre_profesor'=>'Ricardo Pérez'
        ]);

        App\Profesor::create([
            'nombre_profesor'=>'José Gallardo'
        ]);

        App\Profesor::create([
            'nombre_profesor'=>'Manuel Olivares'
        ]);

        App\Profesor::create([
            'nombre_profesor'=>'Aldo Quelopana'
        ]);

        App\Profesor::create([
            'nombre_profesor'=>'Victor Flores'
        ]);

        App\Profesor::create([
            'nombre_profesor'=>'Cristian Kong'
        ]);


        App\Profesor::create([
            'nombre_profesor'=>'Brian Keith'
        ]);
    }
}
