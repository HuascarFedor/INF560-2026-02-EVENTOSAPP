<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
// Route::resource('eventos', EventoController::class);

Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
// Protegidas: requieren sesión iniciada
Route::middleware('auth')->group(function () {
    Route::resource('/eventos', EventoController::class)->except(['index', 'show']);
});
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');

Route::get('registro', [RegistroController::class, 'create'])->name('registro');
Route::post('registro', [RegistroController::class, 'store']);

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
