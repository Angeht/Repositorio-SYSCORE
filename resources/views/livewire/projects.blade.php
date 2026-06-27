<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Proyectos</p>
                    <h1 class="max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                        Soluciones destacadas.
                    </h1>
                </div>

                <a href="{{ route('contact') }}" class="rounded-md border border-cyan-400/35 px-6 py-3 text-sm font-black text-cyan-300 transition hover:bg-cyan-400/10">
                    Iniciar proyecto
                </a>
            </div>

            <div class="mt-14 grid gap-7 lg:grid-cols-3">
                @foreach ([
                    ['titulo' => 'SysInventory', 'tipo' => 'Control de stock', 'texto' => 'Sistema para gestionar productos, entradas, salidas, alertas y reportes.'],
                    ['titulo' => 'CorePanel', 'tipo' => 'Dashboard administrativo', 'texto' => 'Panel para usuarios, roles, metricas, tablas dinamicas y control de informacion.'],
                    ['titulo' => 'DataFlow', 'tipo' => 'Gestion de procesos', 'texto' => 'Aplicacion para organizar solicitudes, estados, responsables y seguimiento.'],
                    ['titulo' => 'ClientHub', 'tipo' => 'CRM ligero', 'texto' => 'Gestion de clientes, contactos, oportunidades y historial de atencion.'],
                    ['titulo' => 'EduCore', 'tipo' => 'Plataforma academica', 'texto' => 'Modulo para cursos, estudiantes, contenidos y seguimiento academico.'],
                    ['titulo' => 'ReportLab', 'tipo' => 'Reportes gerenciales', 'texto' => 'Reportes visuales para analizar datos y apoyar decisiones del negocio.'],
                ] as $project)
                    <article class="group overflow-hidden rounded-md border border-cyan-400/10 bg-white/[0.03]">
                        <div class="flex h-52 items-center justify-center bg-[linear-gradient(135deg,rgba(34,211,238,.18),rgba(15,23,42,.65)),linear-gradient(rgba(34,211,238,.08)_1px,transparent_1px),linear-gradient(90deg,rgba(34,211,238,.08)_1px,transparent_1px)] bg-[size:auto,28px_28px,28px_28px]">
                            <span class="px-6 text-center text-4xl font-black text-cyan-300/80 transition group-hover:scale-105">{{ $project['titulo'] }}</span>
                        </div>
                        <div class="p-6">
                            <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">{{ $project['tipo'] }}</p>
                            <h2 class="mt-3 text-2xl font-black text-white">{{ $project['titulo'] }}</h2>
                            <p class="mt-4 leading-7 text-slate-400">{{ $project['texto'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
