<?php

namespace Database\Seeders;

use App\Models\lenguajes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LenguajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lenguajes = [
            'PHP',
            'JavaScript',
            'Python',
            'Java',
            'TypeScript',
        ];

        foreach ($lenguajes as $leng) {
            $lenguaje = new lenguajes();
            $lenguaje->descripcion_lenguaje=$leng;
            $lenguaje->save();
        }
    }
}
