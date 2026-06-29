<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@syscore.dev'],
            [
                'name' => 'Administrador SysCore',
                'password' => 'admin12345',
                'role' => 'admin',
            ]
        );

        foreach ($this->siteContents() as $content) {
            SiteContent::updateOrCreate(
                ['page' => $content['page'], 'section' => $content['section']],
                $content
            );
        }
    }

    private function siteContents(): array
    {
        return [
            [
                'page' => 'home',
                'section' => 'hero',
                'title' => 'SysCore',
                'subtitle' => 'Dev Team',
                'body' => 'Ingenieria que transforma procesos en soluciones digitales.',
                'button_text' => 'Ver Proyectos',
                'button_url' => '/proyectos',
                'items' => [
                    'eyebrow' => 'Ingenieria de sistemas e informatica',
                    'description' => 'Analizamos, disenamos y desarrollamos sistemas funcionales orientados a necesidades reales, desde el levantamiento de requerimientos hasta el soporte en produccion.',
                ],
                'sort_order' => 1,
            ],
            [
                'page' => 'us',
                'section' => 'main',
                'title' => 'Construimos software claro para problemas reales.',
                'subtitle' => 'Nosotros',
                'body' => 'SysCore es un equipo de desarrollo enfocado en crear soluciones web estables, organizadas y faciles de mantener para empresas, emprendimientos y procesos internos.',
                'items' => ['Analisis', 'Diseno', 'Desarrollo', 'Pruebas', 'Soporte'],
                'sort_order' => 1,
            ],
            [
                'page' => 'services',
                'section' => 'main',
                'title' => 'Desarrollo de sistemas y experiencias digitales.',
                'subtitle' => 'Servicios',
                'body' => 'Creamos soluciones digitales orientadas a procesos reales.',
                'items' => [
                    ['titulo' => 'Aplicaciones Web', 'texto' => 'Plataformas a medida para administrar informacion, usuarios, reportes y procesos.'],
                    ['titulo' => 'Sistemas Internos', 'texto' => 'Herramientas para inventario, ventas, solicitudes, control y seguimiento operacional.'],
                    ['titulo' => 'Sitios Corporativos', 'texto' => 'Paginas modernas para presentar servicios, proyectos, equipo y canales de contacto.'],
                ],
                'sort_order' => 1,
            ],
            [
                'page' => 'projects',
                'section' => 'main',
                'title' => 'Soluciones destacadas.',
                'subtitle' => 'Proyectos',
                'body' => 'Proyectos pensados para optimizar operaciones, centralizar datos y mejorar decisiones.',
                'items' => [
                    ['titulo' => 'SysInventory', 'tipo' => 'Control de stock', 'texto' => 'Sistema para gestionar productos, entradas, salidas, alertas y reportes.'],
                    ['titulo' => 'CorePanel', 'tipo' => 'Dashboard administrativo', 'texto' => 'Panel para usuarios, roles, metricas, tablas dinamicas y control de informacion.'],
                    ['titulo' => 'DataFlow', 'tipo' => 'Gestion de procesos', 'texto' => 'Aplicacion para organizar solicitudes, estados, responsables y seguimiento.'],
                ],
                'sort_order' => 1,
            ],
            [
                'page' => 'technologies',
                'section' => 'main',
                'title' => 'Stack de desarrollo.',
                'subtitle' => 'Tecnologias',
                'body' => 'Usamos herramientas modernas para construir sistemas rapidos, escalables y faciles de mantener.',
                'items' => ['Laravel', 'Livewire', 'PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'Git', 'Vite'],
                'sort_order' => 1,
            ],
              [
                'page' => 'equipo',
                'section' => 'main',
                'title' => 'Stack de desarrollo.',
                'subtitle' => 'Tecnologias',
                'body' => 'Usamos herramientas modernas para construir sistemas rapidos, escalables y faciles de mantener.',
                'items' => ['Laravel', 'Livewire', 'PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'Git', 'Vite'],
                'sort_order' => 1,
            ],
            [
                'page' => 'contact',
                'section' => 'main',
                'title' => 'Hablemos de tu sistema.',
                'subtitle' => 'Contacto',
                'body' => 'Cuentanos que proceso quieres mejorar y revisamos como convertirlo en una solucion digital.',
                'items' => [
                    'email' => 'contacto@syscore.dev',
                    'location' => 'Colombia',
                    'response' => '24 a 48 horas',
                ],
                'sort_order' => 1,
            ],
        ];
    }
}
