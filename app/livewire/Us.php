<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Us extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        $content = $this->content('us');

        // Respaldo: si la BD no trae etapas, usamos las 5 por defecto.
        if (empty($content['items'])) {
            $content['items'] = $this->defaultSteps();
        }

        return view('livewire.us', [
            'content' => $content,
            'stats' => $this->stats(),
            'values' => $this->values(),
            'stepsMeta' => $this->stepsMeta(),
        ]);
    }

    /**
     * Etapas de trabajo por defecto (respaldo si la BD esta vacia).
     *
     * @return array<int, string>
     */
    private function defaultSteps(): array
    {
        return ['Analisis', 'Diseno', 'Desarrollo', 'Pruebas', 'Soporte'];
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function stats(): array
    {
        return [
            ['value' => '100%', 'label' => 'Enfoque a medida'],
            ['value' => '5', 'label' => 'Etapas de trabajo'],
            ['value' => '24-48h', 'label' => 'Tiempo de respuesta'],
            ['value' => 'Web', 'label' => 'Especialidad'],
        ];
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function values(): array
    {
        return [
            [
                'title' => 'Claridad',
                'text' => 'Codigo y procesos ordenados, faciles de entender y de mantener en el tiempo.',
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 5.25h16.5M3.75 6.75h16.5"/></svg>',
            ],
            [
                'title' => 'Compromiso',
                'text' => 'Acompanamos el proyecto de principio a fin, desde el analisis hasta el soporte.',
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>',
            ],
            [
                'title' => 'Escalabilidad',
                'text' => 'Construimos soluciones que crecen con tu operacion sin perder estabilidad.',
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a1 1 0 000-1.41l-2.34-2.34a1 1 0 00-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>',
            ],
        ];
    }

    /**
     * Metadatos por etapa (clave en minuscula sin tildes): icono,
     * descripcion, entregable y duracion estimada.
     *
     * @return array<string, array<string, string>>
     */
    private function stepsMeta(): array
    {
        return [
            'analisis' => [
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"/></svg>',
                'text' => 'Levantamos requerimientos y entendemos el proceso real antes de escribir una sola linea de codigo.',
                'deliverable' => 'Documento de requerimientos',
                'duration' => 'Semana 1',
            ],
            'diseno' => [
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42"/></svg>',
                'text' => 'Definimos la estructura, los flujos de navegacion y la interfaz visual de la solucion.',
                'deliverable' => 'Prototipo y arquitectura',
                'duration' => 'Semanas 2-3',
            ],
            'desarrollo' => [
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>',
                'text' => 'Construimos el sistema con tecnologias modernas, codigo ordenado y buenas practicas.',
                'deliverable' => 'Sistema funcional',
                'duration' => 'Fase principal',
            ],
            'pruebas' => [
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                'text' => 'Validamos cada funcionalidad para asegurar estabilidad, seguridad y calidad.',
                'deliverable' => 'Reporte de calidad',
                'duration' => 'Previo al lanzamiento',
            ],
            'soporte' => [
                'icon' => '<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-6.219-8.56M12 8v4l2.5 2.5"/></svg>',
                'text' => 'Acompanamos la puesta en produccion y el mantenimiento continuo del sistema.',
                'deliverable' => 'Soporte continuo',
                'duration' => 'Post-produccion',
            ],
        ];
    }
}
