<?php

namespace Database\Seeders;
use App\Models\Pregunta;

use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
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
                'pregunta' => '¿Cómo duermes?',
                'icono' => 'icon-como_duermes',
                'descripcion' => 'Tu calidad de sueño es importante para tu eficiencia diaria.',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Con qué frecuencia tienes antojos?',
                'icono' => 'icon-antojos',
                'descripcion' => 'Un antojo es un deseo que tenemos de comer algo (casi siempre el mismo tipo de comida) fuera de las horas de las comidas.',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Por cuáles tipos de comida sientes antojo?',
                'icono' => 'icon-tipo_antojo',
                'descripcion' => 'Entender lo que tu cuerpo pide de comida o desea refleja algunas deficiencias nutricionales y también refleja la calidad y variedad de tu microbiota.',
                'tipo_respuestas' => 2
            ],
            [
                'pregunta' => '¿Cuáles actividades físicas te son más cómodas de practicar?',
                'icono' => 'icon-actividad_fisica1',
                'descripcion' => 'La actividad física es muy importante para el metabolismo, el manejo del estrés, depresión y reduce el riesgo de sufrir enfermedades cardiovasculares',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Padeces alguna de estas dolencias? (Escoge hasta 3 enfermedades)',
                'icono' => 'icon-enfermedades',
                'descripcion' => 'Una dieta equilibrada previene y mejora enfermedades existentes en nuestro cuerpo',
                'tipo_respuestas' => 2
            ],
            [
                'pregunta' => '¿Tienes alguna dieta especial?',
                'icono' => 'icon-dieta',
                'descripcion' => '',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Qué alimentos o productos basados en en este tipo de comida te causan alergias o incomodidad?',
                'icono' => 'icon-alimento_alergia',
                'descripcion' => 'Cambiar nuestra alimentación por comida orgánica nos ayuda a entender de dónde provienen las alergias alimenticias',
                'tipo_respuestas' => 2
            ],
            [
                'pregunta' => '¿Cuántas deposiciones haces al día?',
                'icono' => 'icon-deposiciones',
                'descripcion' => 'La frecuencia, forma, color y olor de las heces nos ayudan a descubrir si tienes algún problema de salud, relacionado con tu nutrición y tu microbiologia intestinal.',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Cuánta agua tomas al día?',
                'icono' => 'icon-agua',
                'descripcion' => 'La hidratación es muy importante pues está presente en el transporte de nutrientes, regulación de la temperatura, lubricación y reacciones químicas que ocurren en el organismo',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Ingieres suplementos nutricionales?',
                'icono' => 'icon-suplementos',
                'descripcion' => 'Combinar una dieta equilibrada con suplementos crea un estilo de vida saludable' ,
                'tipo_respuestas' => 2
            ],
            [
                'pregunta' => '¿Fumas?',
                'icono' => 'icon-fumar',
                'descripcion' => '',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Bebes alcohol?',
                'icono' => 'icon-alcohol',
                'descripcion' => '',
                'tipo_respuestas' => 1
            ],
            [
                'pregunta' => '¿Te dan estos sintomas a menudo?',
                'icono' => 'icon-dolor_Cabeza',
                'descripcion' => '',
                'tipo_respuestas' => 2
            ]
        ];

        foreach ($data as $preguntas) {
            Pregunta::create($preguntas);
        }
    }
}
