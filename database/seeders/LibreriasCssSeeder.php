<?php

namespace Database\Seeders;

use App\Models\librerias_css;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibreriasCssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $libreriasCss = [
            'Bootstrap',
            'Tailwind CSS',
            'Materialize',
            'Bulma',
            'Foundation',
            'Semantic UI',
            'UIkit',
            'Pure.css',
            'Skeleton',
        ];

        foreach ($libreriasCss as $css) {
            $libreiaCss = new librerias_css();
            $libreiaCss->descripcion_libreriacss=$css;
            $libreiaCss->save();
        }
    }

}
