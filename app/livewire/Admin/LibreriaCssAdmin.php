<?php

namespace App\Livewire\Admin;

use App\Models\librerias_css;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class LibreriaCssAdmin extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $LibreriaCss;

    /* Propiedades */
    public $descripcion_libreriacss;
    public $currentImg;
    public $formato_libreriacss;
    public $ruta_libreriacss;
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
        $this->reset(['descripcion_libreriacss', 'formato_libreriacss', 'ruta_libreriacss', 'Id', 'currentImg']);
    }

    /* Metodos */
    public function guardar()
    {
        $this->validate([
            'descripcion_libreriacss' => 'required|string|max:1000',
            'ruta_libreriacss' => 'nullable|max:2048',
        ], [
            'descripcion_libreriacss.required' => 'La descripcion es obligatoria.',
            'ruta_libreriacss.image' => 'El archivo debe ser una imagen.',
        ]);

        $data = [
            'descripcion_libreriacss' => $this->descripcion_libreriacss,
            'formato_libreriacss' => $this->formato_libreriacss,
        ];

        if ($this->ruta_libreriacss) {
            $extension = $this->ruta_libreriacss->getClientOriginalExtension();
            $nombreExtension = $this->ruta_libreriacss->getClientOriginalName();
            $this->ruta_libreriacss->storeAs('img/libreriascss/', $nombreExtension, 'public');
            $data['formato_libreriacss'] = $extension;
            $data['ruta_libreriacss'] = 'img/libreriascss/' . $nombreExtension;
        }

        $esEdicion = (bool) $this->Id;

        if ($esEdicion) {
            $Edit = librerias_css::findOrFail($this->Id);
            if ($this->ruta_libreriacss) {
                if ($Edit->ruta_libreriacss) {
                    Storage::disk('public')->delete($Edit->ruta_libreriacss);
                }
            }
            $Edit->update($data);
        } else {
            librerias_css::create($data);
        }

        $this->resetForm();
        $this->showForm = false;
        $this->mostrarRegistro();
        $this->mostrarModal($esEdicion ? 'Libreria css actualizada correctamente.' : 'Libreria css agregada correctamente.');
    }

    public function actualizar($id)
    {
        $css = librerias_css::findOrFail($id);

        $this->Id = $id;
        $this->descripcion_libreriacss = $css->descripcion_libreriacss;
        $this->formato_libreriacss = $css->formato_libreriacss;
        $this->currentImg = $css->ruta_libreriacss;

        $this->showForm = true;
    }

    public function confirmarEliminar($id)
    {
        $len = librerias_css::find($id);
        $this->deleteId = $id;
        $this->delete = $len->descripcion_libreriacss;
        $this->showDeleteModal = true;
    }

    public function cancelarEliminar()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function eliminar($id)
    {
        $css = librerias_css::findOrFail($id);
        Storage::disk('public')->delete($css->ruta_libreriacss);
        $this->showDeleteModal = false;
        $this->deleteId = null;
        $css->delete();
        $this->mostrarRegistro();
        $this->mostrarModal('Libreria Css eliminada correctamente.');
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
        $this->LibreriaCss = librerias_css::query()
            ->where('descripcion_libreriacss', 'like', "%{$this->search}%")->get();
    }

    /* Método de renderizado */
    public function render()
    {
        return view('livewire.admin.librerias_css_admin');
    }
}
