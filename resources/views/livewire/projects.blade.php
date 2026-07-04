<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $content['subtitle'] ?: 'Proyectos' }}</p>
                    <h1 class="max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                        {{ $content['title'] }}
                    </h1>
                    <p class="mt-8 max-w-2xl text-lg leading-8 text-slate-400">
                        {{ $content['body'] }}
                    </p>
                </div>
            </div>
            <section class="mx-auto max-w-7xl grid gap-7 lg:grid-cols-3">
                <div class="lg:col-span-1">
                    <div class="mt-14 grid gap-7 lg:grid-cols-1">
                        <p class="text-slate-400 text-white">Lenguajes de Programacion</p>
                        <select wire:model.live="lenguajeSeleccionado" class="h-10 w-50 rounded border border-cyan-400/40 bg-[#030712] text-cyan-400 focus:ring-2 focus:ring-cyan-400 focus:ring-offset-0">
                            <option value="">Seleccione un lenguaje</option>
                            @foreach($lenguajes as $lenguaje)
                            <option class="text-slate-400 text-white" value="{{ $lenguaje['idlenguaje'] }}">
                                {{ $lenguaje['descripcion_lenguaje'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-14 grid gap-7 lg:grid-cols-1">
                        <p class="text-slate-400 text-white">Frameworks</p>
                        <select wire:model.live="libreriaSeleccionada" class="h-10 w-50 rounded border border-cyan-400/40 bg-[#030712] text-cyan-400 focus:ring-2 focus:ring-cyan-400 focus:ring-offset-0">
                            <option value="">Seleccione una Framework</option>
                            @foreach($librerias as $lib)
                            <option class="text-slate-400 text-white" value="{{ $lib['idlibreria'] }}">
                                {{ $lib['descripcion_libreria'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-14 grid gap-7 lg:grid-cols-1">
                        <p class="text-slate-400 text-white">Frameworks Css</p>
                        <select wire:model.live="libreriacssSeleccionada" class="h-10 w-50 rounded border border-cyan-400/40 bg-[#030712] text-cyan-400 focus:ring-2 focus:ring-cyan-400 focus:ring-offset-0">
                            <option value="">Seleccione un Framework Css</option>
                            @foreach($libreriascss as $css)
                            <option class="text-slate-400 text-white" value="{{ $css['idlibreriacss'] }}">
                                {{ $css['descripcion_libreriacss'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    @if (!$project)
                    <p class="text-slate-400 text-white">Proyectos en desarrollo</p>
                    @endif
                    @foreach ($project as $pro)
                    <div class="border-b border-cyan-400/10 p-5">
                        <h2 class="text-2xl font-bold text-white">
                            {{ $pro['title'] }}
                        </h2>
                    </div>

                    <div class="h-56 bg-[#111827] flex items-center justify-center">
                        @if($pro['img'])
                        <img
                            src="{{ asset('storage/' . $pro['imagen']) }}"
                            alt="{{ $pro['title'] }}"
                            class="h-full w-full object-cover">
                        @else
                        <span class="text-cyan-300 text-lg font-semibold">
                            Sin imagen
                        </span>
                        @endif
                    </div>

                    <div class="border-b border-cyan-400/10 p-5">
                        <h3 class="mb-3 text-sm font-bold uppercase tracking-widest text-cyan-300">
                            Recursos
                        </h3>
                    </div>
                    <div class="p-5">
                        <h3 class="mb-3 text-sm font-bold uppercase tracking-widest text-cyan-300">
                            Descripción
                        </h3>

                        <p class="leading-7 text-slate-400">
                            {{ $pro['descripcion'] }}
                        </p>
                    </div>

                    @endforeach
                </div>
            </section>
        </section>
    </main>

    @include('partials.footer')
</div>