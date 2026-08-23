<?php

namespace Database\Seeders;

use App\Models\librerias_css;
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

        $formato = [
            'ico',
            'png',
            'png',
            'png',
            'png',
            'webp',
            'png',
            'png',
            'webp',
        ];
        $ruta = [
            'img/libreriascss/bootstrap.ico',
            'img/libreriascss/tailwind.png',
            'img/libreriascss/Materialize.png',
            'img/libreriascss/Bulma.png',
            'img/libreriascss/Foundation.png',
            'img/libreriascss/semanticui.webp',
            'img/libreriascss/Uikit.png',
            'img/libreriascss/PureCss.png',
            'img/libreriascss/skeleton.webp',
        ];

        foreach ($libreriasCss as $i => $css) {
            librerias_css::updateOrCreate(
                ['descripcion_libreriacss' => $css],
                [
                    'formato_libreriacss' => $formato[$i],
                    'ruta_libreriacss' => $ruta[$i],
                ],
            );
        }
    }
}
