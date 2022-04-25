<?php

namespace Database\Seeders;

use App\Models\Grado;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gradosPrimaria = [
            'Primero',
            'Segundo',
            'Tercero',
            'Cuarto',
            'Quinto',
        ];

        $gradosSecundaria = [
            'Sexto',
            'Septimo',
            'Octavo',
            'Noveno',
            'Decimo',
            'Onceavo',
            'Doceavo',
        ];

        foreach ($gradosPrimaria as $grado) {
            Grado::create([
                'grado' => $grado,
                'seccion' => 'Primaria',
                'jornada' => 'Diurna',
                'modalidad' => 'Presencial',
            ]);

            Grado::create([
                'grado' => $grado,
                'nivel' => 'B',
                'seccion' => 'Primaria',
                'jornada' => 'Diurna',
                'modalidad' => 'Presencial',
            ]);
        }

        foreach ($gradosSecundaria as $grado) {
            Grado::create([
                'grado' => $grado,
                'seccion' => 'Secundaria',
                'jornada' => 'Diurna',
                'modalidad' => 'Presencial',
            ]);

            Grado::create([
                'grado' => $grado,
                'nivel' => 'B',
                'seccion' => 'Secundaria',
                'jornada' => 'Diurna',
                'modalidad' => 'Presencial',
            ]);
        }
    }
}
