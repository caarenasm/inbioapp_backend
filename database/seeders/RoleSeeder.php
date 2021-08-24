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
        $roleNutricion = Role::create(['name' => 'Coach Nutrición']);
        $roleHuertas = Role::create(['name' => 'Coach Huertas']);

        Permission::create(['name' => 'admin'])->assignRole($roleAdmin);
        Permission::create(['name' => 'editor'])->assignRole($roleEditor);
        Permission::create(['name' => 'cliente'])->assignRole($roleCliente);
        Permission::create(['name' => 'coach_nutricion'])->assignRole($roleNutricion);
        Permission::create(['name' => 'coach_huertas'])->assignRole($roleHuertas);
    }
}
