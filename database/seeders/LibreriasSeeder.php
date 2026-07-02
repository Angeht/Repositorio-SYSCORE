<?php

namespace Database\Seeders;

use App\Models\librerias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibreriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $librerias = [
            'Laravel',
            'React',
            'Vue.js',
            'Angular',
            'Django',
            'Flask',
            'Spring Boot',
            'Express.js',
            'Ruby on Rails',
        ];

        foreach ($librerias as $lib) {
            $libreria = new librerias();
            $libreria->descripcion_libreria=$lib;
            $libreria->save();
        }
    }
}
