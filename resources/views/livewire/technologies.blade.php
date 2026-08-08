<div class="min-h-screen bg-[#030712] text-slate-100">
    @include('partials.navigation')

    <main class="px-5 pb-24 pt-36">
        <section class="mx-auto max-w-7xl text-center">
            <p class="mb-4 text-xs font-bold uppercase tracking-[0.35em] text-cyan-300">{{ $content['subtitle'] ?: 'Tecnologias' }}</p>
            <h1 class="mx-auto max-w-4xl text-5xl font-black tracking-tight text-white md:text-7xl">
                {{ $content['title'] }}
            </h1>
            <p class="mx-auto mt-8 max-w-3xl text-lg leading-8 text-slate-400">
                {{ $content['body'] }}
            </p>

            <div class="mx-auto mt-14 grid max-w-6xl gap-4 sm:grid-cols-2 md:grid-cols-4">

                {{-- Título --}}
                <h1 class="col-span-full mb-4 text-center text-3xl font-black uppercase tracking-widest text-cyan-300">
                    LENGUAJES DE PROGRAMACIÓN
                </h1>

                {{-- Cards --}}
                @foreach ($lenguajes as $lenguaje)

                <div class="flex flex-col items-center justify-center rounded-md border border-cyan-400/10
                bg-white/[0.03] p-5 text-center
                transition hover:border-cyan-300/40
                hover:bg-cyan-500/5">

                    {{-- Imagen --}}
                    <div class="flex aspect-square w-24 items-center justify-center">

                        <img
                            src="{{ asset('storage/' . $lenguaje['ruta_lenguaje']) }}"
                            alt="{{ $lenguaje['descripcion_lenguaje'] }}"
                            title="{{ $lenguaje['descripcion_lenguaje'] }}"
                            class="h-16 w-16 object-contain">

                    </div>

                    {{-- Nombre del lenguaje --}}
                    <span class="mt-4 text-lg font-bold text-slate-200">
                        {{ $lenguaje['descripcion_lenguaje'] }}
                    </span>

                </div>

                @endforeach

                {{-- Título --}}
                <h1 class="col-span-full mb-4 text-center text-3xl font-black uppercase tracking-widest text-cyan-300">
                    FRAMEWORKS
                </h1>

                {{-- Cards --}}
                @foreach ($librerias as $frameworks)

                <div class="flex flex-col items-center justify-center rounded-md border border-cyan-400/10
                bg-white/[0.03] p-5 text-center
                transition hover:border-cyan-300/40
                hover:bg-cyan-500/5">

                    {{-- Imagen --}}
                    <div class="flex aspect-square w-24 items-center justify-center">

                        <img
                            src="{{ asset('storage/' . $frameworks['ruta_libreria']) }}"
                            alt="{{ $frameworks['descripcion_libreria'] }}"
                            title="{{ $frameworks['descripcion_libreria'] }}"
                            class="h-16 w-16 object-contain">

                    </div>

                    {{-- Nombre del frameworks --}}
                    <span class="mt-4 text-lg font-bold text-slate-200">
                        {{ $frameworks['descripcion_libreria'] }}
                    </span>

                </div>

                @endforeach

                {{-- Título --}}
                <h1 class="col-span-full mb-4 text-center text-3xl font-black uppercase tracking-widest text-cyan-300">
                    LIBRERIAS CSS
                </h1>

                {{-- Cards --}}
                @foreach ($libreriascss as $css)

                <div class="flex flex-col items-center justify-center rounded-md border border-cyan-400/10
                bg-white/[0.03] p-5 text-center
                transition hover:border-cyan-300/40
                hover:bg-cyan-500/5">

                    {{-- Imagen --}}
                    <div class="flex aspect-square w-24 items-center justify-center">

                        <img
                            src="{{ asset('storage/' . $css['ruta_libreriacss']) }}"
                            alt="{{ $css['descripcion_libreriacss'] }}"
                            title="{{ $css['descripcion_libreriacss'] }}"
                            class="h-16 w-16 object-contain">

                    </div>

                    {{-- Nombre del css --}}
                    <span class="mt-4 text-lg font-bold text-slate-200">
                        {{ $css['descripcion_libreriacss'] }}
                    </span>

                </div>

                @endforeach

            </div>

        </section>
    </main>

    @include('partials.footer')
</div>