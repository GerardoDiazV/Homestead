<?php

use Illuminate\Database\Seeder;

class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Convenio::class, 15)->create();
    }
}
