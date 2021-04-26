<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Eric Liebstreich',
            'email' => 'ericliebstreich@gmail.com',
            'password' => bcrypt('Eric36889341')
        ])->assignRole('Administrador');

    }
}
