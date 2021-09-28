<?php

namespace Database\Seeders;

use App\Models\SubtipoLectura;
use Illuminate\Database\Seeder;

class SubtipoLecturaSeeder extends Seeder
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
                'descripcion' => 'Muy bien, me levanto descansado',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '1',
            ],
            [
                'descripcion' => 'Nadar',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '2',
            ],
            [
                'descripcion' => 'Correr',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '2',
            ],
            [
                'descripcion' => 'Bioremix ',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '3',
            ],
            [
                'descripcion' => 'Bioremix mana',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '3',
            ],
        ];

        foreach ($data as $subtipos_lecturas) {
            SubtipoLectura::create($subtipos_lecturas);
        }
    }
}
