<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderByDesc('destacado')->latest()->paginate(3);

        return view('eventos.index', compact('eventos'));
    }
}
