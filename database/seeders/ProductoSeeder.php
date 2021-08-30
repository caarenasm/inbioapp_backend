<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Productos;

class ProductoSeeder extends Seeder
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
                'title' => 'BIOREMIX',
                'slug' => 'bioremix-100',
                'seo_title' => 'BIOREMIX',
                'seo_description' => 'Alimento Funcional',
                'description' => 'Alimento funcional mineral que complementa las necesidades mínimas diarias
                nutricionales del ser humano. Mezcla de proteína aislada de soya, minerales y
                stevia. Promueve el balance nutricional y hormonal, anticancerígeno, ayuda al
                crecimiento, aprendizaje, mejora la energía, ayuda al desarrollo músculoesquelético y de articulaciones, reduce el riesgo de enfermedades cardiovasculares
                y fortalece el sistema inmune.',
                'price' => 30000,
                'weight' => 100,
                'published' => 0,
                'imagenes' => 'placeholder.png',
                'resolucion' => 0,

            ],
            [
                'title' => 'BIOREMIX',
                'slug' => 'bioremix-250',
                'seo_title' => 'BIOREMIX',
                'seo_description' => 'Alimento Funcional',
                'description' => 'Alimento funcional mineral que complementa las necesidades mínimas diarias
                nutricionales del ser humano. Mezcla de proteína aislada de soya, minerales y
                stevia. Promueve el balance nutricional y hormonal, anticancerígeno, ayuda al
                crecimiento, aprendizaje, mejora la energía, ayuda al desarrollo músculoesquelético y de articulaciones, reduce el riesgo de enfermedades cardiovasculares
                y fortalece el sistema inmune.',
                'price' => 66000,
                'weight' => 250,
                'published' => 0,
                'imagenes' => 'placeholder.png',
                'resolucion' => 0,

            ],
            [
                'title' => 'PURAFIB',
                'slug' => 'purafib',
                'seo_title' => 'PURAFIB',
                'seo_description' => 'Fibra natural',
                'description' => 'Fibra natural a base de trigo, maíz y avena que nutre las células intestinales y promueve la mucosa dentro de este para el adecuado funcionamiento del aparato digestivo y la absorción en equilibrio de nutrientes.',
                'price' => 20000,
                'weight' => 200,
                'published' => 0,
                'imagenes' => 'placeholder.png',
                'resolucion' => 0,

            ],
            [
                'title' => 'BIOREMIX MANÁ',
                'slug' => 'bioremix-mana-100',
                'seo_title' => 'BIOREMIX MANÁ',
                'seo_description' => 'Alimento funcional',
                'description' => 'Alimento funcional a base de quinoa orgánica, una fórmula especial de minerales y Stevia que permite la adecuada producción de proteína, carbohidratos y balance de enzimas y coenzimas en el organismo, lo que lo convierte en regulador hormonal y activador de metabolismo para una libre depuración de toxinas.',
                'price' => 36000,
                'weight' => 100,
                'published' => 0,
                'imagenes' => 'placeholder.png',
                'resolucion' => 0,

            ],
            [
                'title' => 'BIOREMIX MANÁ',
                'slug' => 'bioremix-mana-250',
                'seo_title' => 'BIOREMIX MANÁ',
                'seo_description' => 'Alimento funcional',
                'description' => 'Alimento funcional a base de quinoa orgánica, una fórmula especial de minerales y Stevia que permite la adecuada producción de proteína, carbohidratos y balance de enzimas y coenzimas en el organismo, lo que lo convierte en regulador hormonal y activador de metabolismo para una libre depuración de toxinas.',
                'price' => 36000,
                'weight' => 100,
                'published' => 0,
                'imagenes' => 'placeholder.png',
                'resolucion' => 0,
            ],
            [
                'title' => 'BIOREMIX MANÁ ESPECIAL',
                'slug' => 'bioremix-mana-especial-250',
                'seo_title' => 'BIOREMIX MANÁ ESPECIAL',
                'seo_description' => 'Alimento funcional',
                'description' => 'Alimento funcional a base de quinoa orgánica, una fórmula especial de minerales, mucuna pruriens, semillas de bocconia frutescesnsy Stevia que permite la adecuada conexión de las células cerebrales y así, el balance nutricional sobre todos los sistemas del organismo.',
                'price' => 100000,
                'weight' => 180,
                'published' => 0,
                'imagenes' => 'placeholder.png',
                'resolucion' => 0,
            ],
            [
                'title' => 'MEGA-ES',
                'slug' => 'mega-es',
                'seo_title' => 'MEGA-ES',
                'seo_description' => 'Alimento funcional minearl y vegetal',
                'description' => 'Alimento funcional a base de quinoa orgánica, una fórmula especial de minerales, mucuna pruriens, semillas de bocconia frutescesnsy Stevia que permite la adecuada conexión de las células cerebrales y así, el balance nutricional sobre todos los sistemas del organismo.',
                'price' => 80000,
                'weight' => 95,
                'published' => 0,
                'imagenes' => 'placeholder.png',
                'resolucion' => 0,
            ],
        ];

        foreach ($data as $producto) {
            Productos::create($producto);
        }
    }
}
