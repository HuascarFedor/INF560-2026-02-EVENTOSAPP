<form
    action="{{ route('eventos.index') }}"
    method="get"
    class="mb-6 flex flex-wrap items-center gap-3"
>
    <select
        name=""
        id=""
        class="rounded-lg border-slate-300 text-sm"
    >
        @foreach ( ['Todas', 'Tecnologia', 'Cultura', 'Deporte', 'Finanzas'] as $cat )
            <option value="{{ $cat }}" @selected(request('categoria')) === $cat>
                {{ $cat }}
            </option>
        @endforeach
    </select>

    <label for="" class="flex items-center gap-2 text-sm text-slate-600">
        <input
            type="checkbox"
            name="solo_destacados"
            value="1"
            id=""
            @checked(request('solo_destacados'))
            class=""
        >
        Solo destacados
    </label>

    <button
        type="submit"
        class="text-sm bg-blue-600 rounded-lg px-4 py-2 text-white font-medium hover:bg-blue-700"
    >
        Filtrar
    </button>
</form>
