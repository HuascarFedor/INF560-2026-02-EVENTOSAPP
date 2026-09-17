@push('scripts')
    <script>
        alert("hola")
    </script>
@endpush

<x-layout title="Aplicación de Eventos UATF">
    <h1 class="mb-6 text-2xl font-bold text-center">
        Cartelera de Eventos
    </h1>

    @include('partials.filtros')

    <div class="mb-6">
        {{ $eventos->links() }}
    </div>

    @forelse ($eventos as $evento)
        @if ($loop->first)
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @endif

        <x-evento-card
            :titulo="$evento['titulo']"
            :fecha="$evento['fecha']"
            :lugar="$evento['lugar']"
            :descripcion="$evento['descripcion']"
            :imagen="$evento['imagen']"
            :precio="$evento['precio']"
            :publicado="$evento['publicado']"
            :destacado="$evento['destacado']"
            :cupos="$evento['cupo']"
        >

            @if ($evento['cupo'] > 0)
                <x-slot:footer>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline border bg-blue-100 px-4 py-2 rounded-xl">
                        Ver detalle
                    </a>
                </x-slot:footer>
            @endif
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
