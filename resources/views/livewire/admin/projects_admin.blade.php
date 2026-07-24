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
                    class="flex w-full items-center rounded-md bg-white/[0.03] px-4 py-3 text-slate-300 transition hover:bg-cyan-400/10 hover:text-cyan-200">
                    <div>
                        <span class="block text-xs font-black uppercase tracking-[0.2em]">equipo</span>
                        <span class="mt-1 block text-sm font-semibold">Miembros</span>
                    </div>
                </a>
                <a href="{{ route('admin.proyectos') }}"
                    class="flex w-full items-center rounded-md bg-cyan-400 px-4 py-3 text-[#05111f]">
                    <div>
                        <span class="block text-xs font-black uppercase tracking-[0.2em]">proyectos</span>
                        <span class="mt-1 block text-sm font-semibold">Gestión</span>
                    </div>
                </a>
            </div>
        </aside>

        <section class="rounded-md border border-cyan-400/10 bg-[#07101f] p-6 md:p-8">

            <!-- CONTENIDO -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">Gestión</p>
                    <h1 class="mt-3 text-3xl font-black text-white">Proyectos</h1>
                </div>

                <button wire:click="toggleForm"
                    class="rounded-md bg-cyan-400 px-5 py-2 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                    {{ $showForm ? '✕ Cancelar' : '+ Agregar Proyecto' }}
                </button>
            </div>

            <!-- MOSTRAR -->
            @if ($showForm)
            <div class="mb-8 rounded-md border border-cyan-400/10 bg-black/20 p-5">
                <p class="mb-4 text-xs font-bold uppercase tracking-widest text-cyan-300">
                    {{ $ProjectId ? 'Editar proyecto' : 'Nuevo proyecto' }}
                </p>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Titulo</label>
                        <input type="text" wire:model="title"
                            class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300">
                        @error('title') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Imagen</label>
                        <input type="file" wire:model="ruta" class="w-full text-slate-400">
                        @error('ruta') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                        @if ($ruta)
                        <img src="{{ $ruta->temporaryUrl() }}" class="mt-3 h-16 w-16 rounded-full object-cover ring-2 ring-cyan-400/30">
                        @elseif($currentImg)
                        <img src="{{ asset('storage/'.$currentImg) }}" class="mt-3 h-16 w-16 rounded-full object-cover ring-2 ring-cyan-400/30">
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Descripción</label>
                    <textarea wire:model="descripcion" rows="3"
                        class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300"></textarea>
                </div>

                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Link</label>
                        <input type="text" wire:model="link"
                            class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3 text-white outline-none transition focus:border-cyan-300">
                        @error('link') <span class="mt-1 text-xs text-red-400">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="mt-4 grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Lenguajes</label>

                        <div class="grid grid-cols-3 gap-2">
                            @foreach($lenguajes as $lenguaje)
                            <label class="flex items-center gap-2" for="lenguaje-{{ $lenguaje->idlenguaje }}">
                                <input
                                    type="checkbox"
                                    value="{{ $lenguaje->idlenguaje }}"
                                    wire:model="lenguajesSeleccionados"
                                    id="lenguaje-{{ $lenguaje->idlenguaje }}">

                                <span>
                                    {{ $lenguaje->descripcion_lenguaje }}
                                </span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Librerías</label>

                        <div class="grid grid-cols-3 gap-2">
                            @foreach($librerias as $libreria)

                            <label class="flex items-center gap-2" for="libreria-{{ $libreria->idlibreria }}">
                                <input
                                    type="checkbox"
                                    value="{{ $libreria->idlibreria }}"
                                    wire:model="libreriasSeleccionadas"
                                    id="libreria-{{ $libreria->idlibreria }}">

                                <span>
                                    {{ $libreria->descripcion_libreria }}
                                </span>
                            </label>

                            @endforeach
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-xs font-semibold uppercase tracking-wider text-slate-500">Librerías CSS</label>

                        <div class="grid grid-cols-3 gap-2">
                            @foreach($libreriascss as $css)

                            <label class="flex items-center gap-2" for="css-{{ $lenguaje->idlenguaje }}">
                                <input
                                    type="checkbox"
                                    value="{{ $css->idlibreriacss }}"
                                    wire:model="libreriasCssSeleccionadas"
                                    id="css-{{ $css->idlibreriacss }}">

                                <span>
                                    {{ $css->descripcion_libreriacss }}
                                </span>
                            </label>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="mt-5 flex gap-3">
                    <button wire:click="guardarProject"
                        class="rounded-md bg-cyan-400 px-6 py-2 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                        {{ $ProjectId ? 'Actualizar' : 'Agregar' }}
                    </button>
                    <button wire:click="toggleForm"
                        class="rounded-md border border-cyan-400/20 px-6 py-2 text-sm font-bold text-slate-400 transition hover:border-cyan-300 hover:text-white">
                        Cancelar
                    </button>
                </div>
            </div>
            @endif


            <!-- LISTADO -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                @forelse ($Projects as $p)
                <div class="flex items-start justify-between rounded-md border border-cyan-400/10 bg-black/20 p-5 transition hover:border-cyan-400/30">
                    <div class="flex items-start gap-4">
                        @if ($p->ruta)
                        <img src="{{ asset('storage/'.$p->ruta) }}" class="h-12 w-12 rounded-md object-cover ring-2 ring-cyan-400/20">
                        @else
                        <div class="flex h-12 w-12 items-center justify-center rounded-md bg-cyan-400/10 text-sm font-black text-cyan-300 ring-2 ring-cyan-400/20">
                            {{ collect(explode(' ', $p->title))->map(fn($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                        </div>
                        @endif
                        <div>
                            <p class="font-bold text-white">{{ $p->title }}</p>
                            <p class="text-sm text-slate-400">{{ $p->descripcion }}</p>
                            <ul class="flex flex-wrap gap-4">
                                @foreach($p['lenguajes'] as $lenguaje)
                                <li>
                                    <button class="flex items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] p-3 transition hover:border-cyan-400 hover:bg-cyan-500/10">

                                        <img
                                            src="{{ asset('storage/' . $lenguaje['ruta_lenguaje']) }}"
                                            alt="{{ $lenguaje['descripcion_lenguaje'] }}"
                                            title="{{ $lenguaje['descripcion_lenguaje'] }}"
                                            class="h-8 w-8 object-contain">

                                    </button>
                                </li>
                                @endforeach
                                @foreach($p->librerias as $libreria)
                                <li>
                                    <button class="flex items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] p-3 transition hover:border-cyan-400 hover:bg-cyan-500/10">

                                        <img
                                            src="{{ asset('storage/' . $libreria['ruta_libreria']) }}"
                                            alt="{{ $libreria['descripcion_libreria'] }}"
                                            title="{{ $libreria['descripcion_libreria'] }}"
                                            class="h-8 w-8 object-contain">

                                    </button>
                                </li>
                                @endforeach
                                @foreach($p->libreriascss as $css)
                                <li>
                                    <button class="flex items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] p-3 transition hover:border-cyan-400 hover:bg-cyan-500/10">

                                        <img
                                            src="{{ asset('storage/' . $css['ruta_libreriacss']) }}"
                                            alt="{{ $css['descripcion_libreriacss'] }}"
                                            title="{{ $css['descripcion_libreriacss'] }}"
                                            class="h-8 w-8 object-contain">

                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-end gap-2 text-xs">
                        <button wire:click="actualizarProject({{ $p->idproject }})" class="font-semibold text-cyan-400 transition hover:text-cyan-300">Editar</button>
                        <button wire:click="confirmarEliminar({{ $p->idproject }})"
                            class="font-semibold text-red-400 transition hover:text-red-300">Eliminar</button>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-12 text-center">
                    <p class="text-slate-500">Aún no hay proyectos registrados.</p>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>
            <p class="text-sm font-bold text-white">¿Eliminar a {{ $deleteProject }}?</p>
            <p class="mt-1 text-xs text-slate-500">Esta acción no se puede deshacer.</p>
            <div class="mt-4 flex justify-center gap-3">
                <button wire:click="eliminarProject({{ $deleteId }})"
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