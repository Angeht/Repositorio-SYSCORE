<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Contact extends Component
{
    use LoadsSiteContent;

    #[Validate('required|string|min:2|max:80')]
    public string $name = '';

    #[Validate('required|email|max:120')]
    public string $email = '';

    #[Validate('required|string|min:3|max:120')]
    public string $subject = '';

    #[Validate('required|string|min:10|max:2000')]
    public string $message = '';

    public bool $sent = false;

    public function submit(): void
    {
        $this->validate();

        // Aqui podria enviarse un correo o guardarse el mensaje en la BD.
        // Por ahora confirmamos la recepcion al usuario.
        $this->sent = true;

        $this->reset(['name', 'email', 'subject', 'message']);
    }

    public function sendAnother(): void
    {
        $this->sent = false;
    }

    public function render()
    {
        return view('livewire.contact', [
            'content' => $this->content('contact'),
        ]);
    }
}
