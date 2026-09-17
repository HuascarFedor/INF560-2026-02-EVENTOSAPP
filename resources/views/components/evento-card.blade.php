@props(['titulo', 'fecha', 'lugar', 'destacado', 'cupos', 'descripcion' => null, 'imagen' => null, 'precio' => null, 'publicado' => true])

@php
    $fechaEvento = $fecha->locale('es');

    if ($fechaEvento->isToday()) {
        $tiempoRestante = 'Hoy';
        $tiempoColor = 'bg-emerald-100 text-emerald-700';
    } elseif ($fechaEvento->isFuture()) {
        $tiempoRestante = 'Faltan '.$fechaEvento->diffForHumans(now(), true);
        $tiempoColor = 'bg-blue-100 text-blue-700';
    } else {
        $tiempoRestante = 'Finalizado';
        $tiempoColor = 'bg-slate-200 text-slate-500';
    }
@endphp

<article @class([
    'group overflow-hidden rounded-2xl border bg-white transition duration-300 hover:-translate-y-1 hover:shadow-xl',
    'border-slate-200 shadow-sm' => !$destacado,
    'border-blue-400 shadow-lg shadow-blue-100 ring-1 ring-blue-400' => $destacado,
])>
    <div class="relative h-48 w-full overflow-hidden bg-linear-to-br from-slate-100 to-slate-200">
        @if ($imagen)
            <img
                src="{{ $imagen }}"
                alt="{{ $titulo }}"
                class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
            >
        @else
            <div class="flex h-full w-full items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-14 w-14 text-slate-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
        @endif

        @if ($destacado)
            <span class="absolute left-3 top-3 inline-flex items-center gap-1 rounded-full bg-linear-to-r from-amber-400 to-amber-500 px-3 py-1 text-xs font-semibold text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-3.5 w-3.5">
                    <path d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006Z" />
                </svg>
                Destacado
            </span>
        @endif

        @if (!is_null($precio))
            <span class="absolute right-3 top-3 rounded-full bg-slate-900/80 px-3 py-1 text-xs font-bold text-white backdrop-blur">
                {{ $precio > 0 ? 'Bs. '.number_format($precio, 2) : 'Gratis' }}
            </span>
        @endif
    </div>

    <div class="p-5">
        <div class="mb-2 flex items-center justify-end">
            <span class="whitespace-nowrap rounded-full px-2.5 py-1 text-xs font-medium {{ $tiempoColor }}">
                {{ $tiempoRestante }}
            </span>
        </div>

        <h2 class="text-lg font-bold text-slate-900 line-clamp-2">
            {{ $titulo }}
        </h2>

        @unless ($publicado)
            <span class="mt-1 inline-block rounded-full bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-700">
                Borrador
            </span>
        @endunless

        <div class="mt-3 space-y-1.5 text-sm text-slate-500">
            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 shrink-0 text-slate-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                </svg>
                {{ $fechaEvento->translatedFormat('d \d\e M, H:i') }}
            </div>

            <div class="flex items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 shrink-0 text-slate-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                {{ $lugar }}
            </div>
        </div>

        @if ($descripcion)
            <p class="mt-3 text-sm text-slate-600 line-clamp-2">
                {{ $descripcion }}
            </p>
        @endif

        <div class="mt-4 flex items-center gap-1.5 border-t border-slate-100 pt-3 text-sm font-medium {{ $cupos > 0 ? 'text-emerald-600' : 'text-rose-600' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
            </svg>
            {{ $cupos > 0 ? "$cupos cupos disponibles" : 'Agotado' }}
        </div>

        @isset($footer)
            <div class="mt-4 border-t border-slate-100 pt-3">
                {{ $footer }}
            </div>
        @endisset
    </div>
</article>
