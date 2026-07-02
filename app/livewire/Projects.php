<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Projects extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        return view('livewire.projects', [
            'content' => $this->content('projects', 'content'),
        ]);
    }
}
