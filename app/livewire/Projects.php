<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use App\Models\lenguajes;
use App\Models\librerias;
use App\Models\librerias_css;
use App\Models\project;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{

    use WithPagination;

    use LoadsSiteContent;

    public $lenguajes = [];
    public $lenguajeSeleccionado = [];
    public $librerias = [];
    public $libreriaSeleccionada = [];
    public $libreriascss = [];
    public $libreriacssSeleccionada = [];

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
                foreach ($this->lenguajeSeleccionado as $lenguaje) {
                    $query->whereHas('lenguajes', function ($q) use ($lenguaje) {
                        $q->where('idlenguaje', $lenguaje);
                    });
                }
            })

            ->when($this->libreriaSeleccionada, function ($query) {
                foreach ($this->libreriaSeleccionada as $libreria) {
                    $query->whereHas('librerias', function ($q) use ($libreria) {
                        $q->where('idlibreria', $libreria);
                    });
                }
            })
            ->when($this->libreriacssSeleccionada, function ($query) {
                foreach ($this->libreriacssSeleccionada as $css) {
                    $query->whereHas('libreriasCss', function ($q) use ($css) {
                        $q->where('idlibreriacss', $css);
                    });
                }
            })->with(['lenguajes', 'librerias', 'libreriascss'])
            ->paginate(1);

        return view('livewire.projects', [
            'content' => $this->content('projects'),
            'project' => $projects
        ]);
    }

    public function updatedLenguajeSeleccionado()
    {
        $this->resetPage();
    }

    public function updatedLibreriaSeleccionada()
    {
        $this->resetPage();
    }

    public function updatedLibreriaCssSeleccionada()
    {
        $this->resetPage();
    }
}
