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

    @forelse ($eventos as $evento)
        <x-evento-card
            :titulo="$evento['titulo']"
            :tipo="$evento['tipo']"
            :fecha="$evento['fecha']"
            :lugar="$evento['lugar']"
            :destacado="$evento['destacado']"
            :cupos="$evento['cupos']"
            class="mb-4"
        >

            <x-slot:badge>
                <x-badge :categoria="$evento['categoria']" />
            </x-slot:badge>

            @if ($evento['cupos'] > 0)
                <x-slot:footer>
                    <a href="#" class="text-sm font-medium text-blue-600 hover:underline border bg-blue-100 px-4 py-2 rounded-xl">
                        Ver detalle
                    </a>
                </x-slot:footer>
            @endif
        </x-evento-card>
    @empty
        <p class="text-slate-500">
            No existen eventos programados.
        </p>
    @endforelse
    </main>
</x-layout>
