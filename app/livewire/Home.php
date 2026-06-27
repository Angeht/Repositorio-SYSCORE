<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Home extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        return view('livewire.home', [
            'hero' => $this->content('home', 'hero'),
        ]);
    }
}
