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
                'nombre' => 'Regular sueño',
                'categoria_diario_id' => '1',
            ],
            [
                'nombre' => 'Peso actual',
                'categoria_diario_id' => '1',
            ],
            [
                'nombre' => 'Actividad fisica',
                'categoria_diario_id' => '1',
            ],
            [
                'nombre' => '¿Qué comiste?',
                'categoria_diario_id' => '2',
            ],
            [
                'nombre' => 'Vasos de agua',
                'categoria_diario_id' => '2',
            ],
            [
                'nombre' => 'Incomodidad con los alimentos',
                'categoria_diario_id' => '2',
            ],
            [
                'nombre' => 'Suplementos',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Deposiciones',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Enfermedades estacionales',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Regular enfermedad',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Vision',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Gastricas',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Dolencias en el cuerpo',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Señales en el organismo',
                'categoria_diario_id' => '3',
            ],
            [
                'nombre' => 'Alergias',
                'categoria_diario_id' => '3',
            ],
        ];

        foreach ($data as $tipos_lecturas) {
            TipoLectura::create($tipos_lecturas);
        }
    }
}
