<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alimento;
use App\Models\CategoriaAlimento;

class AlimentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alimento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->title(),
            'categoria_alimento_id' =>CategoriaAlimento::all()->random()->id,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
