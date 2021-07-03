<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoEnfermedad;

class TipoEnfermedadSeeder extends Seeder
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
                'categoria_enfermedad' => 'Diabetes',
                'descripcion' => 'Enfermedades que puede adquirise por obesidad, mala alimentacion etc'
            ],
            [
                'categoria_enfermedad' => 'Cardiovasculares',
                'descripcion' => 'Enfermedades que afectan las venas y arterias'
            ],
            [
                'categoria_enfermedad' => 'Sistema Oseo',
                'descripcion' => 'Enfermedades que afectan las venas y arterias'
            ],
            [
                'categoria_enfermedad' => 'Neuronales',
                'descripcion' => 'Enfermedades que afecta el sistema nervioso, el cerebro etc'
            ],
            [   'categoria_enfermedad' => 'Respiratorias',
                'descripcion' => 'Enfermedades que afectan el sistema respiratorio'
            ]
        ];

        foreach ($data as $tipo_enfermedad) {
            TipoEnfermedad::create($tipo_enfermedad);
        }
    }
}
