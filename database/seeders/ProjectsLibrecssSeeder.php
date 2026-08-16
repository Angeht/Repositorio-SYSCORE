<?php

namespace Database\Seeders;

use App\Models\librerias_css;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsLibrecssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cssLibraryIds = librerias_css::query()
            ->where('descripcion_libreriacss', 'Bootstrap')
            ->pluck('idlibreriacss');

        foreach (['Sistema de Gestión de Flota Vehicular', 'Sistema de Gestión de Reservas'] as $title) {
            Project::query()
                ->where('title', $title)
                ->firstOrFail()
                ->libreriascss()
                ->sync($cssLibraryIds);
        }
    }
}
