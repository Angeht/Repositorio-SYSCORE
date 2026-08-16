<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    public function run(): void
    {
        $miembros = [
            [
                'nombre' => 'Integrante 1',
                'cargo' => 'Backend Developer',
                'descripcion' => 'Laravel, base de datos y logica del sistema.',
                'foto' => null,
                'linkedin' => null,
                'github' => null,
                'orden' => 1,
                'activo' => true,
            ],
            [
                'nombre' => 'Integrante 2',
                'cargo' => 'Frontend Developer',
                'descripcion' => 'Interfaces, experiencia de usuario y estilos.',
                'foto' => null,
                'linkedin' => null,
                'github' => null,
                'orden' => 2,
                'activo' => true,
            ],
            [
                'nombre' => 'Integrante 3',
                'cargo' => 'Analista',
                'descripcion' => 'Requerimientos, documentacion y pruebas funcionales.',
                'foto' => null,
                'linkedin' => null,
                'github' => null,
                'orden' => 3,
                'activo' => true,
            ],
        ];

        foreach ($miembros as $miembro) {
            Equipo::updateOrCreate(
                ['nombre' => $miembro['nombre']],
                $miembro
            );
        }
    }
}
