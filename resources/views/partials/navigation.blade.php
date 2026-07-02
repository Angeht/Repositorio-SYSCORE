<header class="fixed left-0 top-0 z-50 w-full border-b border-cyan-400/10 bg-[#050716]/90 backdrop-blur-xl">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-10">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span class="flex h-9 w-9 items-center justify-center rounded-md bg-cyan-400 text-lg font-black text-[#06111f] shadow-[0_0_28px_rgba(34,211,238,.35)]">
                &gt;_
            </span>
            <span class="text-lg font-black tracking-tight">
                Sys<span class="text-cyan-400">Core</span>
            </span>
        </a>

        <div class="hidden items-center gap-6 text-[11px] font-semibold uppercase tracking-[0.24em] text-slate-500 lg:flex">
            <a href="{{ route('home') }}" class="transition hover:text-cyan-300">Inicio</a>
            <a href="{{ route('us') }}" class="transition hover:text-cyan-300">Nosotros</a>
            <a href="{{ route('services') }}" class="transition hover:text-cyan-300">Servicios</a>
            <a href="{{ route('projects') }}" class="transition hover:text-cyan-300">Proyectos</a>
            <a href="{{ route('technologies') }}" class="transition hover:text-cyan-300">Tecnologias</a>
            <a href="{{ route('team') }}" class="transition hover:text-cyan-300">Equipo</a>
            <a href="{{ route('contact') }}" class="transition hover:text-cyan-300">Contacto</a>
        </div>

        <div class="hidden items-center gap-3 md:flex">
            <a href="{{ route('join') }}" class="rounded-md bg-cyan-400 px-4 py-2 text-xs font-black text-[#05111f] shadow-[0_0_24px_rgba(34,211,238,.22)] transition hover:bg-cyan-300">
                Unete
            </a>

            <a href="{{ route('login') }}" class="rounded-md border border-cyan-400/30 px-4 py-2 text-xs font-bold text-cyan-300 shadow-[0_0_20px_rgba(34,211,238,.08)] transition hover:border-cyan-300 hover:bg-cyan-400/10">
                Iniciar sesion
            </a>
        </div>
    </nav>
</header>
