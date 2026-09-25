@props(['title' => 'Eventos App'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-full bg-slate-50 text-slate-800">
    <x-navbar />

    <main class="mx-auto max-w-6xl p-6">
        @if (session('exito'))
            <div class="bg-green-50 text-sm p-3 rounded-md flex gap-3 border border-green-100 max-sm:items-start dark:bg-green-900/20 dark:border-green-800/40"
                role="alert">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                    <p class="text-green-900 font-medium dark:text-green-300">Success!</p>
                    <p class="text-green-900 dark:text-green-400">
                        {{ session('exito') }}
                    </p>
                </div>
                <button type="button" aria-label="Dismiss success alert"
                    class="dismiss-btn ml-auto flex items-center opacity-70 hover:opacity-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="size-2.5 cursor-pointer fill-green-800 dark:fill-green-300" aria-hidden="true"
                        viewBox="0 0 329.269 329">
                        <path
                            d="M194.8 164.77 323.013 36.555c8.343-8.34 8.343-21.825 0-30.164-8.34-8.34-21.825-8.34-30.164 0L164.633 134.605 36.422 6.391c-8.344-8.34-21.824-8.34-30.164 0-8.344 8.34-8.344 21.824 0 30.164l128.21 128.215L6.259 292.984c-8.344 8.34-8.344 21.825 0 30.164a21.27 21.27 0 0 0 15.082 6.25c5.46 0 10.922-2.09 15.082-6.25l128.21-128.214 128.216 128.214a21.27 21.27 0 0 0 15.082 6.25c5.46 0 10.922-2.09 15.082-6.25 8.343-8.34 8.343-21.824 0-30.164zm0 0" />
                    </svg>
                </button>
            </div>
        @endif
        {{ $slot }}
    </main>

    <x-footer />
</body>

</html>
