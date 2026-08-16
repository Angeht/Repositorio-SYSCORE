<?php

namespace Database\Seeders;

use App\Models\librerias;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsLibreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            'Sistema de Gestión de Flota Vehicular' => ['Laravel', 'Vue.js'],
            'Sistema de Gestión de Reservas' => ['Laravel', 'React'],
        ];

        foreach ($projects as $title => $libraries) {
            $libraryIds = librerias::query()
                ->whereIn('descripcion_libreria', $libraries)
                ->pluck('idlibreria');

            Project::query()
                ->where('title', $title)
                ->firstOrFail()
                ->librerias()
                ->sync($libraryIds);
        }
    }
}
