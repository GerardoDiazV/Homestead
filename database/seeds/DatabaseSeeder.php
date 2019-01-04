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
            'users',
            'roles',
            'role_user'
        ]);

        // La creación de datos de roles debe ejecutarse primero

        $this->call([
        RoleTableSeeder::class,
        UserTableSeeder::class,
        ActividadASPSeeder::class,
        ActividadExtensionSeeder::clas,
        OrganizacionSeeder::class,
        ActividadASPOrganizacionSeeder::class,
        ConvenioSeeder::class,
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
