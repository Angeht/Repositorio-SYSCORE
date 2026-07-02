<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.8fr_1fr]">
            <div>
                <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $content['subtitle'] ?: 'Contacto' }}</p>
                <h1 class="text-5xl font-black tracking-tight text-white md:text-7xl">
                    {{ $content['title'] }}
                </h1>
                <p class="mt-8 text-lg leading-8 text-slate-400">
                    {{ $content['body'] }}
                </p>

                <div class="mt-10 space-y-4 text-slate-400">
                    <p><span class="font-bold text-cyan-300">Correo:</span> {{ $content['items']['email'] ?? 'contacto@syscore.dev' }}</p>
                    <p><span class="font-bold text-cyan-300">Ubicacion:</span> {{ $content['items']['location'] ?? 'Perú' }}</p>
                    <p><span class="font-bold text-cyan-300">Respuesta:</span> {{ $content['items']['response'] ?? '24 a 48 horas' }}</p>
                </div>
            </div>

            <form class="rounded-md border border-cyan-400/10 bg-[#07101f] p-6 md:p-8">
                <div class="grid gap-5 md:grid-cols-2">
                    <input type="text" placeholder="Nombre" class="rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">
                    <input type="email" placeholder="Correo" class="rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">
                </div>

                <input type="text" placeholder="Asunto" class="mt-5 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">

                <textarea rows="7" placeholder="Mensaje" class="mt-5 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300"></textarea>

                <button type="submit" class="mt-5 rounded-md bg-cyan-400 px-8 py-4 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                    Enviar mensaje
                </button>
            </form>
        </section>
    </main>

    @include('partials.footer')
</div>
