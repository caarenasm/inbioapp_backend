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
        
        User::create([
            'name' => 'Editor',
            'email' => 'a@gmail.com',
            'password' => bcrypt('fgh')
        ])->assignRole('Editor');

        User::create([
            'name' => 'Coach Huertas',
            'email' => 'b@gmail.com',
            'password' => bcrypt('hjk')
        ])->assignRole('Coach Huertas');

        User::create([
            'name' => 'Coach Nutricion',
            'email' => 'c@gmail.com',
            'password' => bcrypt('qwery')
        ])->assignRole('Coach Nutrición');
    }
}
