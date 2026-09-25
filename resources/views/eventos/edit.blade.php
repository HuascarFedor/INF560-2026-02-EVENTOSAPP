<x-layout title="Aplicación de Eventos UATF - Modificar Evento">
    <a href="{{ route('eventos.show', $evento) }}"
        class="mb-6 mt-4 inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 hover:text-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Volver al detalle
    </a>

    <form action="{{ route('eventos.update', $evento) }}" method="post"
        class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        @csrf
        @method('PUT')

        <div class="bg-linear-to-r from-orange-500 to-amber-500 px-6 py-8">
            <h1 class="text-2xl font-bold text-white sm:text-3xl">Modificar evento</h1>
            <p class="mt-1 text-sm text-orange-50">{{ $evento->titulo }}</p>
        </div>

        @include('partials.evento-form', ['textoBoton' => 'Guardar cambios'])
    </form>
</x-layout>
