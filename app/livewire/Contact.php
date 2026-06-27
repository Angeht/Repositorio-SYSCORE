<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Contact extends Component
{
    use LoadsSiteContent;

    public function render()
    {
        return view('livewire.contact', [
            'content' => $this->content('contact'),
        ]);
    }
}
