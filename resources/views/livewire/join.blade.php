<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto grid max-w-7xl gap-12 lg:grid-cols-[0.85fr_1fr] lg:items-start">
            <div>
                <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Unete</p>
                <h1 class="text-5xl font-black tracking-tight text-white md:text-7xl">
                    Forma parte del equipo SysCore.
                </h1>
                <p class="mt-8 text-lg leading-8 text-slate-400">
                    Si quieres colaborar en proyectos, aprender construyendo soluciones reales o sumarte como
                    desarrollador, dejanos tus datos y revisamos tu perfil.
                </p>

                <div class="mt-10 grid gap-4 sm:grid-cols-2">
                    @foreach (['Frontend', 'Backend', 'Base de datos', 'Soporte'] as $area)
                        <div class="rounded-md border border-cyan-400/10 bg-white/[0.03] p-5 font-bold text-slate-200">
                            {{ $area }}
                        </div>
                    @endforeach
                </div>
            </div>

            <form class="rounded-md border border-cyan-400/10 bg-[#07101f] p-6 md:p-8">
                <div class="grid gap-5 md:grid-cols-2">
                    <input type="text" placeholder="Nombre completo" class="rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">
                    <input type="email" placeholder="Correo" class="rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">
                </div>

                <input type="text" placeholder="Area de interes" class="mt-5 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">

                <textarea rows="7" placeholder="Cuentanos sobre ti" class="mt-5 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300"></textarea>

                <button type="submit" class="mt-5 rounded-md bg-cyan-400 px-8 py-4 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                    Enviar solicitud
                </button>
            </form>
        </section>
    </main>

    @include('partials.footer')
</div>
