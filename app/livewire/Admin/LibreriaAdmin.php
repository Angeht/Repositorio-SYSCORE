<?php

namespace App\Livewire\Admin;

use App\Models\librerias;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LibreriaAdmin extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $Libreria;

    /* Propiedades */
    public $descripcion_libreria;
    public $currentImg;
    public $formato_libreria;
    public $ruta_libreria;
    public $Id = null;

    /* Propiedades del Formulario */
    public $showForm = false;
    public $showModal = false;
    public $modalMessage = '';
    public $showDeleteModal = false;
    public $delete = '';
    public $deleteId = null;

    // Búsqueda
    public $search = '';

    /* Propiedades */
    protected $paginationTheme = 'tailwind';

    /* Metodos del Formulario */
    public function toggleForm()
    {
        $this->showForm = ! $this->showForm;
        if (! $this->showForm) {
            $this->resetForm();
        }
    }

    public function resetForm()
    {
        $this->reset(['descripcion_libreria', 'formato_libreria', 'ruta_libreria', 'Id', 'currentImg']);
    }

    /* Metodos */
    public function guardar()
    {
        $this->validate([
            'descripcion_libreria' => 'required|string|max:1000',
            'ruta_libreria' => 'nullable|max:2048',
        ], [
            'descripcion_libreria.required' => 'La descripcion es obligatoria.',
            'ruta_libreria.image' => 'El archivo debe ser una imagen.',
        ]);

        $data = [
            'descripcion_libreria' => $this->descripcion_libreria,
            'formato_libreria' => $this->formato_libreria,
        ];

        if ($this->ruta_libreria) {
            $extension = $this->ruta_libreria->getClientOriginalExtension();
            $nombreExtension = $this->ruta_libreria->getClientOriginalName();
            $this->ruta_libreria->storeAs('img/librerias/', $nombreExtension, 'public');
            $data['formato_libreria'] = $extension;
            $data['ruta_libreria'] = 'img/librerias/' . $nombreExtension;
        }

        $esEdicion = (bool) $this->Id;

        if ($esEdicion) {
            $Edit = librerias::findOrFail($this->Id);
            if ($this->ruta_libreria) {
                if ($Edit->ruta_libreria) {
                    Storage::disk('public')->delete($Edit->ruta_libreria);
                }
            }
            $Edit->update($data);
        } else {
            librerias::create($data);
        }

        $this->resetForm();
        $this->showForm = false;
        $this->mostrarRegistro();
        $this->mostrarModal($esEdicion ? 'Libreria actualizada correctamente.' : 'Libreria agregada correctamente.');
    }

    public function actualizar($id)
    {
        $Libreria = librerias::findOrFail($id);

        $this->Id = $id;
        $this->descripcion_libreria = $Libreria->descripcion_libreria;
        $this->formato_libreria = $Libreria->formato_libreria;
        $this->currentImg = $Libreria->ruta_libreria;

        $this->showForm = true;
    }

    public function confirmarEliminar($id)
    {
        $lib = librerias::find($id);
        $this->deleteId = $id;
        $this->delete = $lib->descripcion_libreria;
        $this->showDeleteModal = true;
    }

    public function cancelarEliminar()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function eliminar($id)
    {
        $Libreria = librerias::findOrFail($id);
        Storage::disk('public')->delete($Libreria->ruta_libreria);
        $this->showDeleteModal = false;
        $this->deleteId = null;
        $Libreria->delete();
        $this->mostrarRegistro();
        $this->mostrarModal('Libreria eliminada correctamente.');
    }

    /* Metodos */
    public function mostrarModal($mensaje)
    {
        $this->modalMessage = $mensaje;
        $this->showModal = true;
    }

    public function cerrarModal()
    {
        $this->showModal = false;
    }


    /* Precargar registro */
    public function mount()
    {
        $this->mostrarRegistro();
    }

    /* Método para precargar el registro */
    public function mostrarRegistro()
    {
        $this->Libreria = librerias::query()
            ->where('descripcion_libreria', 'like', "%{$this->search}%")->get();
    }

    /* Método de renderizado */
    public function render()
    {
        return view('livewire.admin.librerias_admin');
    }
}
