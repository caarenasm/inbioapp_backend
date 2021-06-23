<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Receta;

class RecetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receta::class;

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
            'seo_titulo' => $this->faker->title(),
            'seo_descripcion' => $this->faker->paragraph(),
            'imagen_url' =>$this->faker->image(public_path("imagenes/recetas/"),640,682,null,false),
            'descripcion' => $this->faker->paragraph(),
            'preparacion' => $this->faker->paragraph(),
            'fecha_publicacion' => $this->faker->title(),
            'publicacion' => $this->faker->numberBetween(0,1),
            'grasa' => $this->faker->numberBetween(1,20),
            'caloria' => $this->faker->numberBetween(1,20),
            'proteina' => $this->faker->numberBetween(1,20),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
