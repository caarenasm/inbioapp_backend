<?php

namespace Database\Factories;

use App\Models\LecturaUser;
use App\Models\TipoLectura;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturaUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LecturaUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'tipo_lectura_id' =>TipoLectura::all()->random()->id,
            'datos_leidos' => '{"id":1,"nombre":"Sueño leve"}'
        ];
    }
}
