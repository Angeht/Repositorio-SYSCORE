<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[1fr_0.8fr] lg:items-center">
            <div>
                <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $content['subtitle'] ?: 'Nosotros' }}</p>
                <h1 class="max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                    {{ $content['title'] }}
                </h1>
                <p class="mt-8 max-w-3xl text-lg leading-8 text-slate-400">
                    {{ $content['body'] }}
                </p>
            </div>

            <div class="rounded-md border border-cyan-400/10 bg-[#07101f] p-8">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-cyan-300">Metodo de trabajo</p>
                <div class="mt-8 space-y-5">
                    @foreach ($content['items'] as $step)
                        <div class="flex items-center gap-4 border-b border-cyan-400/10 pb-5 last:border-b-0 last:pb-0">
                            <span class="h-2 w-2 rounded-full bg-cyan-300"></span>
                            <span class="font-bold text-slate-200">{{ $step }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
