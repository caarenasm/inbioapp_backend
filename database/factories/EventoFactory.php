<?php

namespace Database\Factories;

use App\Models\Evento;
use App\Models\TipoEvento;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evento::class;

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
            'imagen_url' =>$this->faker->image(public_path("imagenes/eventos/"),640,682,null,false),
            'descripcion' => $this->faker->paragraph(),
            'fecha_evento' => now(),
            'hora' => time(),
            'tipo_evento_id' =>TipoEvento::all()->random()->id,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
