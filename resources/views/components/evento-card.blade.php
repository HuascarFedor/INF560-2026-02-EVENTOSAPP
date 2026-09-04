@props(['titulo', 'tipo', 'fecha', 'lugar', 'destacado', 'cupos'])

<article @class([
    'mb-4 rounded-xl border p-5 transtion',
    'border-slate-200 bg-white' => !$destacado,
    'border-blue-500 bn-blue-50 shadow' => $destacado,
])>
    <div class="flex items-center justify-between">
        <div class="flex">
            <h2 class="text-lg font-semibold mr-2">
                {{ $titulo }}
            </h2>
            {{ $badge ?? '' }}
        </div>

        <span>
            {{ $tipo }}
        </span>
    </div>

    <p class="text-sm text-slate-500">
        {{ $fecha }} - {{ $lugar }}
    </p>

    @if ($cupos > 0)
        <p class="text-sm text-emerald-600">
            {{ $cupos }} cupos disponibles
        </p>
    @else
        <p class="text-sm text-rose-600">
            Agotado
        </p>
    @endif

    @isset($footer)
        <div class="mt-4 border-slate-300 border-t pt-3">
            {{ $footer }}
        </div>
    @endisset
</article>
