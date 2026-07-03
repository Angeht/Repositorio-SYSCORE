<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Component;

class Services extends Component
{
    use LoadsSiteContent;

    public int $active = 0;

    public function render()
    {
         return view('livewire.services', [
             'content' => $this->content('services'),
         ]);
        // dd($this->content('services'));
    }
    public function next()
    {
        $items = $this->content('services')['items'] ?? [];

        $this->direction = 'next';

        $this->active++;

        if ($this->active >= count($items)) {
            $this->active = 0;
        }
    }

    public function prev()
    {
        $items = $this->content('services')['items'] ?? [];

        $this->direction = 'prev';

        $this->active--;

        if ($this->active < 0) {
            $this->active = count($items) - 1;
        }
    }

    public function getServiceProperty()
    {
        $items = $this->content('services')['items'] ?? [];

        return $items[$this->active] ?? null;
    }

    public string $direction = 'next';



}
