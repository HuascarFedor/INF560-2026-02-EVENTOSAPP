@php
    $fechaEvento = $evento->fecha->locale('es');

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

<x-layout title="Aplicación de Eventos UATF - Detalles">
    <a href="{{ route('eventos.index') }}"
        class="mb-6 mt-4 inline-flex items-center gap-1.5 text-sm font-medium text-slate-500 hover:text-blue-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
        </svg>
        Volver a la cartelera
    </a>

    <article @class([
        'overflow-hidden rounded-2xl border bg-white',
        'border-slate-200 shadow-sm' => !$evento->destacado,
        'border-blue-400 shadow-lg shadow-blue-100 ring-1 ring-blue-400' => $evento->destacado,
    ])>
        {{-- Portada --}}
        <div class="relative h-64 w-full overflow-hidden bg-linear-to-br from-slate-100 to-slate-200 sm:h-80">
            @if ($evento->imagen)
                <img src="{{ $evento->imagen }}" alt="{{ $evento->titulo }}" class="h-full w-full object-cover">
            @else
                <div class="flex h-full w-full items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-20 w-20 text-slate-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
            @endif

            <div class="absolute inset-0 bg-linear-to-t from-slate-900/70 via-slate-900/10 to-transparent"></div>

            <div class="absolute left-4 top-4 flex flex-wrap gap-2">
                @if ($evento->destacado)
                    <span class="inline-flex items-center gap-1 rounded-full bg-linear-to-r from-amber-400 to-amber-500 px-3 py-1 text-xs font-semibold text-white shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-3.5 w-3.5">
                            <path d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006Z" />
                        </svg>
                        Destacado
                    </span>
                @endif

                @unless ($evento->publicado)
                    <span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-medium text-amber-700">
                        Borrador
                    </span>
                @endunless
            </div>

            <span class="absolute right-4 top-4 rounded-full px-3 py-1 text-xs font-medium {{ $tiempoColor }}">
                {{ $tiempoRestante }}
            </span>

            <div class="absolute bottom-0 left-0 right-0 p-6">
                <h1 class="text-2xl font-bold text-white drop-shadow sm:text-3xl">
                    {{ $evento->titulo }}
                </h1>
            </div>
        </div>

        <div class="grid gap-8 p-6 lg:grid-cols-3">
            {{-- Descripción --}}
            <section class="lg:col-span-2">
                <h2 class="mb-3 text-lg font-semibold text-slate-900">Acerca del evento</h2>
                <p class="whitespace-pre-line leading-relaxed text-slate-600">
                    {{ $evento->descripcion }}
                </p>
            </section>

            {{-- Información --}}
            <aside class="space-y-4">
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-wide text-slate-500">Información</h2>

                    <dl class="space-y-4 text-sm">
                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-blue-100 p-2 text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                </svg>
                            </div>
                            <div>
                                <dt class="text-slate-500">Fecha</dt>
                                <dd class="font-medium text-slate-900">{{ ucfirst($fechaEvento->translatedFormat('l, d \d\e F \d\e Y')) }}</dd>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-violet-100 p-2 text-violet-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </div>
                            <div>
                                <dt class="text-slate-500">Hora</dt>
                                <dd class="font-medium text-slate-900">{{ $fechaEvento->format('H:i') }}</dd>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-rose-100 p-2 text-rose-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <div>
                                <dt class="text-slate-500">Lugar</dt>
                                <dd class="font-medium text-slate-900">{{ $evento->lugar }}</dd>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-emerald-100 p-2 text-emerald-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>
                            </div>
                            <div>
                                <dt class="text-slate-500">Precio</dt>
                                <dd class="font-medium text-slate-900">
                                    {{ $evento->precio > 0 ? 'Bs. '.number_format($evento->precio, 2) : 'Gratis' }}
                                </dd>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="rounded-lg bg-amber-100 p-2 text-amber-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                                </svg>
                            </div>
                            <div>
                                <dt class="text-slate-500">Cupos</dt>
                                <dd class="font-medium {{ $evento->cupo > 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                                    {{ $evento->cupo > 0 ? "{$evento->cupo} disponibles" : 'Agotado' }}
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>

                {{-- Acciones --}}
                <div class="flex gap-3">
                    <a href="{{ route('eventos.edit', $evento) }}"
                        class="flex-1 rounded-lg bg-orange-500 px-4 py-2 text-center text-sm font-medium text-white hover:bg-orange-600">
                        Editar
                    </a>
                    <form action="{{ route('eventos.destroy', $evento) }}" method="post" class="flex-1"
                        onsubmit="return confirm('Eliminar este evento?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                            Eliminar
                        </button>
                    </form>
                </div>

                <p class="text-center text-xs text-slate-400">
                    Última actualización {{ $evento->updated_at?->locale('es')->diffForHumans() }}
                </p>
            </aside>
        </div>
    </article>
</x-layout>
