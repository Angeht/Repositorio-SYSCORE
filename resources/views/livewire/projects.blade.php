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
            <section class="mx-auto max-w-7xl grid gap-4 lg:grid-cols-3">
                <div class="lg:col-span-3 overflow-hidden">
                    @if (!$Project)
                    <p class="text-slate-400 text-white">Proyectos en desarrollo</p>
                    @endif

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3">
                        @foreach ($Project as $pro)

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

                            <div class="group relative h-56 overflow-hidden bg-[#111827] rounded-lg">
                                <a href="{{ $pro['link'] }}" target="_blank" rel="noopener noreferrer" class="block h-full w-full">
                                    @if($pro['img'])
                                    <img
                                        src="{{ asset('storage/' . $pro['ruta']) }}"
                                        alt="{{ $pro['title'] }}"
                                        class="h-full w-full object-cover transition-all duration-300 group-hover:scale-105 group-hover:blur-[2px]">
                                    <div
                                        class="absolute inset-0 flex items-center justify-center
                       bg-black/0 transition-all duration-300
                       group-hover:bg-black/40">

                                        <span
                                            class="rounded-lg border border-cyan-400 bg-cyan-500/20 px-4 py-2
                           text-sm font-semibold text-cyan-300
                           opacity-0 transition-all duration-300
                           group-hover:opacity-100">

                                            👆 Click para ver

                                        </span>

                                    </div>
                                    @else
                                    <span class="text-cyan-300 text-lg font-semibold">
                                        Sin imagen
                                    </span>
                                    @endif
                                </a>
                            </div>
                            <div class="p-5">
                                <h3 class="mb-3 text-sm font-bold uppercase tracking-widest text-cyan-300">
                                    Descripción
                                </h3>

                                <ul class="space-y-2 text-slate-400">
                                    @foreach(explode('.', $pro['descripcion']) as $item)
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
                            {{ $Project->links() }}
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    @include('partials.footer')
</div>