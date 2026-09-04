<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800" >
    <main class="mx-auto max-w-3xl">
        <h1 class="mb-6 text-2xl font-bold text-center">
            Cartelera de Eventos
        </h1>
        @forelse ( $eventos as $evento )
           <article @class([
            'mb-4 rounded-xl border p-5 transtion',
            'border-slate-200 bg-white' => !$evento['destacado'],
            'border-blue-500 bn-blue-50 shadow' => $evento['destacado']
           ])>
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold">
                        {{ $evento['titulo'] }}
                        @if ( $loop->first )
                            <span class="font-mono text-xs text-blue-600">
                                PROXIMO
                            </span>
                        @endif
                    </h2>
                </div>

                <p class="text-sm text-slate-500">
                    {{ $evento['fecha'] }} - {{ $evento['lugar']  }}
                </p>

                @if ( $evento['cupos'] > 0 )
                    <p class="text-sm text-emerald-600">
                        {{ $evento['cupos'] }} cupos disponibles
                    </p>
                @else
                    <p class="text-sm text-rose-600">
                        Agotado
                    </p>
                @endif
           </article>
        @empty
            <p class="text-slate-500">
                No existen eventos programados.
            </p>
        @endforelse
    </main>
</body>
</html>
