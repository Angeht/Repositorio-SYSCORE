<footer class="relative overflow-hidden border-t border-cyan-400/10 bg-[#050716] px-5">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_0%,rgba(34,211,238,.10),transparent_28rem)]"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(34,211,238,.035)_1px,transparent_1px),linear-gradient(90deg,rgba(34,211,238,.035)_1px,transparent_1px)] bg-[size:44px_44px]"></div>

    <div class="relative mx-auto max-w-7xl py-14">
        <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr_0.8fr_1fr]">
            <div>
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-md bg-cyan-400 text-lg font-black text-[#06111f] shadow-[0_0_28px_rgba(34,211,238,.28)]">
                        &gt;_
                    </span>
                    <span class="text-xl font-black tracking-tight text-white">
                        Sys<span class="text-cyan-400">Core</span>
                    </span>
                </a>

                <p class="mt-6 max-w-sm leading-7 text-slate-500">
                    Ingenieria, desarrollo web y soluciones digitales para transformar procesos en sistemas utiles.
                </p>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.28em] text-cyan-300">Sitio</h3>
                <div class="mt-5 space-y-3 text-sm font-semibold text-slate-500">
                    <a href="{{ route('home') }}" class="block transition hover:text-cyan-300">Inicio</a>
                    <a href="{{ route('us') }}" class="block transition hover:text-cyan-300">Nosotros</a>
                    <a href="{{ route('services') }}" class="block transition hover:text-cyan-300">Servicios</a>
                    <a href="{{ route('projects') }}" class="block transition hover:text-cyan-300">Proyectos</a>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.28em] text-cyan-300">Equipo</h3>
                <div class="mt-5 space-y-3 text-sm font-semibold text-slate-500">
                    <a href="{{ route('technologies') }}" class="block transition hover:text-cyan-300">Tecnologias</a>
                    <a href="{{ route('team') }}" class="block transition hover:text-cyan-300">Equipo</a>
                    <a href="{{ route('join') }}" class="block transition hover:text-cyan-300">Unete</a>
                    <a href="{{ route('login') }}" class="block transition hover:text-cyan-300">Iniciar sesion</a>
                </div>
            </div>

            <div>
                <h3 class="text-xs font-black uppercase tracking-[0.28em] text-cyan-300">Contacto</h3>
                <div class="mt-5 space-y-3 text-sm text-slate-500">
                    <p><span class="font-bold text-slate-300">Correo:</span> contacto@syscore.dev</p>
                    <p><span class="font-bold text-slate-300">Ubicacion:</span> Colombia</p>
                    <a href="{{ route('contact') }}" class="inline-flex rounded-md border border-cyan-400/25 px-4 py-2 font-black text-cyan-300 transition hover:bg-cyan-400/10">
                        Escribir mensaje
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-4 border-t border-cyan-400/10 pt-6 text-sm text-slate-600 md:flex-row md:items-center md:justify-between">
            <p>&copy; {{ date('Y') }} SysCore Dev Team. Todos los derechos reservados.</p>
            <p class="font-semibold text-slate-500">Construido con Laravel, Livewire y Tailwind CSS.</p>
        </div>
    </div>
</footer>
