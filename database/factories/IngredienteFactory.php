<?php

namespace Database\Factories;

use App\Models\Alimento;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingrediente;
use App\Models\Receta;

class IngredienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingrediente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'porcion' => $this->faker->title(),
            'receta_id' => 1,
            'alimento_id' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
