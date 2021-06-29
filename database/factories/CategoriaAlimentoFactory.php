<?php

namespace Database\Factories;

use App\Models\CategoriaAlimento;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaAlimentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaAlimento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_categoria' => $this->faker->title(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
