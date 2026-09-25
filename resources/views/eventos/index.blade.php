<x-layout title="Aplicación de Eventos UATF">
    <h1 class="mb-6 text-2xl font-bold text-center">
        Cartelera de Eventos
    </h1>

    <div class="flex justify-between">
        @include('partials.filtros')

        <div>
            <a href="{{ route('eventos.create') }}"
                class="text-sm bg-blue-600 rounded-lg px-4 py-2 text-white font-medium hover:bg-blue-700">
                Crear Nuevo Evento
            </a>
        </div>
    </div>


    <div class="mb-6">
        {{ $eventos->links() }}
    </div>

    @forelse ($eventos as $evento)
        @if ($loop->first)
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @endif

        <x-evento-card :titulo="$evento['titulo']" :fecha="$evento['fecha']" :lugar="$evento['lugar']" :descripcion="$evento['descripcion']" :imagen="$evento['imagen']"
            :precio="$evento['precio']" :publicado="$evento['publicado']" :destacado="$evento['destacado']" :cupos="$evento['cupo']">


            <x-slot:footer>
                <div class="flex justify-between">
                    <a href="{{ route('eventos.show', $evento) }}"
                        class="text-sm font-medium text-blue-600 hover:underline border bg-blue-100 px-4 py-2 rounded-xl">
                        Ver detalle
                    </a>
                    <a href="{{ route('eventos.edit', $evento) }}"
                        class="text-sm font-medium text-orange-600 hover:underline border bg-orange-100 px-4 py-2 rounded-xl">
                        Editar
                    </a>
                    <form action="{{ route('eventos.destroy', $evento) }}" method="post"
                        onsubmit="return confirm('Eliminar este evento?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm font-medium text-red-600 hover:underline border bg-red-100 px-4 py-2 rounded-xl">
                            Eliminar
                        </button>
                    </form>
                </div>

            </x-slot:footer>

        </x-evento-card>

        @if ($loop->last)
            </div>
        @endif
    @empty
        <p class="text-slate-500">
            No existen eventos programados.
        </p>
    @endforelse
</x-layout>
