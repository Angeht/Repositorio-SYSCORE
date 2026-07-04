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

        $formato = [
            'jpg',
            'png',
            'png',
            'png',
            'png',
            'png',
            'png',
            'png',
            'png'
        ];
        $ruta = [
            'img/librerias/Laravel.jpg',
            'img/librerias/react.png',
            'img/librerias/vueJS.png',
            'img/librerias/Angular.png',
            'img/librerias/Django.png',
            'img/librerias/Flask.png',
            'img/librerias/Spring.png',
            'img/librerias/ExpressJS.png',
            'img/librerias/RubyOnRails.png'
        ];

        foreach ($librerias as $i =>$lib) {
            $libreria = new librerias();
            $libreria->descripcion_libreria=$lib;
            $libreria->formato_libreria=$formato[$i];
            $libreria->ruta_libreria=$ruta[$i];
            $libreria->save();
        }
    }
}
