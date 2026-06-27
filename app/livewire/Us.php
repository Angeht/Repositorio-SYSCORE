<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Us extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        return view('livewire.us', [
            'content' => $this->content('us'),
        ]);
    }
}
