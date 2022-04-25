<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Storage::deleteDirectory('imagenes');
        Storage::makeDirectory('imagenes');

        Storage::deleteDirectory('entregas');
        Storage::makeDirectory('entregas');

        Storage::deleteDirectory('guides');
        Storage::makeDirectory('guides');

        Storage::deleteDirectory('boletines');
        Storage::makeDirectory('boletines');

        $this->call([
            GradoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        \App\Models\User::factory(50)->create();

        $users_without_any_roles = User::doesntHave('roles')->get();

        foreach ($users_without_any_roles as $user) {
            $user->assignRole('Estudiante');
        }
    }
}
