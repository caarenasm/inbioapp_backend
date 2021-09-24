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
                'descripcion' => 'Sueño',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '1',
            ],
            [
                'descripcion' => 'alergias',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '1',
            ],
            [
                'descripcion' => 'diabetes',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '2',
            ],
            [
                'descripcion' => 'presion',
                'icono' => 'icon-accidente',
                'tipo_lectura_id' => '2',
            ],
        ];

        foreach ($data as $subtipos_lecturas) {
            SubtipoLectura::create($subtipos_lecturas);
        }
    }
}
