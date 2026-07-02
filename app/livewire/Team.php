<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use App\Models\Equipo;
use Livewire\Component;

class Team extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        return view('livewire.team', [
            'content' => $this->content('team'),
            'miembros' => Equipo::activos()->get(),
        ]);
    }
}
