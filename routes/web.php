<?php

use App\Http\Controllers\EventoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');

Route::resource('eventos', EventoController::class);
