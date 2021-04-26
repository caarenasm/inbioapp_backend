<?php

namespace Database\Seeders;

use App\Models\CategoriasBlog;
use Illuminate\Database\Seeder;

class CategorySedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriasBlog::create([
            'name' => 'Sin categoría',
            'slug' => 'sin-categoria'
        ]);
    }
}
