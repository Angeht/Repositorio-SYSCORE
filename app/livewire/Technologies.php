<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Technologies extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        return view('livewire.technologies', [
            'content' => $this->content('technologies'),
        ]);
    }
}
