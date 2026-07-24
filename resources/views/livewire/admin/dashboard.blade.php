<div class="min-h-screen bg-[#030712] text-slate-100">
    <header class="border-b border-cyan-400/10 bg-[#050716]">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-10">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex h-9 w-9 items-center justify-center rounded-md bg-cyan-400 text-lg font-black text-[#06111f]">
                    &gt;_
                </span>
                <span class="text-lg font-black">Sys<span class="text-cyan-400">Core</span> Admin</span>
            </a>

            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="rounded-md border border-cyan-400/20 px-4 py-2 text-xs font-bold text-cyan-300 transition hover:bg-cyan-400/10">
                    Ver sitio
                </a>
                <button wire:click="logout" type="button" class="rounded-md bg-cyan-400 px-4 py-2 text-xs font-black text-[#05111f] transition hover:bg-cyan-300">
                    Salir
                </button>
            </div>
        </nav>
    </header>

    <main class="mx-auto grid max-w-7xl gap-6 px-5 py-8 lg:grid-cols-[340px_1fr] lg:px-10">
        <aside class="rounded-md border border-cyan-400/10 bg-[#07101f] p-4">
            <p class="mb-4 px-2 text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">Contenido</p>

            <div class="space-y-2">
                @foreach ($contents as $content)
                <button
                    wire:click="edit({{ $content->id }})"
                    type="button"
                    class="w-full rounded-md px-4 py-3 text-left transition {{ $editingId === $content->id ? 'bg-cyan-400 text-[#05111f]' : 'bg-white/[0.03] text-slate-300 hover:bg-cyan-400/10 hover:text-cyan-200' }}">
                    <span class="block text-xs font-black uppercase tracking-[0.2em]">{{ $content->page }}</span>
                    <span class="mt-1 block text-sm font-semibold">{{ $content->section }}</span>
                </button>
                @endforeach

                <a href="{{ route('admin.equipo') }}"
                    class="flex w-full items-center rounded-md bg-white/[0.03] px-4 py-3 text-left text-slate-300 transition hover:bg-cyan-400/10 hover:text-cyan-200">
                    <div>
                        <span class="block text-xs font-black uppercase tracking-[0.2em]">equipo</span>
                        <span class="mt-1 block text-sm font-semibold">miembros</span>
                    </div>
                </a>
                <a href="{{ route('admin.proyectos') }}"
                    class="flex w-full items-center rounded-md bg-white/[0.03] px-4 py-3 text-left text-slate-300 transition hover:bg-cyan-400/10 hover:text-cyan-200">
                    <div>
                        <span class="block text-xs font-black uppercase tracking-[0.2em]">proyectos</span>
                        <span class="mt-1 block text-sm font-semibold">gestionar</span>
                    </div>
                </a>
            </div>


        </aside>

        <section class="rounded-md border border-cyan-400/10 bg-[#07101f] p-6 md:p-8">
            <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">Editor</p>
                    <h1 class="mt-3 text-3xl font-black text-white">Cambios de la pagina</h1>
                </div>

                <div class="rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-sm text-slate-400">
                    {{ $page }} / {{ $section }}
                </div>
            </div>

            @if (session('status'))
            <div class="mb-6 rounded-md border border-cyan-400/20 bg-cyan-400/10 px-4 py-3 text-sm font-bold text-cyan-200">
                {{ session('status') }}
            </div>
            @endif

            <form wire:submit="save" class="space-y-5">
                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="text-sm font-bold text-slate-300">Titulo</label>
                        <input wire:model="title" type="text" class="mt-2 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none focus:border-cyan-300">
                    </div>

                    <div>
                        <label class="text-sm font-bold text-slate-300">Subtitulo / etiqueta</label>
                        <input wire:model="subtitle" type="text" class="mt-2 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none focus:border-cyan-300">
                    </div>
                </div>

                <div>
                    <label class="text-sm font-bold text-slate-300">Texto principal</label>
                    <textarea wire:model="body" rows="4" class="mt-2 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none focus:border-cyan-300"></textarea>
                </div>

                <div class="grid gap-5 md:grid-cols-2">
                    <div>
                        <label class="text-sm font-bold text-slate-300">Texto del boton</label>
                        <input wire:model="button_text" type="text" class="mt-2 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none focus:border-cyan-300">
                    </div>

                    <div>
                        <label class="text-sm font-bold text-slate-300">URL del boton</label>
                        <input wire:model="button_url" type="text" class="mt-2 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none focus:border-cyan-300">
                    </div>
                </div>

                <div>
                    <label class="text-sm font-bold text-slate-300">Elementos JSON</label>
                    <textarea wire:model="items" rows="12" class="mt-2 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 font-mono text-sm text-white outline-none focus:border-cyan-300"></textarea>
                    @error('items')
                    <p class="mt-2 text-sm font-semibold text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="rounded-md bg-cyan-400 px-8 py-4 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                    <span wire:loading.remove>Guardar cambios</span>
                    <span wire:loading>Guardando...</span>
                </button>
            </form>
        </section>
    </main>
</div>