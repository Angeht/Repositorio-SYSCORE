<?php

namespace App\Livewire;

use App\Livewire\Concerns\LoadsSiteContent;
use Illuminate\Mail\Message as MailMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class Contact extends Component
{
    use LoadsSiteContent;

    private const MAX_SUBMISSIONS = 3;

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
        $validated = $this->validate();
        $throttleKey = $this->throttleKey();

        if (RateLimiter::tooManyAttempts($throttleKey, self::MAX_SUBMISSIONS)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $this->addError('email', "Demasiados intentos. Intenta de nuevo en {$seconds} segundos.");

            return;
        }

        RateLimiter::hit($throttleKey, 60);

        try {
            Mail::raw(
                "Nombre: {$validated['name']}\nCorreo: {$validated['email']}\n\n{$validated['message']}",
                function (MailMessage $mail) use ($validated): void {
                    $mail->to(config('mail.contact_to'))
                        ->replyTo($validated['email'], $validated['name'])
                        ->subject('[Contacto SysCore] '.$validated['subject']);
                },
            );
        } catch (Throwable $exception) {
            report($exception);
            $this->addError('message', 'No fue posible enviar el mensaje. Intenta nuevamente en unos minutos.');

            return;
        }

        $this->sent = true;

        $this->reset(['name', 'email', 'subject', 'message']);
    }

    public function sendAnother(): void
    {
        $this->sent = false;
        $this->resetValidation();
    }

    private function throttleKey(): string
    {
        return 'contact-form:'.hash('sha256', strtolower($this->email).'|'.request()->ip());
    }

    public function render()
    {
        return view('livewire.contact', [
            'content' => $this->content('contact'),
        ]);
    }
}
