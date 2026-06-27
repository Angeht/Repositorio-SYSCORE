<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl">
            <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $content['subtitle'] ?: 'Servicios' }}</p>
            <h1 class="max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                {{ $content['title'] }}
            </h1>

            <div class="mt-14 grid gap-6 md:grid-cols-3">
                @foreach ($content['items'] as $service)
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
