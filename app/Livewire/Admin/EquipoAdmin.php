<?php

namespace App\Livewire\Admin;

use App\Models\Equipo;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class EquipoAdmin extends Component
{
    use WithFileUploads;

    public $nombre;

    public $cargo;

    public $descripcion;

    public $linkedin;

    public $github;

    public $orden = 0;

    public $foto;

    public $currentFoto;

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
            'linkedin' => 'nullable|url:http,https|max:2048',
            'github' => 'nullable|url:http,https|max:2048',
            'orden' => 'required|integer|min:0|max:999',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'cargo.required' => 'El cargo es obligatorio.',
            'linkedin.url' => 'El LinkedIn debe ser una URL válida (ej: https://linkedin.com/in/...)',
            'github.url' => 'El GitHub debe ser una URL válida (ej: https://github.com/...)',
            'foto.image' => 'El archivo debe ser una imagen.',
            'foto.mimes' => 'La imagen debe ser JPG, PNG o WEBP.',
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

        $esEdicion = (bool) $this->editId;
        $miembro = $esEdicion ? Equipo::findOrFail($this->editId) : new Equipo;
        $oldPath = $miembro->exists ? $miembro->foto : null;
        $newPath = null;

        if ($this->foto) {
            $newPath = $this->foto->store('equipo', 'public');
            $data['foto'] = $newPath;
        }

        try {
            $miembro->fill($data)->save();
        } catch (Throwable $exception) {
            if ($newPath) {
                Storage::disk('public')->delete($newPath);
            }

            throw $exception;
        }

        if ($newPath && $oldPath && $oldPath !== $newPath) {
            Storage::disk('public')->delete($oldPath);
        }

        $this->resetForm();
        $this->showForm = false;
        $this->cargarMiembros();
        $this->mostrarModal($esEdicion ? 'Integrante actualizado correctamente.' : 'Integrante agregado correctamente.');
    }

    public function editar($id)
    {
        $m = Equipo::findOrFail($id);
        $this->editId = $id;
        $this->nombre = $m->nombre;
        $this->cargo = $m->cargo;
        $this->descripcion = $m->descripcion;
        $this->linkedin = $m->linkedin;
        $this->github = $m->github;
        $this->orden = $m->orden;
        $this->currentFoto = $m->foto;
        $this->showForm = true;
    }

    public function confirmarEliminar($id)
    {
        $m = Equipo::findOrFail($id);
        $this->deleteId = $id;
        $this->deleteNombre = $m->nombre;
        $this->showDeleteModal = true;
    }

    public function eliminar(): void
    {
        $miembro = Equipo::findOrFail($this->deleteId);
        $imagePath = $miembro->foto;
        $miembro->delete();

        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

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
        $m = Equipo::findOrFail($id);
        $m->update(['activo' => ! $m->activo]);
        $this->cargarMiembros();
    }

    public function resetForm()
    {
        $this->reset(['nombre', 'cargo', 'descripcion', 'linkedin', 'github', 'foto', 'currentFoto', 'editId']);
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
