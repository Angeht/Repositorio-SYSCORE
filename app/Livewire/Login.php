<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Login extends Component
{
    private const MAX_LOGIN_ATTEMPTS = 5;

    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    public function login()
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), self::MAX_LOGIN_ATTEMPTS)) {
            $seconds = RateLimiter::availableIn($this->throttleKey());
            $this->addError('email', "Demasiados intentos. Intenta de nuevo en {$seconds} segundos.");

            return;
        }

        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $this->remember)) {
            RateLimiter::hit($this->throttleKey(), 60);
            $this->addError('email', 'Las credenciales no coinciden.');

            return;
        }

        if (request()->hasSession()) {
            request()->session()->regenerate();
        }

        if (! Auth::user()->isAdmin()) {
            RateLimiter::hit($this->throttleKey(), 60);
            Auth::logout();

            if (request()->hasSession()) {
                request()->session()->invalidate();
                request()->session()->regenerateToken();
            }

            $this->addError('email', 'Este usuario no tiene permisos de administrador.');

            return;
        }

        RateLimiter::clear($this->throttleKey());

        $this->redirectRoute('admin.dashboard', navigate: true);
    }

    private function throttleKey(): string
    {
        return strtolower($this->email).'|'.request()->ip();
    }

    public function render()
    {
        return view('livewire.login');
    }
}
