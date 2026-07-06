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
                        <p class="text-xl font-semibold text-white">Lenguajes de Programacion</p>
                        <ul class="flex flex-wrap gap-4">
                            @foreach($lenguajes as $lenguaje)
                            <li>
                                <label class="cursor-pointer">

                                    <input
                                        type="checkbox"
                                        wire:model.live="lenguajeSeleccionado"
                                        value="{{ $lenguaje->idlenguaje }}"
                                        class="peer sr-only">

                                    <div
                                        class="flex aspect-square w-16 items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] transition-all duration-200
                           hover:border-cyan-400 hover:bg-cyan-500/10
                           peer-checked:border-cyan-400
                           peer-checked:bg-cyan-500/20
                           peer-checked:ring-2
                           peer-checked:ring-cyan-400">

                                        <img
                                            src="{{ asset('storage/' . $lenguaje->ruta_lenguaje) }}"
                                            alt="{{ $lenguaje->descripcion_lenguaje }}"
                                            title="{{ $lenguaje->descripcion_lenguaje }}"
                                            class="h-8 w-8 object-contain">
                                    </div>

                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-14 grid gap-7 lg:grid-cols-1">
                        <p class="text-xl font-semibold text-white">Frameworks</p>
                        <ul class="flex flex-wrap gap-4">
                            @foreach($librerias as $lib)
                            <li>
                                <label class="cursor-pointer">

                                    <input
                                        type="checkbox"
                                        wire:model.live="libreriaSeleccionada"
                                        value="{{ $lib->idlibreria }}"
                                        class="peer sr-only">

                                    <div
                                        class="flex aspect-square w-16 items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] transition-all duration-200
                           hover:border-cyan-400 hover:bg-cyan-500/10
                           peer-checked:border-cyan-400
                           peer-checked:bg-cyan-500/20
                           peer-checked:ring-2
                           peer-checked:ring-cyan-400">

                                        <img
                                            src="{{ asset('storage/' . $lib->ruta_libreria) }}"
                                            alt="{{ $lib->descripcion_libreria }}"
                                            title="{{ $lib->descripcion_libreria }}"
                                            class="h-8 w-8 object-contain">

                                    </div>

                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-14 grid gap-7 lg:grid-cols-1">
                        <p class="text-xl font-semibold text-white">Frameworks Css</p>
                        <ul class="flex flex-wrap gap-4">
                            @foreach($libreriascss as $css)
                            <li>
                                <label class="cursor-pointer">

                                    <input
                                        type="checkbox"
                                        wire:model.live="libreriacssSeleccionada"
                                        value="{{ $css->idlibreriacss }}"
                                        class="peer sr-only">

                                    <div
                                        class="flex aspect-square w-16 items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] transition-all duration-200
                           hover:border-cyan-400 hover:bg-cyan-500/10
                           peer-checked:border-cyan-400
                           peer-checked:bg-cyan-500/20
                           peer-checked:ring-2
                           peer-checked:ring-cyan-400">

                                        <img
                                            src="{{ asset('storage/' . $css->ruta_libreriacss) }}"
                                            alt="{{ $css->descripcion_libreriacss }}"
                                            title="{{ $css->descripcion_libreriacss }}"
                                            class="h-8 w-8 object-contain">

                                    </div>

                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-2 overflow-hidden">
                    @if (!$project)
                    <p class="text-slate-400 text-white">Proyectos en desarrollo</p>
                    @endif

                    <div class="space-y-8">
                        @foreach ($project as $pro)

                        <div class="overflow-hidden rounded-xl border border-cyan-400/20 bg-[#0f172a]
                        shadow-xl shadow-cyan-900/30
                        transition-all duration-300
                        hover:border-cyan-400/50
                        hover:shadow-2xl hover:shadow-cyan-500/20">

                            <div class="border-b border-cyan-400/10 p-5">
                                <h2 class="text-2xl font-bold text-white">
                                    {{ $pro['title'] }}
                                </h2>
                            </div>

                            <div class="h-56 bg-[#111827]">
                                @if($pro['img'])
                                <img
                                    src="{{ asset('storage/' . $pro['ruta']) }}"
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
                                    Tecnologias
                                </h3>

                                <ul class="flex flex-wrap gap-4">
                                    @foreach($pro->lenguajes as $lenguaje)
                                    <li>
                                        <button class="flex items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] p-3 transition hover:border-cyan-400 hover:bg-cyan-500/10">

                                            <img
                                                src="{{ asset('storage/' . $lenguaje->ruta_lenguaje) }}"
                                                alt="{{ $lenguaje->descripcion_lenguaje }}"
                                                title="{{ $lenguaje->descripcion_lenguaje }}"
                                                class="h-8 w-8 object-contain">

                                        </button>
                                    </li>
                                    @endforeach
                                    @foreach($pro->librerias as $libreria)
                                    <li>
                                        <button class="flex items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] p-3 transition hover:border-cyan-400 hover:bg-cyan-500/10">

                                            <img
                                                src="{{ asset('storage/' . $libreria->ruta_libreria) }}"
                                                alt="{{ $libreria->descripcion_libreria }}"
                                                title="{{ $libreria->descripcion_libreria }}"
                                                class="h-8 w-8 object-contain">

                                        </button>
                                    </li>
                                    @endforeach
                                    @foreach($pro->libreriascss as $css)
                                    <li>
                                        <button class="flex items-center justify-center rounded-lg border border-cyan-400/20 bg-[#030712] p-3 transition hover:border-cyan-400 hover:bg-cyan-500/10">

                                            <img
                                                src="{{ asset('storage/' . $css->ruta_libreriacss) }}"
                                                alt="{{ $css->descripcion_libreriacss }}"
                                                title="{{ $css->descripcion_libreriacss }}"
                                                class="h-8 w-8 object-contain">

                                        </button>
                                    </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div class="p-5">
                                <h3 class="mb-3 text-sm font-bold uppercase tracking-widest text-cyan-300">
                                    Descripción
                                </h3>

                                <ul class="space-y-2 text-slate-400">
                                    @foreach(explode('.', $pro->descripcion) as $item)
                                    @if(trim($item) != '')
                                    <li class="flex items-start gap-2">
                                        <span class="mt-1 text-cyan-400">•</span>
                                        <span>{{ trim($item) }}</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        @endforeach

                        <div class="mt-8">
                            {{ $project->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    @include('partials.footer')
</div>