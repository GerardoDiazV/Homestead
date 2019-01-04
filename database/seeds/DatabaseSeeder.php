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
        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);

        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);

        $this->call(ActividadASPSeeder::class);
        $this->call(ActividadExtensionSeeder::class);
        $this->call(OrganizacionSeeder::class);
        $this->call(ActividadASPOrganizacionSeeder::class);
        $this->call(ConvenioSeeder::class);

        $this->truncateTables([
            'convenios',
            'organizacions',
            'actividad_extensions',
            'actividad_a_s_ps',
            'actividad_a_s_p__organizacions',
            'users'
        ]);
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
