<?php

namespace Database\Seeders;

use App\Models\CategoriaDiario;
use Illuminate\Database\Seeder;

class CategoriaDiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nombre' => 'Habitos',
            ],
            [
                'nombre' => 'Alimentos',
            ],
            [
                'nombre' => 'Enfermedades'
            ],
        ];

        foreach ($data as $categoria_diarios) {
            CategoriaDiario::create($categoria_diarios);
        }
    }
}
