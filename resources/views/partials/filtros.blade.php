<form
    action="{{ route('eventos.index') }}"
    method="get"
    class="mb-6 flex flex-wrap items-center gap-3"
>
    <select
        name="categoria"
        class="rounded-lg border-slate-300 text-sm"
    >
        <option value="">Todas</option>
        @foreach ( $categorias as $categoria )
            <option value="{{ $categoria->slug }}" @selected(request('categoria')=== $categoria->slug)>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>

    <label for="" class="flex items-center gap-2 text-sm text-slate-600">
        <input
            type="checkbox"
            name="solo_destacados"
            value="1"
            @checked(request('solo_destacados'))
            class=""
        >
        Sólo destacados
    </label>

    <label for="" class="flex items-center gap-2 text-sm text-slate-600">
        <input
            type="checkbox"
            name="solo_publicados"
            value="1"
            @checked(request('solo_publicados'))
            class=""
        >
        Sólo publicados
    </label>

    <button
        type="submit"
        class="text-sm bg-blue-600 rounded-lg px-4 py-2 text-white font-medium hover:bg-blue-700"
    >
        Filtrar
    </button>
</form>
