<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl text-center">
            <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Tecnologias</p>
            <h1 class="mx-auto max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                Stack de desarrollo.
            </h1>
            <p class="mx-auto mt-8 max-w-3xl text-lg leading-8 text-slate-400">
                Usamos herramientas modernas para construir sistemas rapidos, escalables y faciles de mantener.
            </p>

            <div class="mx-auto mt-14 grid max-w-6xl gap-4 sm:grid-cols-2 md:grid-cols-4">
                @foreach (['Laravel', 'Livewire', 'PHP', 'MySQL', 'Tailwind CSS', 'JavaScript', 'Git', 'Vite', 'HTML', 'CSS', 'APIs REST', 'Linux'] as $tech)
                    <div class="rounded-md border border-cyan-400/10 bg-white/[0.03] px-5 py-6 font-black text-slate-200 transition hover:border-cyan-300/40 hover:text-cyan-200">
                        {{ $tech }}
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
