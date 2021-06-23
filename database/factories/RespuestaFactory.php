<?php

namespace Database\Factories;

use App\Models\Pregunta;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Respuesta;

class RespuestaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Respuesta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'respuesta' => $this->faker->paragraph(),
            'ayuda' => $this->faker->paragraph(),
            'pregunta_id' => Pregunta::all()->random()->id,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
