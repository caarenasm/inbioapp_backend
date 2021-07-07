<?php

namespace Database\Seeders;

use App\Models\SemaforoEstado;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
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
                'estado_semaforo' => 'Recomendado',
            ],
            [
                'estado_semaforo' => 'No Recomendado',
            ],
            [
                'estado_semaforo' => 'Prohibido',

            ]
        ];

        foreach ($data as $estados) {
            SemaforoEstado::create($estados);
        }
    }
}
