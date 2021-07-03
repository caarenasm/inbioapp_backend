<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enfermedad;

class EnfermedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [   
                
            [ 'enfermedad' => 'Epoc',
                'descripcion' => 'Enfermedad que pertenece a la categoria....',
                'tipo_enfermedad_id' => '5',

            ],
            [
                'enfermedad' => 'Colesterol',
                'descripcion' => 'Enfermedad que pertenece a la categoria....',
                'tipo_enfermedad_id' => '2',
                
            ],
            [
                'enfermedad' => 'Artritis',
                'descripcion' => 'Enfermedad que pertenece a la categoria....',
                'tipo_enfermedad_id' => '3',
                
            ],
            [
                'enfermedad' => 'Alzheimer',
                'descripcion' => 'Enfermedad que pertenece a la categoria....',
                'tipo_enfermedad_id' => '4',
                
            ],
            [
                'enfermedad' => 'diabetes tipo 1',
                'descripcion' => 'Enfermedad que pertenece a la categoria....',
                'tipo_enfermedad_id' => '1',
                
            ]
        ];

        foreach ($data as $enfermedad) {
            Enfermedad::create($enfermedad);
        }
    }
}
