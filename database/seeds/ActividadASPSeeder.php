<?php

use Illuminate\Database\Seeder;

class ActividadASPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ActividadASP::class, 15)->create();//
    }
}
