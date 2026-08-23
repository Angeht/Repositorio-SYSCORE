<?php

namespace App\Livewire\Admin;

use App\Models\SiteContent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $contents;

    public ?int $editingId = null;

    public string $page = '';

    public string $section = '';

    public string $title = '';

    public string $subtitle = '';

    public string $body = '';

    public string $button_text = '';

    public string $button_url = '';

    public string $items = '';

    public function mount(): void
    {
        $this->loadContents();
        $this->edit($this->contents->first()?->id);
    }

    public function loadContents(): void
    {
        $this->contents = SiteContent::query()
            ->orderBy('page')
            ->orderBy('sort_order')
            ->orderBy('section')
            ->get();
    }

    public function edit(?int $id): void
    {
        if (! $id) {
            return;
        }

        $content = SiteContent::findOrFail($id);

        $this->editingId = $content->id;
        $this->page = $content->page;
        $this->section = $content->section;
        $this->title = $content->title ?? '';
        $this->subtitle = $content->subtitle ?? '';
        $this->body = $content->body ?? '';
        $this->button_text = $content->button_text ?? '';
        $this->button_url = $content->button_url ?? '';
        $this->items = json_encode($content->items ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function save(): void
    {
        if (! $this->editingId) {
            $this->addError('title', 'Selecciona un contenido para editar.');

            return;
        }

        $validated = $this->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_url' => [
                'nullable',
                'string',
                'max:255',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    if (! $this->isSafeUrl((string) $value)) {
                        $fail('La URL debe ser una ruta interna o un enlace HTTP/HTTPS.');
                    }
                },
            ],
            'items' => ['nullable', 'json'],
        ]);

        $content = SiteContent::find($this->editingId);

        if (! $content) {
            $this->addError('title', 'El contenido seleccionado ya no existe.');
            $this->loadContents();
            $this->edit($this->contents->first()?->id);

            return;
        }

        $content->update([
            'title' => $validated['title'] ?: null,
            'subtitle' => $validated['subtitle'] ?: null,
            'body' => $validated['body'] ?: null,
            'button_text' => $validated['button_text'] ?: null,
            'button_url' => $validated['button_url'] ?: null,
            'items' => $validated['items'] ? json_decode($validated['items'], true) : [],
        ]);

        $this->loadContents();
        session()->flash('status', 'Contenido actualizado correctamente.');
    }

    public function logout()
    {
        Auth::logout();

        if (request()->hasSession()) {
            request()->session()->invalidate();
            request()->session()->regenerateToken();
        }

        return redirect()->route('login');
    }

    private function isSafeUrl(string $url): bool
    {
        if ($url === '') {
            return true;
        }

        if (str_starts_with($url, '/') && ! str_starts_with($url, '//')) {
            return true;
        }

        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));

        return in_array($scheme, ['http', 'https'], true) && filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
