<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoriasProducto;

class CategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriasProducto::create([
            'name' => 'Productos',
            'slug' => 'productos',
            'imagen' => 'placeholder.png',
            'resolucion' => 0,
        ]);
    }
}
