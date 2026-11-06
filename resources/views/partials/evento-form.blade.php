@php
    $evento = $evento ?? null;
    $campoBase =
        'mt-1 w-full rounded-lg border bg-white py-2 pl-10 pr-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2';
    $campoNormal = 'border-slate-300 focus:border-blue-500 focus:ring-blue-100';
    $campoError = 'border-rose-400 focus:border-rose-500 focus:ring-rose-100';

    $seleccionadas = old('etiquetas', $evento?->etiquetas->pluck('id')->all() ?? [])
@endphp

<div class="grid gap-8 p-6 lg:grid-cols-3">
    {{-- Datos principales --}}
    <section class="space-y-5 lg:col-span-2">
        <h2 class="text-lg font-semibold text-slate-900">Datos del evento</h2>

        <div>
            <label for="titulo" class="block text-sm font-medium text-slate-700">Título</label>
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-slate-400">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                </svg>
                <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $evento?->titulo) }}"
                    placeholder="Ej. Feria de Ciencias UATF"
                    class="{{ $campoBase }} {{ $errors->has('titulo') ? $campoError : $campoNormal }}">
            </div>
            @error('titulo')
                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="imagen" class="block text-sm font-medium text-slate-700">Imagen de portada</label>

            {{-- Solo en edicion: muestra la imagen actual y permite quitarla --}}
            @if ($evento)
               @if($evento?->imagen_url)
                <div>
                    <img src="{{ $evento->imagen_url }}" alt="Imagen actual">
                    <label>
                        <input type="checkbox" name="quitar_imagen"
                        value="1" @checked(old('quitar_imagen'))>
                        Quitar la imagen actual
                    </label>
                </div>
                @else
                    <p class="mt-1.5 text-xs text-slate-400">
                    Actualmente el evento no tiene una imagen de portada.
                    </p>
                @endif
            @endif

            <input type="file" name="imagen" id="imagen" accept="image/jpeg,image/png,image/webp"
            class="mt-2 block w-full cursor-pointer text-sm text-slate-600
            file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50 file:px-4 file:py-2
            file:text-sm file:font-medium file:text-blue-700 hover:file:bg-blue-100">
            <p class="mt-1.5 text-xs text-slate-400">
                JPG, PNG o WEBP, máximo de 2 MB.
            </p>

            {{-- Vista previa de la imagen recien elegida --}}
            <img id="vista-previa" src="" alt="Vista previa"
            class="mt-3 hidden h-48 w-full rounde-lg object-contein ring-1 ring-slate-200">

            @error('imagen')
                 <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="descripcion" class="block text-sm font-medium text-slate-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="8" placeholder="Describe de qué trata el evento..."
                class="{{ $campoBase }} pl-3! {{ $errors->has('descripcion') ? $campoError : $campoNormal }}">{{ old('descripcion', $evento?->descripcion) }}</textarea>
            @error('descripcion')
                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="fecha" class="block text-sm font-medium text-slate-700">Fecha y hora</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                    <input type="datetime-local" id="fecha" name="fecha"
                        value="{{ old('fecha', $evento?->fecha?->format('Y-m-d\TH:i')) }}"
                        class="{{ $campoBase }} {{ $errors->has('fecha') ? $campoError : $campoNormal }}">
                </div>
                @error('fecha')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="lugar" class="block text-sm font-medium text-slate-700">Lugar</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-rose-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <input type="text" id="lugar" name="lugar" value="{{ old('lugar', $evento?->lugar) }}"
                        placeholder="Ej. Auditorio Central"
                        class="{{ $campoBase }} {{ $errors->has('lugar') ? $campoError : $campoNormal }}">
                </div>
                @error('lugar')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </section>

    {{-- Configuración --}}
    <aside class="space-y-4">
        <div class="space-y-5 rounded-xl border border-slate-200 bg-slate-50 p-5">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-500">Configuración</h2>

            <div>
                <label for="categoria_id" class="block text-sm font-medium text-slate-700">Categoría</label>
                <select name="categoria_id" id="categoria_id"
                    class="px-3! {{ $campoBase }} {{ $errors->has('categoria_id') ? $campoError : $campoNormal }}">
                    <option value="">- Selecciones una categoría -</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @selected(old('categoria_id', $evento?->categoria_id) == $categoria->id)>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="cupo" class="block text-sm font-medium text-slate-700">Cupos</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-amber-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                    </svg>
                    <input type="number" id="cupo" name="cupo" min="1"
                        value="{{ old('cupo', $evento?->cupo) }}" placeholder="100"
                        class="{{ $campoBase }} {{ $errors->has('cupo') ? $campoError : $campoNormal }}">
                </div>
                @error('cupo')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="precio" class="block text-sm font-medium text-slate-700">Precio</label>
                <div class="relative">
                    <span
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 -translate-y-1/2 text-sm font-semibold text-emerald-600">Bs.</span>
                    <input type="number" id="precio" name="precio" step="0.01" min="0"
                        value="{{ old('precio', $evento?->precio ?? 0) }}"
                        class="{{ $campoBase }} {{ $errors->has('precio') ? $campoError : $campoNormal }}">
                </div>
                <p class="mt-1.5 text-xs text-slate-400">Usa 0 si el evento es gratuito.</p>
                @error('precio')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-3 border-t border-slate-200 pt-5">
                <label
                    class="flex cursor-pointer items-start gap-3 rounded-lg border border-slate-200 bg-white p-3 transition hover:border-blue-300 has-checked:border-blue-400 has-checked:bg-blue-50">
                    <input type="checkbox" name="publicado" value="1" class="mt-0.5 h-4 w-4 accent-blue-600"
                        @checked(old('publicado', $evento?->publicado))>
                    <span>
                        <span class="block text-sm font-medium text-slate-900">Publicado</span>
                        <span class="block text-xs text-slate-500">Visible en la cartelera.</span>
                    </span>
                </label>

                <label
                    class="flex cursor-pointer items-start gap-3 rounded-lg border border-slate-200 bg-white p-3 transition hover:border-amber-300 has-checked:border-amber-400 has-checked:bg-amber-50">
                    <input type="checkbox" name="destacado" value="1" class="mt-0.5 h-4 w-4 accent-amber-500"
                        @checked(old('destacado', $evento?->destacado))>
                    <span>
                        <span class="block text-sm font-medium text-slate-900">Destacado</span>
                        <span class="block text-xs text-slate-500">Se resalta con una insignia.</span>
                    </span>
                </label>
            </div>

            <fieldset class="space-y-3 border-t border-slate-200 pt-5">
                <legend class="contents">
                    <span class="block text-sm font-medium text-slate-700">Etiquetas</span>
                </legend>
                <p class="text-xs text-slate-500">Selecciona una o varias etiquetas.</p>

                @if ($etiquetas->isEmpty())
                    <p class="text-sm text-slate-400">No hay etiquetas registradas.</p>
                @else
                    <div class="flex flex-wrap gap-2">
                        @foreach ($etiquetas as $etiqueta)
                            <label
                                class="inline-flex cursor-pointer select-none items-center gap-1 rounded-full border border-slate-300 bg-white px-3 py-1 text-xs font-medium text-slate-600 transition hover:border-blue-300 hover:bg-blue-50 has-checked:border-blue-500 has-checked:bg-blue-600 has-checked:text-white has-focus-visible:ring-2 has-focus-visible:ring-blue-200">
                                <input type="checkbox" name="etiquetas[]" value="{{ $etiqueta->id }}" class="sr-only"
                                    @checked(in_array($etiqueta->id, $seleccionadas))>
                                <span class="opacity-60">#</span>{{ $etiqueta->nombre }}
                            </label>
                        @endforeach
                    </div>
                @endif

                @error('etiquetas')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
                @error('etiquetas.*')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </fieldset>
        </div>

        {{-- Acciones --}}
        <div class="flex gap-3">
            <a href="{{ $evento ? route('eventos.show', $evento) : route('eventos.index') }}"
                class="flex-1 rounded-lg border border-slate-300 bg-white px-4 py-2 text-center text-sm font-medium text-slate-700 hover:bg-slate-100">
                Cancelar
            </a>
            <button type="submit"
                class="flex-1 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                {{ $textoBoton }}
            </button>
        </div>
    </aside>
</div>

<script>
    document.getElementById('imagen').addEventListener('change', (e) => {
        const archivo = e.target.files[0];
        const vista = document.getElementById('vista-previa');

        if(!archivo) {
            vista.classList.add('hidden');
            return;
        }

        vista.src = URL.createObjectURL(archivo);
        vista.classList.remove('hidden');
    });
</script>
