@props(['path', 'name'])

@if ($path && \Illuminate\Support\Facades\Storage::disk('public')->exists($path))
    <img
        src="{{ asset('storage/'.$path) }}"
        alt="{{ $name }}"
        title="{{ $name }}"
        class="h-8 w-8 object-contain"
    >
@else
    <span class="text-xs font-black text-cyan-300" title="{{ $name }}">
        {{ str($name)->substr(0, 2)->upper() }}
    </span>
@endif
