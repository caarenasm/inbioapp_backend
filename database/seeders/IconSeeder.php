<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Seeder;

class IconSeeder extends Seeder
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
                'nombre_icono' => 'icon-accidente',
            ],
            [
                'nombre_icono' => 'icon-actividad_fisica1',
            ],
            [
                'nombre_icono' => 'icon-adelante',
            ],
            [
                'nombre_icono' => 'icon-aerobicos',
            ],
            [
                'nombre_icono' => 'icon-agua',
            ],
            [
                'nombre_icono' => 'icon-agua_2',
            ],
            [
                'nombre_icono' => 'icon-alcohol',
            ],
            [
                'nombre_icono' => 'icon-alimento_alergia',
            ],
            [
                'nombre_icono' => 'icon-antojos',
            ],
            [
                'nombre_icono' => 'icon-atras',
            ],
            [
                'nombre_icono' => 'icon-blando',
            ],
            [
                'nombre_icono' => 'icon-buscar',
            ],
            [
                'nombre_icono' => 'icon-caminar',
            ],
            [
                'nombre_icono' => 'icon-ciclismo',
            ],
            [
                'nombre_icono' => 'icon-coach',
            ],
            [
                'nombre_icono' => 'icon-como_duermes',
            ],
            [
                'nombre_icono' => 'icon-correr',
            ],
            [
                'nombre_icono' => 'icon-deporte_equipo',
            ],
            [
                'nombre_icono' => 'icon-deposiciones',
            ],
            [
                'nombre_icono' => 'icon-dieta',
            ],
            [
                'nombre_icono' => 'icon-dolor_Cabeza',
            ],
            [
                'nombre_icono' => 'icon-duro',
            ],
            [
                'nombre_icono' => 'icon-duro_bolitas',
            ],
            [
                'nombre_icono' => 'icon-embarazo',
            ],
            [
                'nombre_icono' => 'icon-enfermedades',
            ],
            [
                'nombre_icono' => 'icon-escalera',
            ],
            [
                'nombre_icono' => 'icon-feliz',
            ],
            [
                'nombre_icono' => 'icon-fumar',
            ],
            [
                'nombre_icono' => 'icon-hospitalizacion',
            ],
            [
                'nombre_icono' => 'icon-inicio',
            ],
            [
                'nombre_icono' => 'icon-intervalos',
            ],
            [
                'nombre_icono' => 'icon-jardineria',
            ],
            [
                'nombre_icono' => 'icon-liquido',
            ],
            [
                'nombre_icono' => 'icon-menos',
            ],
            [
                'nombre_icono' => 'icon-menu',
            ],
            [
                'nombre_icono' => 'icon-mi_diario_nutricional',
            ],
            [
                'nombre_icono' => 'icon-mi_dieta',
            ],
            [
                'nombre_icono' => 'icon-mi_guia_nutricional',
            ],
            [
                'nombre_icono' => 'icon-nadar',
            ],
            [
                'nombre_icono' => 'icon-neutro',
            ],
            [
                'nombre_icono' => 'icon-notificaciones',
            ],
            [
                'nombre_icono' => 'icon-patinaje',
            ],
            [
                'nombre_icono' => 'icon-pesas',
            ],
            [
                'nombre_icono' => 'icon-plus',
            ],
            [
                'nombre_icono' => 'icon-reloj',
            ],
            [
                'nombre_icono' => 'icon-senderismo',
            ],
            [
                'nombre_icono' => 'icon-sin_forma',
            ],
            [
                'nombre_icono' => 'icon-stress',
            ],
            [
                'nombre_icono' => 'icon-suplementos',
            ],
            [
                'nombre_icono' => 'icon-telefono',
            ],
            [
                'nombre_icono' => 'icon-tipos_Antojo',
            ],
            [
                'nombre_icono' => 'icon-usuario',
            ],
            [
                'nombre_icono' => 'icon-viaje',
            ],
            [
                'nombre_icono' => 'icon-whatsap2',
            ],
            [
                'nombre_icono' => 'icon-yoga',
            ]
        ];

        foreach ($data as $iconos) {
            Icon::create($iconos);
        }
    }
}
