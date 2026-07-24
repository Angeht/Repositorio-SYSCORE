<?php

namespace App\Livewire\Admin;

use App\Models\Equipo;
use Livewire\Component;
use Livewire\WithFileUploads;

class EquipoAdmin extends Component
{
    use WithFileUploads;

    public $nombre, $cargo, $descripcion, $linkedin, $github, $orden = 0;
    public $foto;
    public $editId = null;

    public $miembros;

    public $showForm = false;

    public $showModal = false;
    public $modalMessage = '';

    public $showDeleteModal = false;
    public $deleteId = null;
    public $deleteNombre = '';

    public function mount()
    {
        $this->cargarMiembros();
    }

    public function cargarMiembros()
    {
        $this->miembros = Equipo::orderBy('orden')->get();
    }

    public function toggleForm()
    {
        $this->showForm = ! $this->showForm;
        if (! $this->showForm) {
            $this->resetForm();
        }
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:100',
            'cargo' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'foto' => 'nullable|image|max:2048',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'cargo.required' => 'El cargo es obligatorio.',
            'linkedin.url' => 'El LinkedIn debe ser una URL válida (ej: https://linkedin.com/in/...)',
            'github.url' => 'El GitHub debe ser una URL válida (ej: https://github.com/...)',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.max' => 'La imagen no debe superar 2MB.',
        ]);

        $data = [
            'nombre' => $this->nombre,
            'cargo' => $this->cargo,
            'descripcion' => $this->descripcion,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'orden' => $this->orden,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('equipo', 'public');
        }

        $esEdicion = (bool) $this->editId;

        if ($esEdicion) {
            Equipo::find($this->editId)->update($data);
        } else {
            Equipo::create($data);
        }

        $this->resetForm();
        $this->showForm = false;
        $this->cargarMiembros();
        $this->mostrarModal($esEdicion ? 'Integrante actualizado correctamente.' : 'Integrante agregado correctamente.');
    }

    public function editar($id)
    {
        $m = Equipo::find($id);
        $this->editId = $id;
        $this->nombre = $m->nombre;
        $this->cargo = $m->cargo;
        $this->descripcion = $m->descripcion;
        $this->linkedin = $m->linkedin;
        $this->github = $m->github;
        $this->orden = $m->orden;
        $this->showForm = true;
    }

    public function confirmarEliminar($id)
    {
        $m = Equipo::find($id);
        $this->deleteId = $id;
        $this->deleteNombre = $m->nombre;
        $this->showDeleteModal = true;
    }

    public function eliminar($id)
    {
        Equipo::find($id)->delete();
        $this->showDeleteModal = false;
        $this->deleteId = null;
        $this->cargarMiembros();
        $this->mostrarModal('Integrante eliminado correctamente.');
    }

    public function cancelarEliminar()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function toggleActivo($id)
    {
        $m = Equipo::find($id);
        $m->update(['activo' => ! $m->activo]);
        $this->cargarMiembros();
    }

    public function resetForm()
    {
        $this->reset(['nombre', 'cargo', 'descripcion', 'linkedin', 'github', 'foto', 'editId']);
        $this->orden = 0;
    }

    public function mostrarModal($mensaje)
    {
        $this->modalMessage = $mensaje;
        $this->showModal = true;
    }

    public function cerrarModal()
    {
        $this->showModal = false;
    }
    public function render()
    {
        return view('livewire.admin.equipo_admin');
    }
}
