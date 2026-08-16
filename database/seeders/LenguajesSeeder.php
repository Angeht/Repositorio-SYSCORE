<?php

namespace Database\Seeders;

use App\Models\lenguajes;
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

        $formato = [
            'ico',
            'ico',
            'png',
            'png',
            'ico',
        ];
        $ruta = [
            'img/lenguajes/php.ico',
            'img/lenguajes/javascript.ico',
            'img/lenguajes/python.png',
            'img/lenguajes/java.png',
            'img/lenguajes/typescript.ico',
        ];

        foreach ($lenguajes as $i => $leng) {
            lenguajes::updateOrCreate(
                ['descripcion_lenguaje' => $leng],
                [
                    'formato_lenguaje' => $formato[$i],
                    'ruta_lenguaje' => $ruta[$i],
                ],
            );
        }
    }
}
