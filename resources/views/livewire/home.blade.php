<div class="min-h-screen overflow-hidden bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main>
        <section class="relative flex min-h-screen items-center justify-center px-5 pt-24">
            <div class="tech-grid absolute inset-0 bg-[linear-gradient(rgba(34,211,238,.055)_1px,transparent_1px),linear-gradient(90deg,rgba(34,211,238,.055)_1px,transparent_1px)] bg-[size:52px_52px]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(8,145,178,.22),transparent_34rem)]"></div>
            <div class="pulse-core absolute inset-x-0 top-24 mx-auto h-64 max-w-4xl bg-cyan-400/10 blur-[110px]"></div>
            <div class="scan-line absolute left-0 right-0 top-1/3 h-px bg-cyan-300/30"></div>
            <div class="absolute left-[8%] top-32 hidden h-28 w-px bg-gradient-to-b from-transparent via-cyan-300/40 to-transparent md:block"></div>
            <div class="absolute bottom-32 right-[10%] hidden h-36 w-px bg-gradient-to-b from-transparent via-cyan-300/30 to-transparent md:block"></div>

            <div class="fade-up relative mx-auto max-w-5xl text-center">
                <div class="mb-12 inline-flex items-center gap-3 rounded-full border border-cyan-400/20 bg-cyan-400/10 px-6 py-3 text-[11px] font-bold uppercase tracking-[0.35em] text-cyan-300">
                    <span class="h-2 w-2 rounded-full bg-cyan-300 shadow-[0_0_16px_rgba(34,211,238,.9)]"></span>
                    {{ $hero['items']['eyebrow'] ?? 'Ingenieria de sistemas e informatica' }}
                </div>

                <h1 class="text-6xl font-black leading-none tracking-tight text-white sm:text-7xl md:text-8xl lg:text-9xl">
                    {{ str($hero['title'])->before('Core') }}<span class="text-cyan-400 drop-shadow-[0_0_28px_rgba(34,211,238,.45)]">{{ str($hero['title'])->contains('Core') ? 'Core' : '' }}</span>
                </h1>

                <h2 class="mt-12 text-4xl font-black tracking-tight text-slate-300 md:text-6xl">
                    {{ $hero['subtitle'] }}
                </h2>

                <p class="mx-auto mt-10 max-w-3xl text-xl leading-8 text-slate-300 md:text-2xl">
                    {{ $hero['body'] }}
                </p>

                <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-slate-500">
                    {{ $hero['items']['description'] ?? '' }}
                </p>

                <div class="mt-14 flex flex-wrap items-center justify-center gap-5">
                    <a href="{{ $hero['button_url'] ?: route('projects') }}" class="rounded-md bg-cyan-400 px-8 py-4 text-sm font-black text-[#05111f] shadow-[0_0_30px_rgba(34,211,238,.28)] transition hover:bg-cyan-300">
                        {{ $hero['button_text'] ?: 'Ver Proyectos' }}
                    </a>

                    <a href="{{ route('contact') }}" class="rounded-md border border-cyan-400/35 px-8 py-4 text-sm font-black text-cyan-300 transition hover:bg-cyan-400/10">
                        Contactanos
                    </a>
                </div>
            </div>
        </section>

        <section class="border-t border-cyan-400/10 px-5 py-20">
            <div class="mx-auto max-w-7xl">
                <div class="mb-12 max-w-3xl">
                    <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $quickLinks['subtitle'] ?: 'Accesos principales' }}</p>
                    <h2 class="text-4xl font-black tracking-tight text-white md:text-5xl">{{ $quickLinks['title'] }}</h2>
                    <p class="mt-5 leading-8 text-slate-400">{{ $quickLinks['body'] }}</p>
                </div>

                <div class="grid gap-5 md:grid-cols-3">
                @foreach ($quickLinks['items'] as $item)
                    <a href="{{ $item['ruta'] ?? '#' }}" class="group rounded-md border border-cyan-400/10 bg-[#07101f] p-7 transition hover:-translate-y-1 hover:border-cyan-300/40 hover:bg-[#081629]">
                        <div class="mb-8 h-1 w-12 rounded-full bg-cyan-400"></div>
                        <h3 class="text-2xl font-black text-white transition group-hover:text-cyan-200">{{ $item['titulo'] ?? '' }}</h3>
                        <p class="mt-5 leading-7 text-slate-400">{{ $item['texto'] }}</p>
                    </a>
                @endforeach
                </div>
            </div>
        </section>

        <section class="relative border-t border-cyan-400/10 px-5 py-24">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(34,211,238,.08),transparent_25rem)]"></div>
            <div class="relative mx-auto grid max-w-7xl gap-10 lg:grid-cols-[1fr_0.8fr] lg:items-center">
                <div>
                    <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $metrics['subtitle'] ?: 'Impacto' }}</p>
                    <h2 class="max-w-4xl text-4xl font-black tracking-tight text-white md:text-5xl">
                        {{ $metrics['title'] }}
                    </h2>
                    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-400">
                        {{ $metrics['body'] }}
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
                    @foreach ($metrics['items'] as $metric)
                        <div class="rounded-md border border-cyan-400/10 bg-white/[0.03] p-6">
                            <p class="text-4xl font-black text-cyan-300">{{ $metric['numero'] ?? '' }}</p>
                            <p class="mt-2 font-semibold text-slate-300">{{ $metric['texto'] ?? '' }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
