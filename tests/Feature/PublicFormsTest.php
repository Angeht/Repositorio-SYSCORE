<?php

namespace Tests\Feature;

use App\Livewire\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class PublicFormsTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_validates_and_sends_a_message(): void
    {
        Mail::fake();

        Livewire::test(Contact::class)
            ->set('name', 'Persona de Prueba')
            ->set('email', 'persona@example.com')
            ->set('subject', 'Nuevo proyecto')
            ->set('message', 'Quiero conversar sobre el desarrollo de un nuevo sistema para mi empresa.')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSet('sent', true);
    }
}
