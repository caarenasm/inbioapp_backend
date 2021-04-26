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
        $roleAdmin = Role::create(['name' => 'Administrador']);
        $roleEditor = Role::create(['name' => 'Editor']);
        $roleCliente = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'admin'])->assignRole($roleAdmin);
        Permission::create(['name' => 'editor'])->assignRole($roleEditor);
        Permission::create(['name' => 'cliente'])->assignRole($roleCliente);
    }
}
