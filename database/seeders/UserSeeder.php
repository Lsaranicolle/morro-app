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
            'name' => 'Mersis Andrea',
            'apellido' => 'Perez',
            'identificacion' => '123456789',
            'email' => 'mercis@unisangil.edu.co',
            'password' => bcrypt('mercis12345')

        ])->assignRole('Administrador');

        User::create([
            'name' => 'Florelba',
            'apellido' => 'Niño Higuera',
            'identificacion' => '987654321',
            'email' => 'flor@unisangil.edu.co',
            'password' => bcrypt('flor12345')

        ])->assignRole('Estudiante');

        User::create([
            'name' => 'Dumar Fabian',
            'apellido' => 'Cañizales',
            'identificacion' => '1145315491',
            'email' => 'dumar@unisangil.edu.co',
            'password' => bcrypt('dumar12345')

        ])->assignRole('Profesor');
        
    }
}
