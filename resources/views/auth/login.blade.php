@php
    $campoBase =
        'mt-1 w-full rounded-lg border bg-white py-2 pl-10 pr-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2';
    $campoNormal = 'border-slate-300 focus:border-blue-500 focus:ring-blue-100';
    $campoError = 'border-rose-400 focus:border-rose-500 focus:ring-rose-100';
@endphp

<x-layout title="Aplicación de Eventos UATF - Iniciar sesión">
    <form action="{{ route('login') }}" method="POST"
        class="mx-auto mt-8 max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        @csrf

        <div class="bg-linear-to-r from-blue-600 to-indigo-600 px-6 py-8">
            <h1 class="text-2xl font-bold text-white">Iniciar sesión</h1>
            <p class="mt-1 text-sm text-blue-100">Ingresa tus credenciales para gestionar tus eventos.</p>
        </div>

        <div class="space-y-5 p-6">
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Correo electrónico</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        placeholder="correo@ejemplo.com" autocomplete="email" autofocus
                        class="{{ $campoBase }} {{ $errors->has('email') ? $campoError : $campoNormal }}">
                </div>
                @error('email')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">Contraseña</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                    <input type="password" id="password" name="password" placeholder="••••••••"
                        autocomplete="current-password"
                        class="{{ $campoBase }} {{ $errors->has('password') ? $campoError : $campoNormal }}">
                </div>
                @error('password')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <label
                class="flex cursor-pointer items-start gap-3 rounded-lg border border-slate-200 bg-white p-3 transition hover:border-blue-300 has-checked:border-blue-400 has-checked:bg-blue-50">
                <input type="checkbox" name="recuerdame" value="1" class="mt-0.5 h-4 w-4 accent-blue-600"
                    @checked(old('recuerdame'))>
                <span>
                    <span class="block text-sm font-medium text-slate-900">Recuérdame</span>
                    <span class="block text-xs text-slate-500">Mantener la sesión iniciada en este dispositivo.</span>
                </span>
            </label>

            <button type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Iniciar sesión
            </button>

            <p class="text-center text-sm text-slate-500">
                ¿No tienes una cuenta?
                <a href="{{ route('registro') }}" class="font-medium text-blue-600 hover:underline">Regístrate</a>
            </p>
        </div>
    </form>
</x-layout>
