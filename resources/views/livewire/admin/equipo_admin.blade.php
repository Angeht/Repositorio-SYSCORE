<div class="min-h-screen bg-[#030712] text-slate-100">
    <header class="border-b border-cyan-400/10 bg-[#050716]">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-10">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex h-9 w-9 items-center justify-center rounded-md bg-cyan-400 text-lg font-black text-[#06111f]">&gt;_</span>
                <span class="text-lg font-black">Sys<span class="text-cyan-400">Core</span> Admin</span>
            </a>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="rounded-md border border-cyan-400/20 px-4 py-2 text-xs font-bold text-cyan-300 transition hover:bg-cyan-400/10">Ver sitio</a>
                <a href="{{ route('admin.dashboard') }}" class="rounded-md bg-cyan-400 px-4 py-2 text-xs font-black text-[#05111f] transition hover:bg-cyan-300">Panel</a>
            </div>
        </nav>
    </header>

    <main class="mx-auto grid max-w-7xl gap-6 px-5 py-8 lg:grid-cols-[340px_1fr] lg:px-10">

    
        <aside class="rounded-md border border-cyan-400/10 bg-[#07101f] p-4">
            <p class="mb-4 px-2 text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">Contenido</p>
            <div class="space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex w-full items-center rounded-md bg-white/[0.03] px-4 py-3 text-slate-300 transition hover:bg-cyan-400/10 hover:text-cyan-200">
                    <div>
                        <span class="block text-xs font-black uppercase tracking-[0.2em]">páginas</span>
                        <span class="mt-1 block text-sm font-semibold">Contenido del sitio</span>
                    </div>
                </a>
                <a href="{{ route('admin.equipo') }}"
                    class="flex w-full items-center rounded-md bg-cyan-400 px-4 py-3 text-[#05111f]">
                    <div>
                        <span class="block text-xs font-black uppercase tracking-[0.2em]">equipo</span>
                        <span class="mt-1 block text-sm font-semibold">Miembros</span>
                    </div>
                </a>
            </div>
        </aside>

        <section class="rounded-md border border-cyan-400/10 bg-[#07101f] p-6 md:p-8">

            {{-- CABECERA --}}
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">Gestión</p>
                    <h1 class="mt-3 text-3xl font-black text-white">Equipo</h1>
                </div>
                <button wire:click="toggleForm"
                    class="rounded-md bg-cyan-400 px-5 py-2 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                    {{ $showForm ? '✕ Cancelar' : '+ Agregar Integrante' }}
                </button>
            </div>

       
            @if ($showForm)
                <div class="mb-8 rounded-md border border-cyan-400/10 bg-black/20 p-5">
                    <p class="mb-4 text-xs font-bold uppercase tracking-widest text-cyan-300">
                        {{ $editId ? 'Editar miembro' : 'Nuevo miembro' }}
                    </p>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Nombre</label>
                            <input type="text" wire:model="nombre"
                                class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300">
                            @error('nombre') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Profesión</label>
                            <input type="text" wire:model="cargo"
                                class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300">
                            @error('cargo') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Descripción</label>
                        <textarea wire:model="descripcion" rows="3"
                            class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300"></textarea>
                    </div>

                    <div class="mt-4 grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">LinkedIn URL</label>
                            <input type="text" wire:model="linkedin"
                                class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300">
                            @error('linkedin') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">GitHub URL</label>
                            <input type="text" wire:model="github"
                                class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300">
                            @error('github') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mt-4 grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Orden</label>
                            <input type="number" wire:model="orden"
                                class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300">
                        </div>
                        <div>
                            <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Foto</label>
                            <input type="file" wire:model="foto" class="w-full text-slate-400">
                            @error('foto') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                            @if ($foto)
                                <img src="{{ $foto->temporaryUrl() }}" class="mt-3 h-16 w-16 rounded-full object-cover ring-2 ring-cyan-400/30">
                            @endif
                        </div>
                    </div>

                    <div class="mt-5 flex gap-3">
                        <button wire:click="guardar"
                            class="rounded-md bg-cyan-400 px-6 py-2 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                            {{ $editId ? 'Actualizar' : 'Agregar' }}
                        </button>
                        <button wire:click="toggleForm"
                            class="rounded-md border border-cyan-400/20 px-6 py-2 text-sm font-bold text-slate-400 transition hover:border-cyan-300 hover:text-white">
                            Cancelar
                        </button>
                    </div>
                </div>
            @endif

           
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                @forelse ($miembros as $m)
                    <div class="flex items-start justify-between rounded-md border border-cyan-400/10 bg-black/20 p-5 transition hover:border-cyan-400/30">
                        <div class="flex items-start gap-4">
                            @if ($m->foto)
                                <img src="{{ asset('storage/'.$m->foto) }}" class="h-12 w-12 rounded-md object-cover ring-2 ring-cyan-400/20">
                            @else
                                <div class="flex h-12 w-12 items-center justify-center rounded-md bg-cyan-400/10 text-sm font-black text-cyan-300 ring-2 ring-cyan-400/20">
                                    {{ collect(explode(' ', $m->nombre))->map(fn($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                                </div>
                            @endif
                            <div>
                                <p class="font-bold text-white">{{ $m->nombre }}</p>
                                <p class="text-sm text-slate-400">{{ $m->cargo }}</p>
                                <span class="{{ $m->activo ? 'bg-cyan-400/10 text-cyan-300' : 'bg-slate-700 text-slate-500' }} mt-2 inline-block rounded-full px-3 py-0.5 text-xs font-bold">
                                    {{ $m->activo ? 'Activo' : 'Inactivo' }}
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-col items-end gap-2 text-xs">
                            <button wire:click="editar({{ $m->id }})" class="font-semibold text-cyan-400 transition hover:text-cyan-300">Editar</button>
                            <button wire:click="toggleActivo({{ $m->id }})" class="text-slate-500 transition hover:text-cyan-300">
                                {{ $m->activo ? 'Desactivar' : 'Activar' }}
                            </button>
                              <button wire:click="confirmarEliminar({{ $m->id }})"
                                class="font-semibold text-red-400 transition hover:text-red-300">Eliminar</button>
                         </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center">
                        <p class="text-slate-500">Aún no hay miembros registrados.</p>
                        <button wire:click="toggleForm" class="mt-4 text-sm font-bold text-cyan-400 hover:text-cyan-300">
                            + Agregar el primero
                        </button>
                    </div>
                @endforelse
            </div>
        </section>
    </main>

   
   @if ($showModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">
        <div class="w-full max-w-xs rounded-md border border-cyan-400/20 bg-[#07101f] p-5 text-center shadow-[0_0_30px_rgba(34,211,238,.12)]">
            <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-cyan-400/10 text-cyan-300">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-sm font-bold text-white">{{ $modalMessage }}</p>
            <button wire:click="cerrarModal"
                class="mt-4 rounded-md bg-cyan-400 px-5 py-1.5 text-xs font-black text-[#05111f] transition hover:bg-cyan-300">
                Cerrar
            </button>
        </div>
    </div>
@endif


@if ($showDeleteModal)
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">
        <div class="w-full max-w-xs rounded-md border border-red-400/20 bg-[#07101f] p-5 text-center shadow-[0_0_30px_rgba(248,113,113,.1)]">
            <div class="mx-auto mb-3 flex h-10 w-10 items-center justify-center rounded-full bg-red-400/10 text-red-400">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </div>
            <p class="text-sm font-bold text-white">¿Eliminar a {{ $deleteNombre }}?</p>
            <p class="mt-1 text-xs text-slate-500">Esta acción no se puede deshacer.</p>
            <div class="mt-4 flex justify-center gap-3">
                <button wire:click="eliminar({{ $deleteId }})"
                    class="rounded-md bg-red-500 px-5 py-1.5 text-xs font-black text-white transition hover:bg-red-400">
                    Eliminar
                </button>
                <button wire:click="cancelarEliminar"
                    class="rounded-md border border-cyan-400/20 px-5 py-1.5 text-xs font-bold text-slate-400 transition hover:border-cyan-300 hover:text-white">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
@endif
</div>