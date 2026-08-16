<?php

namespace App\Livewire\Admin;

use App\Models\lenguajes;
use App\Models\librerias;
use App\Models\librerias_css;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Throwable;

class ProjectsAdmin extends Component
{
    use WithFileUploads;

    public $Projects;

    public $lenguajes;

    public $librerias;

    public $libreriascss;

    /* Propiedades de Project */
    public $title;

    public $descripcion;

    public $img;

    public $currentImg;

    public $formato;

    public $ruta;

    public $link;

    public $ProjectId = null;

    // Relaciones
    public $lenguajesSeleccionados = [];

    public $libreriasSeleccionadas = [];

    public $libreriasCssSeleccionadas = [];

    /* Propiedades del Formulario */
    public $showForm = false;

    public $showModal = false;

    public $modalMessage = '';

    public $showDeleteModal = false;

    public $deleteProject = '';

    public $deleteId = null;

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
        $this->reset(['title', 'descripcion', 'img', 'formato', 'ruta', 'link', 'ProjectId', 'lenguajesSeleccionados', 'libreriasSeleccionadas', 'libreriasCssSeleccionadas', 'currentImg']);
    }

    /* Metodos de Project */
    public function guardarProject(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:1000'],
            'ruta' => $this->ProjectId
                ? ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096']
                : ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'link' => ['nullable', 'url:http,https', 'max:2048'],
            'lenguajesSeleccionados' => ['array'],
            'lenguajesSeleccionados.*' => ['integer', 'distinct', Rule::exists('lenguajes', 'idlenguaje')],
            'libreriasSeleccionadas' => ['array'],
            'libreriasSeleccionadas.*' => ['integer', 'distinct', Rule::exists('librerias', 'idlibreria')],
            'libreriasCssSeleccionadas' => ['array'],
            'libreriasCssSeleccionadas.*' => ['integer', 'distinct', Rule::exists('librerias_csses', 'idlibreriacss')],
        ], [
            'title.required' => 'El titulo es obligatorio.',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'ruta.image' => 'El archivo debe ser una imagen.',
            'ruta.mimes' => 'La imagen debe ser JPG, PNG o WEBP.',
            'ruta.max' => 'La imagen no debe superar 4 MB.',
            'link.url' => 'El campo debe ser un enlace HTTP o HTTPS.',
        ]);

        $data = [
            'title' => $validated['title'],
            'descripcion' => $validated['descripcion'],
            'link' => $validated['link'] ?: null,
        ];

        $project = $this->ProjectId
            ? Project::findOrFail($this->ProjectId)
            : new Project;
        $oldPath = $project->exists ? $project->ruta : null;
        $newPath = null;

        if ($this->ruta) {
            $newPath = $this->ruta->store('img/proyecto', 'public');
            $data['formato'] = strtolower($this->ruta->getClientOriginalExtension());
            $data['ruta'] = $newPath;
            $data['img'] = pathinfo($this->ruta->getClientOriginalName(), PATHINFO_FILENAME);
        }

        $esEdicion = $project->exists;

        try {
            DB::transaction(function () use ($project, $data): void {
                $project->fill($data)->save();
                $project->lenguajes()->sync(array_map('intval', $this->lenguajesSeleccionados));
                $project->librerias()->sync(array_map('intval', $this->libreriasSeleccionadas));
                $project->libreriascss()->sync(array_map('intval', $this->libreriasCssSeleccionadas));
            });
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

        // Cargar checkbox seleccionados
        $this->lenguajesSeleccionados = $Project->lenguajes
            ->pluck('idlenguaje')
            ->toArray();

        $this->libreriasSeleccionadas = $Project->librerias
            ->pluck('idlibreria')
            ->toArray();

        $this->libreriasCssSeleccionadas = $Project->libreriascss
            ->pluck('idlibreriacss')
            ->toArray();

        $this->showForm = true;
    }

    public function confirmarEliminar($id): void
    {
        $p = Project::findOrFail($id);
        $this->deleteId = $id;
        $this->deleteProject = $p->title;
        $this->showDeleteModal = true;
    }

    public function cancelarEliminar()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function eliminarProject(): void
    {
        $project = Project::findOrFail($this->deleteId);
        $imagePath = $project->ruta;

        DB::transaction(function () use ($project): void {
            $project->lenguajes()->detach();
            $project->librerias()->detach();
            $project->libreriascss()->detach();
            $project->delete();
        });

        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        $this->showDeleteModal = false;
        $this->deleteId = null;
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
            ->with(['lenguajes', 'librerias', 'libreriascss'])
            ->latest()
            ->get();
        $this->lenguajes = lenguajes::all();
        $this->librerias = librerias::all();
        $this->libreriascss = librerias_css::all();
    }

    /* Método de renderizado */
    public function render()
    {
        return view('livewire.admin.projects_admin');
    }
}
