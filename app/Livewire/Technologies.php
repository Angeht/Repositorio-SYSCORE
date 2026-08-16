<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use App\Models\lenguajes;
use App\Models\librerias;
use App\Models\librerias_css;
use Livewire\Component;

class Technologies extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        $Lenguajes = lenguajes::query()->get();
        $Librerias = librerias::query()->get();
        $LibreriasCss = librerias_css::query()->get();

        return view('livewire.technologies', [
            'content' => $this->content('technologies'),
            'lenguajes' => $Lenguajes,
            'librerias' => $Librerias,
            'libreriascss' => $LibreriasCss,
        ]);
    }
}
