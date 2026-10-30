@php
    $campoBase =
        'mt-1 w-full rounded-lg border bg-white py-2 pl-10 pr-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2';
    $campoNormal = 'border-slate-300 focus:border-blue-500 focus:ring-blue-100';
    $campoError = 'border-rose-400 focus:border-rose-500 focus:ring-rose-100';
    $iconoCandado =
        'M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z';
@endphp

<x-layout title="Aplicación de Eventos UATF - Crear cuenta">
    <form action="{{ route('registro') }}" method="POST"
        class="mx-auto mt-8 max-w-md overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        @csrf

        <div class="bg-linear-to-r from-blue-600 to-indigo-600 px-6 py-8">
            <h1 class="text-2xl font-bold text-white">Crear cuenta</h1>
            <p class="mt-1 text-sm text-blue-100">Regístrate para publicar y gestionar eventos.</p>
        </div>

        <div class="space-y-5 p-6">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Nombre</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Tu nombre"
                        autocomplete="name" autofocus
                        class="{{ $campoBase }} {{ $errors->has('name') ? $campoError : $campoNormal }}">
                </div>
                @error('name')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

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
                        placeholder="correo@ejemplo.com" autocomplete="email"
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconoCandado }}" />
                    </svg>
                    <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres"
                        autocomplete="new-password"
                        class="{{ $campoBase }} {{ $errors->has('password') ? $campoError : $campoNormal }}">
                </div>
                @error('password')
                    <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700">Repetir
                    contraseña</label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="pointer-events-none absolute left-3 top-1/2 mt-0.5 h-5 w-5 -translate-y-1/2 text-slate-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $iconoCandado }}" />
                    </svg>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="••••••••" autocomplete="new-password"
                        class="{{ $campoBase }} {{ $campoNormal }}">
                </div>
            </div>

            <button type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">
                Crear cuenta
            </button>

            <p class="text-center text-sm text-slate-500">
                ¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">Inicia sesión</a>
            </p>
        </div>
    </form>
</x-layout>
