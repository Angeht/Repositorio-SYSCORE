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

        for ($i=1; $i < count($lenguajes) ; $i++) { 
            # code...
        }

        foreach ($lenguajes as $i =>$leng) {
            $lenguaje = new lenguajes();
            $lenguaje->descripcion_lenguaje=$leng;
            $lenguaje->formato_lenguaje=$formato[$i];
            $lenguaje->ruta_lenguaje=$ruta[$i];
            $lenguaje->save();
        }
    }
}
