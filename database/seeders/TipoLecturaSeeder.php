<?php

namespace Database\Seeders;

use App\Models\TipoLectura;
use Illuminate\Database\Seeder;

class TipoLecturaSeeder extends Seeder
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
                'nombre' => 'Sueño',
                'categoria_diario_id' => '1',
            ],
            [
                'nombre' => 'alergias',
                'categoria_diario_id' => '2',
            ],
            [
                'nombre' => 'diabetes',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'presion',
                'categoria_diario_id' => '3',
            ],
        ];

        foreach ($data as $tipos_lecturas) {
            TipoLectura::create($tipos_lecturas);
        }
    }
}
