<?php

use Illuminate\Database\Seeder;

class ActividadASPOrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ActividadASP_Organizacion::class, 5)->create();//
    }
}
