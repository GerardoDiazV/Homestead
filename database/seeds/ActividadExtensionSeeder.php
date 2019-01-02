<?php

use Illuminate\Database\Seeder;

class ActividadExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ActividadExtension::class, 10)->create();
        //
    }
}
