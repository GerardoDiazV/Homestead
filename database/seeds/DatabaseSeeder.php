<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'convenios',
            'organizacions',
            'actividad_extensions',
            'actividad_a_s_ps',
            'actividad_a_s_p__organizacions',
            'users'
        ]);

        $this->call(UserSeeder::class);
        $this->call(OrganizacionSeeder::class);
        $this->call(ConvenioSeeder::class);
        $this->call(ActividadExtensionSeeder::class);
        $this->call(ActividadASPSeeder::class);
        $this->call(ActividadASPOrganizacionSeeder::class);

    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
