<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="relative overflow-hidden px-5 pb-24 pt-36">
        {{-- Glows de fondo --}}
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-32 left-1/3 h-[34rem] w-[34rem] -translate-x-1/2 rounded-full bg-cyan-500/10 blur-[130px]"></div>
            <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-cyan-400/5 blur-[120px]"></div>
        </div>

        <section class="mx-auto grid max-w-7xl gap-14 lg:grid-cols-[0.85fr_1fr] lg:items-start">
            {{-- Columna izquierda: info --}}
            <div>
                <span class="inline-flex items-center gap-2 rounded-full border border-cyan-400/20 bg-cyan-400/5 px-4 py-1.5 text-[11px] font-bold uppercase tracking-[0.3em] text-cyan-300">
                    <span class="h-1.5 w-1.5 rounded-full bg-cyan-300"></span>
                    {{ $content['subtitle'] ?: 'Contacto' }}
                </span>

                <h1 class="mt-6 text-5xl font-black leading-[1.05] tracking-tight text-white md:text-7xl">
                    {{ $content['title'] ?: 'Hablemos de tu sistema.' }}
                </h1>

                <p class="mt-8 max-w-lg text-lg leading-8 text-slate-400">
                    {{ $content['body'] }}
                </p>

                {{-- Tarjetas de datos de contacto --}}
                <div class="mt-10 space-y-4">
                    @php
                        $cards = [
                            [
                                'label' => 'Correo',
                                'value' => $content['items']['email'] ?? 'contacto@syscore.dev',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>',
                            ],
                            [
                                'label' => 'Ubicacion',
                                'value' => $content['items']['location'] ?? 'Peru',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>',
                            ],
                            [
                                'label' => 'Tiempo de respuesta',
                                'value' => $content['items']['response'] ?? '24 a 48 horas',
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                            ],
                        ];
                    @endphp

                    @foreach ($cards as $card)
                        <div class="group flex items-center gap-4 rounded-xl border border-cyan-400/10 bg-[#07101f] p-5 transition hover:border-cyan-300/40 hover:bg-[#081629]">
                            <span class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-lg border border-cyan-400/20 bg-cyan-400/5 text-cyan-300 transition group-hover:border-cyan-300/50">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">{!! $card['icon'] !!}</svg>
                            </span>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">{{ $card['label'] }}</p>
                                <p class="mt-0.5 font-black text-white">{{ $card['value'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Indicador de disponibilidad --}}
                <div class="mt-6 inline-flex items-center gap-2.5 rounded-full border border-emerald-400/20 bg-emerald-400/5 px-4 py-2 text-xs font-bold text-emerald-300">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                    </span>
                    Disponibles para nuevos proyectos
                </div>
            </div>

            {{-- Columna derecha: formulario --}}
            <div class="relative rounded-2xl border border-cyan-400/15 bg-[#07101f] p-6 shadow-[0_0_60px_rgba(8,20,40,.6)] md:p-8">
                <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-cyan-400/10 blur-3xl"></div>

                @if ($sent)
                    {{-- Estado de exito --}}
                    <div class="relative flex min-h-[26rem] flex-col items-center justify-center text-center">
                        <span class="flex h-16 w-16 items-center justify-center rounded-full border border-emerald-400/30 bg-emerald-400/10 text-emerald-300">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/></svg>
                        </span>
                        <h2 class="mt-6 text-2xl font-black text-white">Mensaje enviado</h2>
                        <p class="mt-3 max-w-sm leading-7 text-slate-400">
                            Gracias por escribirnos. Te responderemos en un plazo de 24 a 48 horas.
                        </p>
                        <button type="button" wire:click="sendAnother" class="mt-8 rounded-md border border-cyan-400/35 px-6 py-3 text-sm font-black text-cyan-300 transition hover:bg-cyan-400/10">
                            Enviar otro mensaje
                        </button>
                    </div>
                @else
                    <div class="relative mb-6">
                        <h2 class="text-xl font-black text-white">Cuentanos sobre tu proyecto</h2>
                        <p class="mt-1 text-sm text-slate-500">Completa el formulario y nos pondremos en contacto.</p>
                    </div>

                    <form wire:submit="submit" class="relative space-y-5">
                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Nombre</label>
                                <input type="text" wire:model="name" placeholder="Tu nombre"
                                    class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3.5 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300 focus:ring-1 focus:ring-cyan-300/40">
                                @error('name') <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Correo</label>
                                <input type="email" wire:model="email" placeholder="tu@correo.com"
                                    class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3.5 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300 focus:ring-1 focus:ring-cyan-300/40">
                                @error('email') <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Asunto</label>
                            <input type="text" wire:model="subject" placeholder="De que se trata"
                                class="w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3.5 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300 focus:ring-1 focus:ring-cyan-300/40">
                            @error('subject') <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.2em] text-slate-500">Mensaje</label>
                            <textarea rows="6" wire:model="message" placeholder="Describe tu idea o proceso a mejorar..."
                                class="w-full resize-none rounded-md border border-cyan-400/10 bg-black/20 px-4 py-3.5 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300 focus:ring-1 focus:ring-cyan-300/40"></textarea>
                            @error('message') <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit"
                            class="group inline-flex w-full items-center justify-center gap-2 rounded-md bg-cyan-400 px-8 py-4 text-sm font-black text-[#05111f] shadow-[0_0_28px_rgba(34,211,238,.25)] transition hover:bg-cyan-300 disabled:opacity-70 md:w-auto">
                            <span wire:loading.remove wire:target="submit">Enviar mensaje</span>
                            <span wire:loading wire:target="submit">Enviando...</span>
                            <svg wire:loading.remove wire:target="submit" class="h-4 w-4 transition group-hover:translate-x-1" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/></svg>
                        </button>
                    </form>
                @endif
            </div>
        </section>
    </main>

    @include('partials.footer')
</div>
