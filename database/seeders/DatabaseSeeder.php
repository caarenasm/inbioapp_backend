<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TipoEnfermedadSeeder::class);
        $this->call(CategorySedder::class);
        $this->call(EnfermedadSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(IconSeeder::class);
    }
}
