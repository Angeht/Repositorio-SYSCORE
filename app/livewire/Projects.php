<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use App\Models\lenguajes;
use App\Models\librerias;
use App\Models\librerias_css;
use App\Models\project;
use Livewire\Component;

class Projects extends Component
{
    use LoadsSiteContent;

    public $lenguajes = [];
    public $lenguajeSeleccionado;
    public $librerias = [];
    public $libreriaSeleccionada;
    public $libreriascss = [];
    public $libreriacssSeleccionada;

    public function mount()
    {
        $this->lenguajes = lenguajes::all();
        $this->librerias = librerias::all();
        $this->libreriascss = librerias_css::all();
    }

    public function render()
    {
        $projects = project::query()
            ->when($this->lenguajeSeleccionado, function ($query) {
                $query->whereHas('lenguajes', function ($q) {
                    $q->where('idlenguaje', $this->lenguajeSeleccionado);
                });
            })

            ->when($this->libreriaSeleccionada, function ($query) {
                $query->whereHas('librerias', function ($q) {
                    $q->where('idlibreria', $this->libreriaSeleccionada);
                });
            })
            ->when($this->libreriacssSeleccionada, function ($query) {
                $query->whereHas('libreriascss', function ($q) {
                    $q->where('idlibreriacss', $this->libreriacssSeleccionada);
                });
            })->with(['lenguajes', 'librerias', 'libreriascss'])
            ->get();

        return view('livewire.projects', [
            'content' => $this->content('projects'),
            'project' => $projects
        ]);
    }
}
