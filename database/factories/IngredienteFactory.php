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
            'porcion' => $this->faker->paragraph(),
            'receta_id' => Receta::all()->random()->id,
            'alimento_id' => Alimento::all()->random()->id,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
