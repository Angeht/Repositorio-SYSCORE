<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    @php
        $hasFilters = collect($lenguajes)->isNotEmpty()
            || collect($librerias)->isNotEmpty()
            || collect($libreriascss)->isNotEmpty();
    @endphp

    <main class="px-5 pb-24 pt-32 lg:px-10 lg:pt-36">
        <section class="mx-auto max-w-7xl">
            <div class="max-w-3xl">
                <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">
                    {{ $content['subtitle'] ?: 'Proyectos' }}
                </p>
                <h1 class="text-4xl font-black tracking-tight text-white sm:text-5xl lg:text-6xl">
                    {{ $content['title'] }}
                </h1>
                <p class="mt-5 max-w-2xl text-base leading-7 text-slate-400 sm:text-lg sm:leading-8">
                    {{ $content['body'] }}
                </p>
            </div>

            <div @class([
                'mt-12 grid gap-8',
                'xl:grid-cols-[260px_minmax(0,1fr)]' => $hasFilters,
            ])>
                @if ($hasFilters)
                    <aside class="self-start rounded-xl border border-cyan-400/15 bg-[#07101f] p-5 xl:sticky xl:top-28">
                        <div class="mb-6 border-b border-cyan-400/10 pb-5">
                            <p class="text-xs font-black uppercase tracking-[0.25em] text-cyan-300">Filtros</p>
                            <p class="mt-2 text-sm leading-6 text-slate-500">Selecciona las tecnologías que deseas consultar.</p>
                        </div>

                        <div class="grid gap-7 sm:grid-cols-3 xl:grid-cols-1">
                            @if (collect($lenguajes)->isNotEmpty())
                                <div>
                                    <p class="text-sm font-bold text-white">Lenguajes</p>
                                    <ul class="mt-4 flex flex-wrap gap-2.5">
                                        @foreach ($lenguajes as $lenguaje)
                                            <li>
                                                <label class="cursor-pointer" title="{{ $lenguaje['descripcion_lenguaje'] }}">
                                                    <input
                                                        type="checkbox"
                                                        wire:model.live="lenguajeSeleccionado"
                                                        value="{{ $lenguaje['idlenguaje'] }}"
                                                        aria-label="Filtrar por {{ $lenguaje['descripcion_lenguaje'] }}"
                                                        class="peer sr-only"
                                                    >
                                                    <span class="flex h-12 w-12 items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] transition hover:border-cyan-400 hover:bg-cyan-500/10 peer-checked:border-cyan-400 peer-checked:bg-cyan-500/20 peer-checked:ring-2 peer-checked:ring-cyan-400/40">
                                                        <x-tech-icon :path="$lenguaje['ruta_lenguaje']" :name="$lenguaje['descripcion_lenguaje']" />
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (collect($librerias)->isNotEmpty())
                                <div>
                                    <p class="text-sm font-bold text-white">Frameworks</p>
                                    <ul class="mt-4 flex flex-wrap gap-2.5">
                                        @foreach ($librerias as $lib)
                                            <li>
                                                <label class="cursor-pointer" title="{{ $lib['descripcion_libreria'] }}">
                                                    <input
                                                        type="checkbox"
                                                        wire:model.live="libreriaSeleccionada"
                                                        value="{{ $lib['idlibreria'] }}"
                                                        aria-label="Filtrar por {{ $lib['descripcion_libreria'] }}"
                                                        class="peer sr-only"
                                                    >
                                                    <span class="flex h-12 w-12 items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] transition hover:border-cyan-400 hover:bg-cyan-500/10 peer-checked:border-cyan-400 peer-checked:bg-cyan-500/20 peer-checked:ring-2 peer-checked:ring-cyan-400/40">
                                                        <x-tech-icon :path="$lib['ruta_libreria']" :name="$lib['descripcion_libreria']" />
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (collect($libreriascss)->isNotEmpty())
                                <div>
                                    <p class="text-sm font-bold text-white">Frameworks CSS</p>
                                    <ul class="mt-4 flex flex-wrap gap-2.5">
                                        @foreach ($libreriascss as $css)
                                            <li>
                                                <label class="cursor-pointer" title="{{ $css['descripcion_libreriacss'] }}">
                                                    <input
                                                        type="checkbox"
                                                        wire:model.live="libreriacssSeleccionada"
                                                        value="{{ $css['idlibreriacss'] }}"
                                                        aria-label="Filtrar por {{ $css['descripcion_libreriacss'] }}"
                                                        class="peer sr-only"
                                                    >
                                                    <span class="flex h-12 w-12 items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] transition hover:border-cyan-400 hover:bg-cyan-500/10 peer-checked:border-cyan-400 peer-checked:bg-cyan-500/20 peer-checked:ring-2 peer-checked:ring-cyan-400/40">
                                                        <x-tech-icon :path="$css['ruta_libreriacss']" :name="$css['descripcion_libreriacss']" />
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </aside>
                @endif

                <div class="min-w-0">
                    <div class="mb-6 flex flex-col items-start gap-3 border-b border-cyan-400/10 pb-4 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[0.25em] text-cyan-300">Portafolio</p>
                            <h2 class="mt-2 text-2xl font-black text-white">Proyectos disponibles</h2>
                        </div>
                        <p class="whitespace-nowrap text-sm font-semibold text-slate-500">
                            {{ $Project->total() }} {{ $Project->total() === 1 ? 'proyecto' : 'proyectos' }}
                        </p>
                    </div>

                    @if ($Project->isEmpty())
                        <div class="rounded-xl border border-dashed border-cyan-400/20 bg-[#07101f] px-6 py-14 text-center">
                            <p class="text-lg font-bold text-white">Proyectos en desarrollo</p>
                            <p class="mt-2 text-sm text-slate-500">Pronto publicaremos nuevos trabajos en esta sección.</p>
                        </div>
                    @else
                        <div @class([
                            'grid gap-6 md:grid-cols-2',
                            'xl:grid-cols-2' => $hasFilters,
                            'xl:grid-cols-3' => ! $hasFilters,
                        ])>
                            @foreach ($Project as $pro)
                                @php
                                    $hasImage = $pro['ruta']
                                        && \Illuminate\Support\Facades\Storage::disk('public')->exists($pro['ruta']);
                                    $hasTechnologies = $pro['lenguajes']->isNotEmpty()
                                        || $pro->librerias->isNotEmpty()
                                        || $pro->libreriascss->isNotEmpty();
                                @endphp

                                <article data-project-card class="group flex h-full flex-col overflow-hidden rounded-xl border border-cyan-400/15 bg-[#0f172a] shadow-lg shadow-cyan-950/20 transition duration-300 hover:-translate-y-1 hover:border-cyan-400/40 hover:shadow-xl hover:shadow-cyan-900/30">
                                    <div class="relative aspect-[16/9] overflow-hidden bg-[#07101f]">
                                        @if ($pro['link'])
                                            <a href="{{ $pro['link'] }}" target="_blank" rel="noopener noreferrer" class="block h-full w-full" aria-label="Abrir proyecto {{ $pro['title'] }}">
                                        @else
                                            <div class="h-full w-full">
                                        @endif
                                                @if ($hasImage)
                                                    <img
                                                        src="{{ asset('storage/'.$pro['ruta']) }}"
                                                        alt="{{ $pro['title'] }}"
                                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                                    >
                                                    <span class="absolute inset-0 bg-gradient-to-t from-[#030712]/55 via-transparent to-transparent"></span>
                                                @else
                                                    <span class="absolute inset-0 flex flex-col items-center justify-center gap-3 bg-[linear-gradient(rgba(34,211,238,.045)_1px,transparent_1px),linear-gradient(90deg,rgba(34,211,238,.045)_1px,transparent_1px)] bg-[size:28px_28px] text-cyan-300">
                                                        <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25z" />
                                                        </svg>
                                                        <span class="text-xs font-bold uppercase tracking-[0.2em]">Sin imagen</span>
                                                    </span>
                                                @endif
                                        @if ($pro['link'])
                                            </a>
                                        @else
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex flex-1 flex-col p-5">
                                        <h2 class="text-xl font-black leading-tight text-white">
                                            {{ $pro['title'] }}
                                        </h2>

                                        @if ($hasTechnologies)
                                            <div class="mt-4">
                                                <p class="text-[10px] font-black uppercase tracking-[0.22em] text-cyan-300">Tecnologías</p>
                                                <ul class="mt-3 flex flex-wrap gap-2">
                                                    @foreach ($pro['lenguajes'] as $lenguaje)
                                                        <li class="flex h-10 w-10 items-center justify-center rounded-lg border border-cyan-400/15 bg-[#030712]" title="{{ $lenguaje['descripcion_lenguaje'] }}">
                                                            <x-tech-icon :path="$lenguaje['ruta_lenguaje']" :name="$lenguaje['descripcion_lenguaje']" />
                                                        </li>
                                                    @endforeach
                                                    @foreach ($pro->librerias as $libreria)
                                                        <li class="flex h-10 w-10 items-center justify-center rounded-lg border border-cyan-400/15 bg-[#030712]" title="{{ $libreria['descripcion_libreria'] }}">
                                                            <x-tech-icon :path="$libreria['ruta_libreria']" :name="$libreria['descripcion_libreria']" />
                                                        </li>
                                                    @endforeach
                                                    @foreach ($pro->libreriascss as $css)
                                                        <li class="flex h-10 w-10 items-center justify-center rounded-lg border border-cyan-400/15 bg-[#030712]" title="{{ $css['descripcion_libreriacss'] }}">
                                                            <x-tech-icon :path="$css['ruta_libreriacss']" :name="$css['descripcion_libreriacss']" />
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <p class="mt-4 line-clamp-3 text-sm leading-6 text-slate-400">
                                            {{ preg_replace('/\.(?=\S)/', '. ', $pro['descripcion']) }}
                                        </p>

                                        @if ($pro['link'])
                                            <a href="{{ $pro['link'] }}" target="_blank" rel="noopener noreferrer" class="mt-5 inline-flex items-center gap-2 self-start text-sm font-black text-cyan-300 transition hover:text-cyan-200">
                                                Ver proyecto
                                                <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        @if ($Project->hasPages())
                            <div class="mt-8">
                                {{ $Project->links() }}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
