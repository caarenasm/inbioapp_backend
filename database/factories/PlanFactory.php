<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plan;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->title(),
            'slug' => $this->faker->title(),
            'descripcion' => $this->faker->paragraph(),
            'imagen_url' => $this->faker->image(public_path("imagenes/planes/"),640,682,null,false),
            'precio' => $this->faker->randomNumber(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
