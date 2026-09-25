<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderByDesc('created_at')->latest()->paginate(3);
        return view('eventos.index', compact('eventos'));
    }

    public function create() {
        return view('eventos.create');
    }

    public function store(Request $request) {
        // dd($request);
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'cupo' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'publicado' => ['nullable', 'boolean'],
            'destacado' => ['nullable', 'boolean'],
        ]);

        $datos['slug'] = Str::slug($datos['titulo']);
        $datos['publicado'] = $request->has('publicado') ? 1 : 0;
        $datos['destacado'] = $request->has('destacado') ? 1 : 0;

        Evento::create($datos);

        return redirect()->route('eventos.index')
                        ->with('exito', 'Evento creado exitosamente.');
    }

    public function show(Evento $evento) {
        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento) {
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento) {
        //dd($request);
        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'cupo' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'publicado' => ['nullable', 'boolean'],
            'destacado' => ['nullable', 'boolean'],
        ]);

        $datos['slug'] = Str::slug($datos['titulo']);
        $datos['publicado'] = $request->has('publicado') ? 1 : 0;
        $datos['destacado'] = $request->has('destacado') ? 1 : 0;

        $evento->update($datos);

        return redirect()->route('eventos.index')
                        ->with('exito', 'Evento actualizado correctamente.');
    }

    public function destroy(Evento $evento) {
        $evento->delete();

        return redirect()->route('eventos.index')
                        ->with('exito', 'Evento eliminado correctamente.');
    }
}
