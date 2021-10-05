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
        $this->call(ObjetivoSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(PreguntaSeeder::class);
        $this->call(RespuestaSeeder::class);
        $this->call(CategoriaDiarioSeeder::class);
        $this->call(TipoLecturaSeeder::class);
        $this->call(SubtipoLecturaSeeder::class);
        $this->call(CategoriaProductoSeeder::class);
        $this->call(ProductoSeeder::class);
    }
}
