<?php

namespace Database\Factories;

use App\Models\CategoriaDiario;
use App\Models\TipoLectura;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoLecturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TipoLectura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->title(),
            'categoria_diario_id' =>CategoriaDiario::all()->random()->id,
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
