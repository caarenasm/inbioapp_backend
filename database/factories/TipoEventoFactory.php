<?php

namespace Database\Factories;

use App\Models\TipoEvento;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoEventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoEvento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo_evento' => $this->faker->title(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
