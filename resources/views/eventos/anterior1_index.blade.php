<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eventos App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50">
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">

            <a href="#" class="
                text-lg
                font-bold
                text-slate-600
                transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Eventos App</a>

            <div class="hidden sm:flex items-center gap-6 text-sm text-slate-600">
                <a href="#" class="
                transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Inicio</a>
                <a href="#" class="
                transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Eventos</a>
                <a href="#" class="
                 transition-colors
                hover:text-blue-600
                focus:text-blue-700
            ">Acerca de</a>
            </div>

            <button class="sm:hidden text-slate-600">
                Menú
            </button>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto py-8 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($eventos as $evento)
            <div class="bg-white rounded-xl shadow-md p-6 max-w-sm">
                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded inline-block">
                    {{ $evento['tipo'] }}
                </span>
                <h3 class="mt-3 text-lg font-bold text-slate-900">
                    {{ $evento['titulo'] }}
                </h3>
                <p class="mt-1 text-sm text-slate-500">
                    {{ $evento['lugar'] }} - {{ $evento['fecha'] }}
                </p>
                <p class="mt-3 text-sm text-slate-600">
                    Charlas sobre desarrollo web moderno con la comunidad local.
                </p>
                <button class="
                    bg-blue-600
                    text-white
                    text-sm
                    font-medium
                    py-2
                    w-full
                    mt-4
                    rounded-lg
                    hover:bg-blue-700
                    active:bg-blue-800
                    focus:ring-2 focus:ring-blue-300
                    cursor-pointer
                ">
                    Ver Detalles
                </button>
            </div>
            @endforeach
        </div>

        <br>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($eventos as $evento)
            <a href="#" class="
                group
                block
                bg-white
                rounded-xl
                shadow-md p-6
                transition
                hover:shadow-xl
            ">
                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded inline-block">
                    {{ $evento['tipo'] }}
                </span>
                <h3 class="mt-3 text-lg font-bold text-slate-900">
                    {{ $evento['titulo'] }}
                </h3>
                <p class="mt-1 text-sm text-slate-500">
                    {{ $evento['lugar'] }} - {{ $evento['fecha'] }}
                </p>
                <p class="mt-3 text-sm text-slate-600">
                    Charlas sobre desarrollo web moderno con la comunidad local.
                </p>
            </a>
            @endforeach
        </div>

        <br>

        <div class="max-w-sm">
            <input type="email" placeholder="corre@uatf.edu.bo" class="peer w-full border border-slate-300 rounded-lg px-3 py-2 focus:border-blue-500  focus:outline-none">
            <p class="mt-1 text-xs text-slate-400 peer-focus:text-blue-600">
                Le enviaremos la confirmación a este correo.
            </p>
        </div>
    </div>
</body>

</html>
