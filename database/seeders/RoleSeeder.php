<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$super = Role::create(['name' => 'Super administrador']);
        $admin = Role::create(['name' => 'Administrador']);

        Permission::create(['name' => 'Modulo usuarios'])->syncRoles([$super, $admin]);
        Permission::create(['name' => 'Crear usuario'])->syncRoles([$super]);
        Permission::create(['name' => 'Editar usuario usuario'])->syncRoles([$super]);
        Permission::create(['name' => 'Eliminar usuario'])->syncRoles([$super]);
        */

    }
}
