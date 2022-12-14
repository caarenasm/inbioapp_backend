<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
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
                'titulo' => 'Plan Gratuito',
                'slug' => 'plan-gratuito',
                'descripcion' => '<p><strong>Beneficios:&nbsp;</strong></p><ul><li>Diario Nutricional Dieta Inboinova&nbsp;</li><li>Básica Sugerencia de Bioproductos general&nbsp;</li><li>Recetas mensuales limitadas&nbsp;</li><li>Acceso al contenido actual de Inbionova</li></ul>',
                'imagen_url' => 'plan_gratuito.png',
                'precio' => 0,
                'texto_tiempo' => '',
                'texto_anual' => '',
            ],
            [
                'titulo' => 'Plan Básico',
                'slug' => 'plan-basico',
                'descripcion' => '<p><strong>Beneficios:&nbsp;</strong></p><ul><li>Diario Nutricional Recetas mensuales limitadas&nbsp;</li><li>Semáforo de alimentos personalizado</li><li>Sugerencias de Bioproductos personalizada&nbsp;</li><li>Control mensual con el coach&nbsp;</li><li>Acompañamiento diario del Coach 24/7&nbsp;</li><li>Notificaciones de eventos y charlas de Inbionova&nbsp;</li><li>Acceso al contenido actual de Inbionova Básico</li></ul><p>&nbsp;<strong>Servicio por 3 meses</strong></p>',
                'imagen_url' => 'plan-basico.png',
                'precio' =>  50000,
                'texto_tiempo' => '3 meses',
                'texto_anual' => '$180,000 anual',
            ],
            [
                'titulo' => 'Plan Saludable',
                'slug' => 'plan-saludable',
                'descripcion' => '<p><strong>Beneficios:&nbsp;</strong></p><ul><li>Diario Nutricional Recetas mensuales limitadas&nbsp;</li><li>Semáforo de alimentos personalizado&nbsp;</li><li>Sugerencias de Bioproductos personalizada&nbsp;</li><li>Descuentos en productos Inbionova 5%&nbsp;</li><li>Control mensual con el coach&nbsp;</li><li>Acompañamiento diario del Coach 24/7&nbsp;</li><li>Invitaciones a eventos y charlas (5% descuento)&nbsp;</li><li>Acceso al contenido actual de Inbionova&nbsp;</li></ul><p><strong>Servicio por 3 meses</strong>&nbsp;</p><p><strong>Versión anual del plan acceso a Inbionova Accademy</strong>.</p>',
                'imagen_url' => 'plan_saludable.png',
                'precio' => 100000,
                'texto_tiempo' => '3 meses',
                'texto_anual' => '$380,000 anual',
            ],
            [
                'titulo' => 'Plan Empower',
                'slug' => 'plan-empower',
                'descripcion' => '<p><strong>Beneficios:&nbsp;</strong></p><ul><li>Diario Nutricional Recetas mensuales ilimitadas Semáforo de alimentos personalizado</li><li>Sugerencias de Bioproductos personalizada</li><li>Descuentos en productos Inbionova 5%</li><li>Control mensual con el coach</li><li>Acompañamiento diario del Coach 24/7</li><li>Invitaciones a eventos y charlas (5% descuento)</li><li>Acceso al contenido actual de Inbionova</li><li>Acceso a cupones de descuento en productos y servicios de Aliados</li></ul><p>&nbsp;<strong>Servicio por 3 meses</strong></p><p>&nbsp;<strong>Versión anual del plan acceso a Inbionova Accademy</strong>.</p>',
                'imagen_url' => 'plan_empower.png',
                'precio' => 150000,
                'texto_tiempo' => '3 meses',
                'texto_anual' => '$570,000 anual',
            ]
        ];

        foreach ($data as $planes) {
            Plan::create($planes);
        }

    }
}
