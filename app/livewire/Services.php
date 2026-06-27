<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Services extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        return view('livewire.services', [
            'content' => $this->content('services'),
        ]);
    }
}
