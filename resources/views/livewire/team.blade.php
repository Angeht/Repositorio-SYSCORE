<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl">
            <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $content['subtitle'] ?: 'Equipo' }}</p>
            <h1 class="max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                {{ $content['title'] }}
            </h1>
            <p class="mt-8 max-w-3xl text-lg leading-8 text-slate-400">
                {{ $content['body'] }}
            </p>

            <div class="mt-14 grid gap-6 md:grid-cols-3">
                @foreach ($content['items'] as $member)
                    <article class="group rounded-md border border-cyan-400/10 bg-[#07101f] p-7 transition hover:-translate-y-1 hover:border-cyan-300/40 hover:bg-[#081629]">
                        <div class="mb-8 flex h-20 w-20 items-center justify-center rounded-md bg-cyan-400/10 text-3xl font-black text-cyan-300 shadow-[0_0_30px_rgba(34,211,238,.12)]">
                            {{ str($member['nombre'] ?? 'S')->substr(0, 1) }}
                        </div>
                        <p class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">{{ $member['rol'] ?? '' }}</p>
                        <h2 class="mt-3 text-2xl font-black text-white">{{ $member['nombre'] ?? '' }}</h2>
                        <p class="mt-5 leading-7 text-slate-400">{{ $member['texto'] ?? '' }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section class="border-t border-cyan-400/10 px-5 py-20">
            <div class="mx-auto max-w-7xl">
                <div class="text-center">
                    <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Nuestro Equipo</p>
                    <h2 class="text-4xl font-black tracking-tight text-white md:text-5xl">
                        Conoce a las personas detrás de SysCore
                    </h2>
                    <p class="mx-auto mt-8 max-w-2xl text-lg leading-8 text-slate-400">
                        Un equipo enfocado en construir software claro, funcional y bien pensado.
                    </p>
                </div>

                <div class="mt-16 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse ($miembros as $m)
                        <div class="group rounded-md border border-cyan-400/10 bg-[#07101f] p-8 text-center transition hover:-translate-y-1 hover:border-cyan-300/40">
                            <div class="relative mx-auto mb-5 h-28 w-28">
                                <img
                                    src="{{ $m->foto ? asset('storage/'.$m->foto) : 'https://ui-avatars.com/api/?name='.urlencode($m->nombre).'&background=06b6d4&color=030712' }}"
                                    alt="{{ $m->nombre }}"
                                    class="h-28 w-28 rounded-full object-cover ring-4 ring-cyan-400/10 transition group-hover:ring-cyan-300/30"
                                >
                            </div>

                            <h3 class="text-lg font-bold text-white">{{ $m->nombre }}</h3>
                            <p class="mb-3 text-sm font-bold uppercase tracking-wide text-cyan-300">{{ $m->cargo }}</p>

                            @if ($m->descripcion)
                                <p class="mb-4 text-sm leading-relaxed text-slate-400">{{ $m->descripcion }}</p>
                            @endif

                            <div class="mt-2 flex justify-center gap-4">
                                @if ($m->linkedin)
                                    <a href="{{ $m->linkedin }}" target="_blank" class="text-slate-500 transition hover:text-cyan-300">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0H5a5 5 0 0 0-5 5v14a5 5 0 0 0 5 5h14a5 5 0 0 0 5-5V5a5 5 0 0 0-5-5zM8 19H5V8h3zM6.5 6.7A1.7 1.7 0 1 1 8.2 5a1.7 1.7 0 0 1-1.7 1.7zM19 19h-3v-5.6c0-1.3-.5-2.2-1.7-2.2a1.9 1.9 0 0 0-1.8 1.3 2.3 2.3 0 0 0-.1.8V19h-3s.04-9.3 0-11h3v1.5a3 3 0 0 1 2.7-1.5c2 0 3.4 1.3 3.4 4.1z"/></svg>
                                    </a>
                                @endif
                                @if ($m->github)
                                    <a href="{{ $m->github }}" target="_blank" class="text-slate-500 transition hover:text-cyan-300">
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0a12 12 0 0 0-3.8 23.4c.6.1.8-.3.8-.6v-2.2c-3.3.7-4-1.6-4-1.6-.6-1.4-1.4-1.7-1.4-1.7-1.1-.8.1-.8.1-.8 1.3.1 1.9 1.3 1.9 1.3 1.1 1.9 2.9 1.3 3.6 1 .1-.8.4-1.3.8-1.6-2.7-.3-5.5-1.3-5.5-5.9 0-1.3.5-2.4 1.3-3.2-.1-.3-.6-1.6.1-3.2 0 0 1.1-.3 3.4 1.3a12 12 0 0 1 6.2 0c2.3-1.6 3.4-1.3 3.4-1.3.7 1.6.2 2.9.1 3.2.8.8 1.3 1.9 1.3 3.2 0 4.6-2.8 5.6-5.5 5.9.4.4.8 1.1.8 2.2v3.3c0 .3.2.7.8.6A12 12 0 0 0 12 0z"/></svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-slate-500">Aun no hay miembros registrados.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
