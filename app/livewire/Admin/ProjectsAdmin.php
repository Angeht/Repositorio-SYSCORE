<?php

namespace App\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProjectsAdmin extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $Projects;

    /* Propiedades de Project */
    public $title;
    public $descripcion;
    public $img;
    public $currentImg;
    public $formato;
    public $ruta;
    public $link;
    public $ProjectId = null;

    /* Propiedades del Formulario */
    public $showForm = false;
    public $showModal = false;
    public $modalMessage = '';
    public $showDeleteModal = false;
    public $deleteProject = '';
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
        $this->reset(['title', 'descripcion', 'img', 'formato', 'ruta', 'link', 'ProjectId', 'currentImg']);
    }

    /* Metodos de Project */
    public function guardarProject()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'ruta' => 'nullable|mimes:jpg,jpeg,png,ico',
            'link' => 'nullable|url',
        ], [
            'title.required' => 'El titulo es obligatorio.',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'ruta.image' => 'El archivo debe ser una imagen.',
            'link.url' => 'El campo debe ser un enlace.'
        ]);

        $data = [
            'title' => $this->title,
            'descripcion' => $this->descripcion,
            'img' => $this->img,
            'formato' => $this->formato,
        ];

        if ($this->ruta) {
            $extension = $this->ruta->getClientOriginalExtension();
            $nombreExtension = $this->ruta->getClientOriginalName();
            $nombreImagen = pathinfo($nombreExtension, PATHINFO_FILENAME);
            $this->ruta->storeAs('img/proyecto', $nombreExtension, 'public');
            $data['formato'] = $extension;
            $data['ruta'] = 'img/proyecto/' . $nombreExtension;
            $data['img'] = $nombreImagen;
        }

        $esEdicion = (bool) $this->ProjectId;

        if ($esEdicion) {
            $ProjectEdit = Project::findOrFail($this->ProjectId);
            if ($this->ruta) {
                if ($ProjectEdit->ruta) {
                    Storage::disk('public')->delete($ProjectEdit->ruta);
                }
            }
            $ProjectEdit->update($data);
        } else {
            Project::create($data);
        }

        $this->resetForm();
        $this->showForm = false;
        $this->mostrarRegistro();
        $this->mostrarModal($esEdicion ? 'Proyecto actualizado correctamente.' : 'Proyecto agregado correctamente.');
    }

    public function actualizarProject($id)
    {
        $Project = Project::findOrFail($id);

        $this->ProjectId = $id;
        $this->title = $Project->title;
        $this->descripcion = $Project->descripcion;
        $this->img = $Project->img;
        $this->formato = $Project->formato;
        $this->currentImg = $Project->ruta;
        $this->link = $Project->link;

        $this->showForm = true;
    }

    public function confirmarEliminar($id)
    {
        $p = Project::find($id);
        $this->deleteId = $id;
        $this->deleteProject = $p->title;
        $this->showDeleteModal = true;
    }

    public function cancelarEliminar()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function eliminarProject($id)
    {
        $Project = Project::findOrFail($id);
        Storage::disk('public')->delete($Project->ruta);
        $this->showDeleteModal = false;
        $this->deleteId = null;
        $Project->delete();
        $this->mostrarRegistro();
        $this->mostrarModal('Proyecto eliminado correctamente.');
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
        $this->Projects = Project::query()
            ->where('title', 'like', "%{$this->search}%")->get();
    }

    /* Método de renderizado */
    public function render()
    {
        return view('livewire.admin.projects_admin');
    }
}
