<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Objetivo;

class ObjetivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'nombre_objetivo' => 'Regular mi peso',
                'descripcion' => 'Si quieres lograr con éxito el objetivo de bajar o subir de peso para mejorar tu estado de salud o apariencia física.',
                'imagen_url' => 'objetivo_1.jpg',
            ],
            [
                'nombre_objetivo' => 'Mejorar mi salud',
                'descripcion' => 'Si tu propósito es mejorar los signos de tus dolencias y poder sentirte bien cada día.',
                'imagen_url' => 'objetivo_2.jpg',
            ],
            [
                'nombre_objetivo' => 'Mantener mi estilo de vida saludable',
                'descripcion' => 'Si ya has hecho cambios en tu dieta y estilo de vida y deseas mantenerte motivado para seguirla.',
                'imagen_url' => 'objetivo_3.jpg',
            ]
        ];

        foreach ($data as $objetivo) {
            Objetivo::create($objetivo);
        }
    }
}
