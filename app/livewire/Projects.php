<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class Projects extends Component
{
    use WithPagination;

    use LoadsSiteContent;

    /* Método de renderizado */
    public function render()
    {
        $Projects = Project::query()
            ->paginate(10);

        return view('livewire.Projects', [
            'content' => $this->content('Projects'),
            'Project' => $Projects
        ]);
    }
}
