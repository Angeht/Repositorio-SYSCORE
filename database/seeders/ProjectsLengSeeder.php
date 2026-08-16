<?php

namespace Database\Seeders;

use App\Models\lenguajes;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsLengSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languageIds = lenguajes::query()
            ->whereIn('descripcion_lenguaje', ['PHP', 'JavaScript'])
            ->pluck('idlenguaje');

        foreach (['Sistema de Gestión de Flota Vehicular', 'Sistema de Gestión de Reservas'] as $title) {
            Project::query()
                ->where('title', $title)
                ->firstOrFail()
                ->lenguajes()
                ->sync($languageIds);
        }
    }
}
