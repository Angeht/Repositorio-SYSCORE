<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="flex min-h-screen items-center justify-center px-5 py-32">
        <section class="grid w-full max-w-6xl overflow-hidden rounded-md border border-cyan-400/10 bg-[#07101f] lg:grid-cols-[0.9fr_1fr]">
            <div class="relative hidden min-h-[620px] border-r border-cyan-400/10 bg-[#050716] p-10 lg:block">
                <div class="absolute inset-0 bg-[linear-gradient(rgba(34,211,238,.055)_1px,transparent_1px),linear-gradient(90deg,rgba(34,211,238,.055)_1px,transparent_1px)] bg-[size:38px_38px]"></div>
                <div class="relative">
                    <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Panel SysCore</p>
                    <h1 class="text-5xl font-black tracking-tight text-white">
                        Sistema de cambios de la pagina.
                    </h1>
                    <p class="mt-6 leading-8 text-slate-400">
                        Acceso privado para administrar contenido, proyectos, servicios y solicitudes del sitio.
                    </p>
                </div>
            </div>

            <div class="p-6 md:p-10 lg:p-14">
                <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">Iniciar sesion</p>
                <h2 class="text-4xl font-black text-white">Accede al sistema</h2>
                <p class="mt-4 leading-7 text-slate-400">
                    Esta pantalla queda lista para conectar la autenticacion real de administradores.
                </p>

                <form wire:submit.prevent="login" class="mt-10">
                    <label class="block text-sm font-bold text-slate-300" for="email">Correo</label>
                    <input id="email" wire:model="email" type="email" placeholder="admin@syscore.dev" class="mt-3 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">
                    @error('email')
                        <p class="mt-2 text-sm font-semibold text-red-400">{{ $message }}</p>
                    @enderror

                    <label class="mt-6 block text-sm font-bold text-slate-300" for="password">Contrasena</label>
                    <input id="password" wire:model="password" type="password" placeholder="********" class="mt-3 w-full rounded-md border border-cyan-400/10 bg-black/20 px-4 py-4 text-white outline-none transition placeholder:text-slate-600 focus:border-cyan-300">
                    @error('password')
                        <p class="mt-2 text-sm font-semibold text-red-400">{{ $message }}</p>
                    @enderror

                    <label class="mt-6 flex items-center gap-3 text-sm font-semibold text-slate-400">
                        <input wire:model="remember" type="checkbox" class="h-4 w-4 rounded border-cyan-400/20 bg-black/20 text-cyan-400">
                        Mantener sesion iniciada
                    </label>

                    <button type="submit" class="mt-8 w-full rounded-md bg-cyan-400 px-8 py-4 text-sm font-black text-[#05111f] transition hover:bg-cyan-300">
                        <span wire:loading.remove>Entrar al panel</span>
                        <span wire:loading>Validando...</span>
                    </button>
                </form>

               </div>
        </section>
    </main>
</div>
