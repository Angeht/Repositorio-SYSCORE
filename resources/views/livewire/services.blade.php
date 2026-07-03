<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl">
            <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $content['subtitle'] ?: 'Servicios' }}</p>
            <h1 class="max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                {{ $content['title'] }}
            </h1>

            <div class="mt-14 flex justify-center">

                @php
                    $items = $content['items'] ?? [];
                    $current = $items[$active] ?? null;
                    $next = $items[$active + 1] ?? $items[0] ?? null;
                @endphp

                <div class="mt-14 grid md:grid-cols-2 gap-6 items-center">

                    @if ($current)
                        <article
                            wire:key="service-{{ $active }}"
                            class="rounded-md border border-cyan-400/20 bg-[#07101f] p-8
                            transition-all duration-300 ease-in-out
                            scale-105 transition-all duration-300 animate-focus-in"
                        >
                            <div class="mb-6 h-1 w-12 rounded-full bg-cyan-400"></div>

                            <h2 class="text-3xl font-black text-white">
                                {{ $current['titulo'] }}
                            </h2>

                            <p class="mt-5 leading-7 text-slate-300 text-lg">
                                {{ $current['texto'] }}
                            </p>
                        </article>
                    @endif

                    @if ($next)
                        <article
                            class="rounded-md border border-cyan-400/10 bg-[#07101f] p-6
                            scale-95 opacity-60 transition-all duration-300"
                        >
                            <div class="mb-6 h-1 w-10 rounded-full bg-cyan-400/40"></div>

                            <h2 class="text-2xl font-bold text-white">
                                {{ $next['titulo'] }}
                            </h2>

                            <p class="mt-4 leading-6 text-slate-400">
                                {{ $next['texto'] }}
                            </p>
                        </article>
                    @endif

                </div>

            </div>
            <div class="mt-10 flex items-center justify-center gap-6">
                <button
                    wire:click="prev"
                    class="rounded-md border border-cyan-400/20 px-4 py-2 text-cyan-300 hover:bg-cyan-400/10"
                >
                    ←
                </button>

                <button
                    wire:click="next"
                    class="rounded-md border border-cyan-400/20 px-4 py-2 text-cyan-300 hover:bg-cyan-400/10"
                >
                    →
                </button>
            </div>
            @php
                $items = $content['items'] ?? [];
            @endphp

            <div class="mt-6 flex justify-center gap-2">
                @foreach ($items as $index => $item)
                    <div
                        wire:click="$set('active', {{ $index }})"
                        class="h-2 w-2 cursor-pointer rounded-full transition-all
                        {{ $active === $index ? 'bg-cyan-400 w-4' : 'bg-cyan-400/30' }}"
                    ></div>
                @endforeach
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
