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
    </main>

    @include('partials.footer')
</div>
