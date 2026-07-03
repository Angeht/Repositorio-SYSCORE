<div class="min-h-screen overflow-hidden bg-[#030712] text-slate-100">
    @include('partials.navigation')

    {{-- Animaciones locales --}}
    <style>
        @keyframes sc-float { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes sc-blink { 0%,100% { opacity: 1; } 50% { opacity: 0; } }
        @keyframes sc-pulse-ring { 0% { transform: scale(.8); opacity: .7; } 100% { transform: scale(2.2); opacity: 0; } }
        @keyframes sc-rise { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
        .sc-float { animation: sc-float 5s ease-in-out infinite; }
        .sc-float-slow { animation: sc-float 7s ease-in-out infinite; }
        .sc-blink { animation: sc-blink 1.1s step-end infinite; }
        .sc-rise { animation: sc-rise .7s ease-out both; }
    </style>

    <main>
        {{-- Hero --}}
        <section class="relative flex min-h-screen items-center px-5 pt-32 lg:pt-24">
            {{-- Fondos --}}
            <div class="absolute inset-0 bg-[linear-gradient(rgba(34,211,238,.05)_1px,transparent_1px),linear-gradient(90deg,rgba(34,211,238,.05)_1px,transparent_1px)] bg-[size:52px_52px] [mask-image:radial-gradient(ellipse_at_center,black,transparent_75%)]"></div>
            <div class="absolute -top-20 left-1/4 h-96 w-96 rounded-full bg-cyan-500/15 blur-[130px]"></div>
            <div class="absolute bottom-0 right-1/4 h-80 w-80 rounded-full bg-cyan-400/10 blur-[120px]"></div>

            <div class="relative mx-auto grid w-full max-w-7xl items-center gap-16 lg:grid-cols-[1.05fr_0.95fr]">
                {{-- Columna de texto --}}
                <div class="sc-rise">
                    <div class="inline-flex items-center gap-3 rounded-full border border-cyan-400/20 bg-cyan-400/5 px-5 py-2 text-[11px] font-bold uppercase tracking-[0.3em] text-cyan-300">
                        <span class="relative flex h-2 w-2">
                            <span class="absolute inline-flex h-full w-full rounded-full bg-cyan-300" style="animation: sc-pulse-ring 1.8s ease-out infinite;"></span>
                            <span class="relative inline-flex h-2 w-2 rounded-full bg-cyan-300"></span>
                        </span>
                        {{ $hero['items']['eyebrow'] ?? 'Ingenieria de sistemas e informatica' }}
                    </div>

                    <h1 class="mt-8 text-6xl font-black leading-[0.95] tracking-tight text-white sm:text-7xl md:text-8xl">
                        {{ str($hero['title'])->before('Core') ?: 'Sys' }}<span class="text-cyan-400 drop-shadow-[0_0_28px_rgba(34,211,238,.45)]">{{ str($hero['title'])->contains('Core') ? 'Core' : '' }}</span>
                    </h1>

                    <p class="mt-4 text-2xl font-black tracking-tight text-slate-400 md:text-3xl">
                        {{ $hero['subtitle'] }}
                    </p>

                    <p class="mt-8 max-w-xl text-lg leading-8 text-slate-300 md:text-xl">
                        {{ $hero['body'] }}
                    </p>

                    <p class="mt-4 max-w-xl leading-8 text-slate-500">
                        {{ $hero['items']['description'] ?? '' }}
                    </p>

                    <div class="mt-10 flex flex-wrap items-center gap-4">
                        <a href="{{ $hero['button_url'] ?: route('projects') }}" class="group inline-flex items-center gap-2 rounded-md bg-cyan-400 px-7 py-3.5 text-sm font-black text-[#05111f] shadow-[0_0_30px_rgba(34,211,238,.28)] transition hover:bg-cyan-300">
                            {{ $hero['button_text'] ?: 'Ver Proyectos' }}
                            <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>

                        <a href="{{ route('contact') }}" class="rounded-md border border-cyan-400/35 px-7 py-3.5 text-sm font-black text-cyan-300 transition hover:bg-cyan-400/10">
                            Contactanos
                        </a>
                    </div>
                </div>

                {{-- Columna visual: ventana de codigo con badges flotantes --}}
                <div class="relative hidden lg:block">
                    <div class="absolute -inset-4 rounded-2xl bg-cyan-400/5 blur-2xl"></div>

                    {{-- Badge flotante superior --}}
                    <div class="sc-float absolute -left-8 top-10 z-20 flex items-center gap-3 rounded-lg border border-cyan-400/20 bg-[#0a1424]/95 px-4 py-3 shadow-[0_0_30px_rgba(8,20,40,.7)] backdrop-blur">
                        <span class="flex h-9 w-9 items-center justify-center rounded-md bg-emerald-400/15 text-emerald-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-black text-white">Deploy exitoso</p>
                            <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Produccion</p>
                        </div>
                    </div>

                    {{-- Badge flotante inferior --}}
                    <div class="sc-float-slow absolute -right-6 bottom-8 z-20 flex items-center gap-3 rounded-lg border border-cyan-400/20 bg-[#0a1424]/95 px-4 py-3 shadow-[0_0_30px_rgba(8,20,40,.7)] backdrop-blur">
                        <span class="flex h-9 w-9 items-center justify-center rounded-md bg-cyan-400/15 text-cyan-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-black text-white">Codigo limpio</p>
                            <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-500">Buenas practicas</p>
                        </div>
                    </div>

                    <div class="relative overflow-hidden rounded-xl border border-cyan-400/15 bg-[#060d1a] shadow-[0_0_60px_rgba(8,20,40,.8)]">
                        {{-- Barra de ventana --}}
                        <div class="flex items-center gap-2 border-b border-cyan-400/10 bg-[#081120] px-4 py-3">
                            <span class="h-3 w-3 rounded-full bg-rose-400/70"></span>
                            <span class="h-3 w-3 rounded-full bg-amber-400/70"></span>
                            <span class="h-3 w-3 rounded-full bg-emerald-400/70"></span>
                            <span class="ml-3 text-xs font-semibold text-slate-500">syscore.php</span>
                            <span class="ml-auto flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wider text-emerald-300">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 shadow-[0_0_10px_rgba(52,211,153,.9)]"></span>
                                en vivo
                            </span>
                        </div>
                        {{-- Codigo --}}
                        <pre class="overflow-x-auto p-6 text-sm leading-7"><code><span class="text-slate-500">// Convertimos procesos en software</span>
<span class="text-cyan-300">class</span> <span class="text-white">SysCore</span> <span class="text-slate-400">{</span>
  <span class="text-cyan-300">public function</span> <span class="text-cyan-400">construir</span><span class="text-slate-400">(</span><span class="text-slate-300">$idea</span><span class="text-slate-400">) {</span>
    <span class="text-cyan-300">return</span> <span class="text-slate-300">$idea</span>
      <span class="text-slate-400">-></span><span class="text-white">analizar</span><span class="text-slate-400">()</span>
      <span class="text-slate-400">-></span><span class="text-white">disenar</span><span class="text-slate-400">()</span>
      <span class="text-slate-400">-></span><span class="text-white">desarrollar</span><span class="text-slate-400">()</span>
      <span class="text-slate-400">-></span><span class="text-white">probar</span><span class="text-slate-400">()</span>
      <span class="text-slate-400">-></span><span class="text-cyan-400">desplegar</span><span class="text-slate-400">();</span><span class="sc-blink text-cyan-300">_</span>
  <span class="text-slate-400">}</span>
<span class="text-slate-400">}</span></code></pre>
                    </div>
                </div>
            </div>
        </section>

        {{-- Metricas --}}
        <section class="border-y border-cyan-400/10 bg-[#050b16]/60 px-5 py-14">
            <div class="mx-auto grid max-w-7xl grid-cols-2 gap-8 md:grid-cols-4">
                @foreach ([
                    ['n' => '100%', 'l' => 'Proyectos a medida'],
                    ['n' => '5', 'l' => 'Etapas de trabajo'],
                    ['n' => '24-48h', 'l' => 'Tiempo de respuesta'],
                    ['n' => '∞', 'l' => 'Soporte continuo'],
                ] as $m)
                    <div class="text-center md:text-left">
                        <p class="text-4xl font-black text-cyan-300 md:text-5xl">{{ $m['n'] }}</p>
                        <p class="mt-2 text-xs font-semibold uppercase tracking-[0.18em] text-slate-500">{{ $m['l'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Franja de tecnologias --}}
        <section class="px-5 py-10">
            <div class="mx-auto flex max-w-7xl flex-col items-center gap-6 md:flex-row md:justify-between">
                <p class="text-xs font-bold uppercase tracking-[0.3em] text-slate-500">Stack de desarrollo</p>
                <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3 text-sm font-black text-slate-400">
                    @foreach (['Laravel', 'Livewire', 'PHP', 'MySQL', 'Tailwind', 'Vite'] as $tech)
                        <span class="transition hover:text-cyan-300">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Por que elegirnos --}}
        <section class="px-5 py-16">
            <div class="mx-auto max-w-7xl">
                <p class="text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Por que SysCore</p>
                <h2 class="mt-4 max-w-2xl text-3xl font-black tracking-tight text-white md:text-4xl">
                    Ingenieria con proposito, no solo codigo.
                </h2>

                <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ([
                        ['t' => 'A medida', 'd' => 'Cada solucion se adapta a tu proceso, no al reves.', 'i' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.109-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>'],
                        ['t' => 'Rapido', 'd' => 'Entregas por etapas para ver avances reales pronto.', 'i' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>'],
                        ['t' => 'Estable', 'd' => 'Probamos cada funcion antes de llegar a produccion.', 'i' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>'],
                        ['t' => 'Cercano', 'd' => 'Comunicacion clara y acompanamiento en todo el proceso.', 'i' => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/>'],
                    ] as $f)
                        <div class="group rounded-xl border border-cyan-400/10 bg-[#07101f] p-6 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/40 hover:bg-[#081629]">
                            <div class="flex h-11 w-11 items-center justify-center rounded-lg border border-cyan-400/20 bg-cyan-400/5 text-cyan-300 transition group-hover:border-cyan-300/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">{!! $f['i'] !!}</svg>
                            </div>
                            <h3 class="mt-5 text-lg font-black text-white">{{ $f['t'] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-400">{{ $f['d'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Explora --}}
        <section class="px-5 py-16">
            <div class="mx-auto max-w-7xl">
                <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Explora</p>
                        <h2 class="mt-4 max-w-2xl text-3xl font-black tracking-tight text-white md:text-4xl">
                            Todo lo que hacemos, en un solo lugar.
                        </h2>
                    </div>
                    <a href="{{ route('us') }}" class="text-sm font-black text-cyan-300 transition hover:text-cyan-200">Conocenos &rarr;</a>
                </div>

                <div class="mt-12 grid gap-5 md:grid-cols-3">
                    @foreach ([
                        ['titulo' => 'Servicios', 'texto' => 'Aplicaciones web, sistemas internos y sitios corporativos.', 'ruta' => route('services'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z"/>'],
                        ['titulo' => 'Proyectos', 'texto' => 'Soluciones digitales pensadas para procesos reales.', 'ruta' => route('projects'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z"/>'],
                        ['titulo' => 'Tecnologias', 'texto' => 'Laravel, Livewire, PHP, MySQL, Tailwind CSS y mas.', 'ruta' => route('technologies'), 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>'],
                    ] as $item)
                        <a href="{{ $item['ruta'] }}" class="group relative overflow-hidden rounded-xl border border-cyan-400/10 bg-[#07101f] p-7 transition duration-300 hover:-translate-y-1 hover:border-cyan-300/40 hover:bg-[#081629] hover:shadow-[0_0_40px_rgba(34,211,238,.12)]">
                            <div class="flex items-center justify-between">
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg border border-cyan-400/20 bg-cyan-400/5 text-cyan-300 transition group-hover:border-cyan-300/50">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">{!! $item['icon'] !!}</svg>
                                </div>
                                <svg class="h-5 w-5 text-slate-600 transition group-hover:translate-x-1 group-hover:text-cyan-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </div>
                            <h3 class="mt-6 text-2xl font-black text-white">{{ $item['titulo'] }}</h3>
                            <p class="mt-3 leading-7 text-slate-400">{{ $item['texto'] }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <section class="px-5 pb-24 pt-8">
            <div class="relative mx-auto max-w-7xl overflow-hidden rounded-xl border border-cyan-400/15 bg-gradient-to-br from-[#07101f] to-[#050b16] p-10 md:p-14">
                <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full bg-cyan-400/10 blur-3xl"></div>
                <div class="relative flex flex-col items-start gap-8 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="max-w-xl text-3xl font-black tracking-tight text-white md:text-4xl">
                            Listo para llevar tu idea a produccion?
                        </h2>
                        <p class="mt-4 max-w-lg leading-8 text-slate-400">
                            Cuentanos que proceso quieres mejorar y lo convertimos en una solucion digital estable.
                        </p>
                    </div>
                    <a href="{{ route('contact') }}" class="flex-shrink-0 rounded-md bg-cyan-400 px-7 py-3.5 text-sm font-black text-[#05111f] shadow-[0_0_28px_rgba(34,211,238,.28)] transition hover:bg-cyan-300">
                        Empezar ahora
                    </a>
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
