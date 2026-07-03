<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="relative overflow-hidden">
        {{-- Glow de fondo --}}
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-40 left-1/2 h-[38rem] w-[38rem] -translate-x-1/2 rounded-full bg-cyan-500/10 blur-[120px]"></div>
            <div class="absolute bottom-0 right-0 h-[26rem] w-[26rem] rounded-full bg-cyan-400/5 blur-[110px]"></div>
        </div>

        {{-- Hero --}}
        <section class="mx-auto max-w-7xl px-5 pt-36 lg:px-10">
            <div class="grid gap-14 lg:grid-cols-[1.15fr_0.85fr] lg:items-center">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-cyan-400/20 bg-cyan-400/5 px-4 py-1.5 text-[11px] font-bold uppercase tracking-[0.3em] text-cyan-300">
                        <span class="h-1.5 w-1.5 rounded-full bg-cyan-300"></span>
                        {{ $content['subtitle'] ?: 'Nosotros' }}
                    </span>

                    <h1 class="mt-6 max-w-4xl text-5xl font-black leading-[1.05] tracking-tight text-white md:text-7xl">
                        {{ $content['title'] ?: 'Construimos software claro para problemas reales.' }}
                    </h1>

                    <p class="mt-8 max-w-2xl text-lg leading-8 text-slate-400">
                        {{ $content['body'] }}
                    </p>

                    <div class="mt-10 flex flex-wrap gap-4">
                        <a href="{{ route('projects') }}" class="rounded-md bg-cyan-400 px-6 py-3 text-sm font-black text-[#05111f] shadow-[0_0_28px_rgba(34,211,238,.28)] transition hover:bg-cyan-300">
                            Ver proyectos
                        </a>
                        <a href="{{ route('contact') }}" class="rounded-md border border-cyan-400/30 px-6 py-3 text-sm font-bold text-cyan-300 transition hover:border-cyan-300 hover:bg-cyan-400/10">
                            Escríbenos
                        </a>
                    </div>
                </div>

                {{-- Tarjeta de sello / firma tecnica --}}
                <div class="relative rounded-xl border border-cyan-400/10 bg-[#07101f] p-8 shadow-[0_0_60px_rgba(8,20,40,.6)]">
                    <div class="flex items-center gap-3 border-b border-cyan-400/10 pb-6">
                        <span class="flex h-11 w-11 items-center justify-center rounded-md bg-cyan-400 text-lg font-black text-[#06111f] shadow-[0_0_28px_rgba(34,211,238,.35)]">
                            &gt;_
                        </span>
                        <div>
                            <p class="text-sm font-black tracking-tight text-white">Sys<span class="text-cyan-400">Core</span></p>
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Dev Team</p>
                        </div>
                    </div>

                    <dl class="mt-6 grid grid-cols-2 gap-6">
                        @foreach ($stats as $stat)
                            <div>
                                <dt class="text-3xl font-black text-cyan-300">{{ $stat['value'] }}</dt>
                                <dd class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">{{ $stat['label'] }}</dd>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </section>

        {{-- Valores --}}
        <section class="mx-auto max-w-7xl px-5 pt-28 lg:px-10">
            <p class="text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Lo que nos define</p>
            <h2 class="mt-4 max-w-2xl text-3xl font-black tracking-tight text-white md:text-4xl">
                Principios que guian cada linea de codigo.
            </h2>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($values as $value)
                    <article class="group rounded-md border border-cyan-400/10 bg-[#07101f] p-7 transition hover:border-cyan-300/40 hover:bg-[#081629]">
                        <div class="flex h-12 w-12 items-center justify-center rounded-md border border-cyan-400/20 bg-cyan-400/5 text-cyan-300 transition group-hover:border-cyan-300/50">
                            {!! $value['icon'] !!}
                        </div>
                        <h3 class="mt-6 text-xl font-black text-white">{{ $value['title'] }}</h3>
                        <p class="mt-3 leading-7 text-slate-400">{{ $value['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Metodo de trabajo (proceso creativo por etapas) --}}
        <section class="mx-auto max-w-7xl px-5 pt-28 lg:px-10">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Metodo de trabajo</p>
                    <h2 class="mt-4 max-w-2xl text-3xl font-black tracking-tight text-white md:text-4xl">
                        Cinco etapas, del requerimiento a produccion.
                    </h2>
                </div>
                <p class="max-w-sm leading-7 text-slate-400">
                    Cada etapa tiene un objetivo claro y un entregable definido, para que sepas
                    exactamente en que punto esta tu proyecto.
                </p>
            </div>

            {{-- Barra de progreso de etapas --}}
            @php $total = count($content['items']); @endphp
            <div class="mt-12 grid gap-5 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($content['items'] as $index => $step)
                    @php $meta = $stepsMeta[\Illuminate\Support\Str::lower($step)] ?? []; @endphp
                    <article class="group relative flex h-full flex-col overflow-hidden rounded-xl border border-cyan-400/10 bg-[#07101f] p-6 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/40 hover:bg-[#081629] hover:shadow-[0_0_40px_rgba(34,211,238,.12)]">
                        {{-- Numero gigante de fondo --}}
                        <span class="pointer-events-none absolute -right-3 -top-5 text-8xl font-black leading-none text-cyan-400/5 transition group-hover:text-cyan-400/10">
                            {{ $index + 1 }}
                        </span>

                        {{-- Icono --}}
                        <div class="relative flex h-12 w-12 items-center justify-center rounded-lg border border-cyan-400/20 bg-cyan-400/5 text-cyan-300 transition group-hover:border-cyan-300/50 group-hover:bg-cyan-400/10">
                            {!! $meta['icon'] ?? '' !!}
                        </div>

                        {{-- Etiqueta de paso --}}
                        <p class="relative mt-6 text-[11px] font-bold uppercase tracking-[0.25em] text-cyan-300/70">
                            Etapa {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} / {{ str_pad($total, 2, '0', STR_PAD_LEFT) }}
                        </p>
                        <h3 class="relative mt-1 text-xl font-black text-white">{{ $step }}</h3>

                        <p class="relative mt-3 flex-1 text-sm leading-6 text-slate-400">
                            {{ $meta['text'] ?? 'Etapa clave dentro de nuestro flujo de desarrollo.' }}
                        </p>

                        {{-- Pie: entregable + duracion --}}
                        <div class="relative mt-6 space-y-3 border-t border-cyan-400/10 pt-4">
                            @if (! empty($meta['deliverable']))
                                <div class="flex items-center gap-2 text-xs text-slate-300">
                                    <svg class="h-4 w-4 flex-shrink-0 text-cyan-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                                    <span class="font-semibold">{{ $meta['deliverable'] }}</span>
                                </div>
                            @endif
                            @if (! empty($meta['duration']))
                                <span class="inline-block rounded-full border border-cyan-400/15 bg-cyan-400/5 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.15em] text-cyan-300/80">
                                    {{ $meta['duration'] }}
                                </span>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- CTA final --}}
        <section class="mx-auto max-w-7xl px-5 pb-24 pt-28 lg:px-10">
            <div class="relative overflow-hidden rounded-xl border border-cyan-400/15 bg-gradient-to-br from-[#07101f] to-[#050b16] p-10 md:p-14">
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-cyan-400/10 blur-3xl"></div>
                <div class="relative flex flex-col items-start gap-8 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="max-w-xl text-3xl font-black tracking-tight text-white md:text-4xl">
                            Tienes un proceso que quieres convertir en software?
                        </h2>
                        <p class="mt-4 max-w-lg leading-8 text-slate-400">
                            Cuentanos tu idea y revisamos juntos como llevarla a una solucion estable y a medida.
                        </p>
                    </div>
                    <div class="flex flex-shrink-0 flex-wrap gap-4">
                        <a href="{{ route('contact') }}" class="rounded-md bg-cyan-400 px-6 py-3 text-sm font-black text-[#05111f] shadow-[0_0_28px_rgba(34,211,238,.28)] transition hover:bg-cyan-300">
                            Contactar
                        </a>
                        <a href="{{ route('join') }}" class="rounded-md border border-cyan-400/30 px-6 py-3 text-sm font-bold text-cyan-300 transition hover:border-cyan-300 hover:bg-cyan-400/10">
                            Unirme al equipo
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
