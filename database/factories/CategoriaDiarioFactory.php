<?php

namespace Database\Factories;

use App\Models\CategoriaDiario;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaDiarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaDiario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->title(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
