<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pregunta;

class PreguntaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pregunta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pregunta' => $this->faker->title(),
            'icono' =>$this->faker->image(public_path("imagenes/preguntas/"),640,682,null,false),
            'descripcion' => $this->faker->paragraph(),
            'tipo_respuestas' => $this->faker->numberBetween(0,1),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
