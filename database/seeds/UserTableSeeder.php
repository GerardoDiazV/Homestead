<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        $role_secretaria = Role::where('name', 'secretaria')->first();
        $role_encargado = Role::where('name', 'encargado')->first();

        $user = new User();
        $user->name = 'Academico';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Secretaria';
        $user->email = 'secretaria@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_secretaria);

        $user = new User();
        $user->name = 'EncargadoVinculacion';
        $user->email = 'evinculacion@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_encargado);
    }
}
