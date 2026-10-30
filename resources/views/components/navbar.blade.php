<nav class="bg-white border-b border-slate-200">
    <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">

        <a href="#"
            class="
                text-lg
                font-bold
                text-slate-600
                transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Eventos
            App</a>

        <div class="hidden sm:flex items-center gap-6 text-sm text-slate-600">
            <a href="#"
                class="
                transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Inicio</a>
            <a href="{{ route('eventos.index') }}"
                class="
                transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Eventos</a>
            <a href="#"
                class="
                 transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Acerca
                de</a>

            @auth
                <span class="text-slate-500">Hola, <span class="font-medium text-slate-700">{{ auth()->user()->name }}</span></span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="cursor-pointer rounded-lg border border-slate-300 bg-white px-3 py-1.5 font-medium text-slate-700 transition-colors hover:border-rose-300 hover:bg-rose-50 hover:text-rose-600">Cerrar
                        sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="
                 transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Iniciar sesión</a>

                <a href="{{ route('registro') }}"
                    class="
                 transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Registro</a>
            @endauth
        </div>

        <button class="sm:hidden text-slate-600">
            Menú
        </button>
    </div>
</nav>
