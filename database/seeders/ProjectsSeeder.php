<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::updateOrCreate(
            ['title' => 'Sistema de Gestión de Flota Vehicular'],
            [
                'img' => 'flota',
                'link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVgsCLBXjR6Tdjpqs4d39t_ojZZTDW7s27E8KoATBdDQ&s=10',
                'descripcion' => 'Centralización de toda la información de la flota en una sola plataforma.Control en tiempo real del estado de cada vehículo.Automatización de la programación de mantenimientos preventivos.Asignación eficiente de vehículos a conductores y rutas.Generación automática de reportes e indicadores de gestión.Mayor trazabilidad y auditoría de todas las operaciones.',
                'formato' => 'jpg',
                'ruta' => 'img/proyecto/flota.jpg',
            ],
        );

        Project::updateOrCreate(
            ['title' => 'Sistema de Gestión de Reservas'],
            [
                'img' => 'reservas',
                'link' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJQsmHvA2cf_vJ9U2Fw_9k3zLTbLgquDhv9eQAQF1hmw&s=10',
                'descripcion' => 'Automatización del proceso de reservas.Reducción de errores por reservas duplicadas.Recordatorios automáticos por correo electrónico o WhatsApp.Generación de reportes de reservas e ingresos.Mejora de la experiencia del usuario mediante un proceso de reserva rápido y sencillo.Acceso al sistema desde cualquier dispositivo con conexión a Internet.',
                'formato' => 'jpg',
                'ruta' => 'img/proyecto/reservas.jpg',
            ],
        );
    }
}
