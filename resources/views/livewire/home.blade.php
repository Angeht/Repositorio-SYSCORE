<div class="min-h-screen overflow-hidden bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main>
        <section class="relative flex min-h-screen items-center justify-center px-5 pt-24">
            <div class="absolute inset-0 bg-[linear-gradient(rgba(34,211,238,.055)_1px,transparent_1px),linear-gradient(90deg,rgba(34,211,238,.055)_1px,transparent_1px)] bg-[size:52px_52px]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(8,145,178,.22),transparent_34rem)]"></div>
            <div class="absolute inset-x-0 top-24 mx-auto h-64 max-w-4xl bg-cyan-400/10 blur-[110px]"></div>

            <div class="relative mx-auto max-w-5xl text-center">
                <div class="mb-12 inline-flex items-center gap-3 rounded-full border border-cyan-400/20 bg-cyan-400/10 px-6 py-3 text-[11px] font-bold uppercase tracking-[0.35em] text-cyan-300">
                    <span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_16px_rgba(34,211,238,.9)]"></span>
                    Ingenieria de sistemas e informatica
                </div>

                <h1 class="text-6xl font-black leading-none tracking-tight text-white sm:text-7xl md:text-8xl lg:text-9xl">
                    Sys<span class="text-cyan-400 drop-shadow-[0_0_28px_rgba(34,211,238,.45)]">Core</span>
                </h1>

                <h2 class="mt-12 text-4xl font-black tracking-tight text-slate-300 md:text-6xl">
                    Dev Team
                </h2>

                <p class="mx-auto mt-10 max-w-3xl text-xl leading-8 text-slate-300 md:text-2xl">
                    Ingenieria que transforma procesos en soluciones digitales.
                </p>

                <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-slate-500">
                    Analizamos, disenamos y desarrollamos sistemas funcionales orientados a necesidades reales,
                    desde el levantamiento de requerimientos hasta el soporte en produccion.
                </p>

                <div class="mt-14 flex flex-wrap items-center justify-center gap-5">
                    <a href="{{ route('projects') }}" class="rounded-md bg-cyan-400 px-8 py-4 text-sm font-black text-[#05111f] shadow-[0_0_30px_rgba(34,211,238,.28)] transition hover:bg-cyan-300">
                        Ver Proyectos
                    </a>

                    <a href="{{ route('contact') }}" class="rounded-md border border-cyan-400/35 px-8 py-4 text-sm font-black text-cyan-300 transition hover:bg-cyan-400/10">
                        Contactanos
                    </a>
                </div>
            </div>
        </section>

        <section class="border-t border-cyan-400/10 px-5 py-20">
            <div class="mx-auto grid max-w-7xl gap-5 md:grid-cols-3">
                @foreach ([
                    ['titulo' => 'Servicios', 'texto' => 'Aplicaciones web, sistemas internos y sitios corporativos.', 'ruta' => route('services')],
                    ['titulo' => 'Proyectos', 'texto' => 'Soluciones digitales pensadas para procesos reales.', 'ruta' => route('projects')],
                    ['titulo' => 'Tecnologias', 'texto' => 'Laravel, Livewire, PHP, MySQL, Tailwind CSS y mas.', 'ruta' => route('technologies')],
                ] as $item)
                    <a href="{{ $item['ruta'] }}" class="rounded-md border border-cyan-400/10 bg-[#07101f] p-7 transition hover:border-cyan-300/40 hover:bg-[#081629]">
                        <div class="mb-8 h-1 w-12 rounded-full bg-cyan-400"></div>
                        <h3 class="text-2xl font-black text-white">{{ $item['titulo'] }}</h3>
                        <p class="mt-5 leading-7 text-slate-400">{{ $item['texto'] }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
