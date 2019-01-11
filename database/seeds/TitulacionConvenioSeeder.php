<?php

use Illuminate\Database\Seeder;

class TitulacionConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\TitulacionConvenio::class, 10)->create();//
    }
}
