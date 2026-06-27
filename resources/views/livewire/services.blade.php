<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl">
            <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Servicios</p>
            <h1 class="max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                Desarrollo de sistemas y experiencias digitales.
            </h1>

            <div class="mt-14 grid gap-6 md:grid-cols-3">
                @foreach ([
                    ['titulo' => 'Aplicaciones Web', 'texto' => 'Plataformas a medida para administrar informacion, usuarios, reportes y procesos.'],
                    ['titulo' => 'Sistemas Internos', 'texto' => 'Herramientas para inventario, ventas, solicitudes, control y seguimiento operacional.'],
                    ['titulo' => 'Sitios Corporativos', 'texto' => 'Paginas modernas para presentar servicios, proyectos, equipo y canales de contacto.'],
                    ['titulo' => 'Dashboards', 'texto' => 'Paneles administrativos con metricas, filtros, tablas y gestion centralizada.'],
                    ['titulo' => 'Automatizacion', 'texto' => 'Flujos que reducen tareas repetitivas y conectan datos entre areas.'],
                    ['titulo' => 'Mantenimiento', 'texto' => 'Mejoras, correcciones, soporte tecnico y evolucion de sistemas existentes.'],
                ] as $service)
                    <article class="rounded-md border border-cyan-400/10 bg-[#07101f] p-7 transition hover:border-cyan-300/40 hover:bg-[#081629]">
                        <div class="mb-8 h-1 w-12 rounded-full bg-cyan-400"></div>
                        <h2 class="text-2xl font-black text-white">{{ $service['titulo'] }}</h2>
                        <p class="mt-5 leading-7 text-slate-400">{{ $service['texto'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
