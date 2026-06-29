<?php

namespace App\Livewire;

use App\Models\Equipo;
use Livewire\Component;

class Team extends Component
{
    public function render()
    {
        return view('livewire.team', [
            'miembros' => Equipo::activos()->get(),
        ]);
    }
}