<?php

namespace App\Livewire\Admin;

use App\Models\lenguajes;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LenguajeAdmin extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $Lenguaje;

    /* Propiedades */
    public $descripcion_lenguaje;
    public $currentImg;
    public $formato_lenguaje;
    public $ruta_lenguaje;
    public $Id = null;

    /* Propiedades del Formulario */
    public $showForm = false;
    public $showModal = false;
    public $modalMessage = '';
    public $showDeleteModal = false;
    public $deleteLenguaje = '';
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
        $this->reset(['descripcion_lenguaje', 'formato_lenguaje', 'ruta_lenguaje', 'Id', 'currentImg']);
    }

    /* Metodos */
    public function guardar()
    {
        $this->validate([
            'descripcion_lenguaje' => 'required|string|max:1000',
            'ruta_lenguaje' => 'nullable|max:2048',
        ], [
            'descripcion_lenguaje.required' => 'La descripcion es obligatoria.',
            'ruta_lenguaje.image' => 'El archivo debe ser una imagen.',
        ]);

        $data = [
            'descripcion_lenguaje' => $this->descripcion_lenguaje,
            'formato_lenguaje' => $this->formato_lenguaje,
        ];

        if ($this->ruta_lenguaje) {
            $extension = $this->ruta_lenguaje->getClientOriginalExtension();
            $nombreExtension = $this->ruta_lenguaje->getClientOriginalName();
            $this->ruta_lenguaje->storeAs('img/lenguajes/', $nombreExtension, 'public');
            $data['formato_lenguaje'] = $extension;
            $data['ruta_lenguaje'] = 'img/lenguajes/' . $nombreExtension;
        }

        $esEdicion = (bool) $this->Id;

        if ($esEdicion) {
            $LenguajeEdit = lenguajes::findOrFail($this->Id);
            if ($this->ruta_lenguaje) {
                if ($LenguajeEdit->ruta_lenguaje) {
                    Storage::disk('public')->delete($LenguajeEdit->ruta_lenguaje);
                }
            }
            $LenguajeEdit->update($data);
        } else {
            lenguajes::create($data);
        }

        $this->resetForm();
        $this->showForm = false;
        $this->mostrarRegistro();
        $this->mostrarModal($esEdicion ? 'Lenguaje actualizado correctamente.' : 'Lenguaje agregado correctamente.');
    }

    public function actualizar($id)
    {
        $Lenguaje = lenguajes::findOrFail($id);

        $this->Id = $id;
        $this->descripcion_lenguaje = $Lenguaje->descripcion_lenguaje;
        $this->formato_lenguaje = $Lenguaje->formato_lenguaje;
        $this->currentImg = $Lenguaje->ruta_lenguaje;

        $this->showForm = true;
    }

    public function confirmarEliminar($id)
    {
        $len = lenguajes::find($id);
        $this->deleteId = $id;
        $this->deleteLenguaje = $len->descripcion_lenguaje;
        $this->showDeleteModal = true;
    }

    public function cancelarEliminar()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function eliminar($id)
    {
        $Lenguaje = lenguajes::findOrFail($id);
        Storage::disk('public')->delete($Lenguaje->ruta_lenguaje);
        $this->showDeleteModal = false;
        $this->deleteId = null;
        $Lenguaje->delete();
        $this->mostrarRegistro();
        $this->mostrarModal('Lenguaje eliminado correctamente.');
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
        $this->Lenguaje = lenguajes::query()
            ->where('descripcion_lenguaje', 'like', "%{$this->search}%")->get();
    }

    /* Método de renderizado */
    public function render()
    {
        return view('livewire.admin.lenguajes_admin');
    }
}
