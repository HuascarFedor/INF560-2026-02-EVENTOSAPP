<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        // $eventos = Evento::orderByDesc('created_at')->latest()->paginate(3);
        // $eventos = Evento::with('categoria')->latest()->paginate(3);

        $eventos = Evento::with(['categoria', 'etiquetas', 'usuario'])
            ->when($request->input('categoria'), fn ($query, $slug) => $query->whereRelation('categoria', 'slug', $slug))
            ->when($request->input('solo_destacados'), fn ($query) => $query->where('destacado', true))
            ->when($request->input('solo_publicados'), fn ($query) => $query->where('publicado', true))
            ->latest()
            ->paginate(3)
            ->withQueryString();
        $categorias = Categoria::orderBy('nombre')->get();

        return view('eventos.index', compact('eventos', 'categorias'));
    }

    public function create()
    {
        $this->authorize('create', Evento::class);

        $categorias = Categoria::orderBy('nombre')->get();
        $etiquetas = Etiqueta::orderBy('nombre')->get();

        return view('eventos.create', compact('categorias', 'etiquetas'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->authorize('create', Evento::class);

        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'cupo' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'publicado' => ['nullable', 'boolean'],
            'destacado' => ['nullable', 'boolean'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'etiquetas' => ['nullable', 'array'],
            'etiquetas.*' => ['integer', 'exists:etiquetas,id'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        unset($datos['imagen']);
        if($request->hasFile('imagen')){
            $datos['imagen'] = $request->file('imagen')->store('eventos', 'public');
        }

        $datos['slug'] = Str::slug($datos['titulo']).'-'.fake()->unique()->numberBetween(1, 99999);
        $datos['publicado'] = $request->has('publicado') ? 1 : 0;
        $datos['destacado'] = $request->has('destacado') ? 1 : 0;

        // $evento = Evento::create($datos);

        // Crea un evento adjunto el usuario que lo creo
        $evento = $request->user()->eventos()->create($datos);

        $evento->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('eventos.index')
            ->with('exito', 'Evento creado exitosamente.');
    }

    public function show(Evento $evento)
    {
        $evento->load(['categoria', 'etiquetas', 'usuario']);

        return view('eventos.show', compact('evento'));
    }

    public function edit(Evento $evento)
    {
         $this->authorize('update', $evento);

        $categorias = Categoria::orderBy('nombre')->get();
        $etiquetas = Etiqueta::orderBy('nombre')->get();

        return view('eventos.edit', compact('evento', 'categorias', 'etiquetas'));
    }

    public function update(Request $request, Evento $evento)
    {
        // dd($request);
        $this->authorize('update', $evento);

        $datos = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'cupo' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'publicado' => ['nullable', 'boolean'],
            'destacado' => ['nullable', 'boolean'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'etiquetas' => ['nullable', 'array'],
            'etiquetas.*' => ['integer', 'exists:etiquetas,id'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        unset($datos['imagen']);
        $imagenAnterior = $evento->imagen;

        if($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('eventos', 'public');
        } elseif($request->boolean('quitar_imagen')) {
            $datos['imagen'] = null;
        }

        if($request->hasFile('imagen')){
            $datos['imagen'] = $request->file('imagen')->store('eventos', 'public');
        }

        $datos['slug'] = Str::slug($datos['titulo']).'-'.fake()->unique()->numberBetween(1, 99999);
        $datos['publicado'] = $request->has('publicado') ? 1 : 0;
        $datos['destacado'] = $request->has('destacado') ? 1 : 0;

        $evento->update($datos);
        $evento->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route('eventos.index')
            ->with('exito', 'Evento actualizado correctamente.');
    }

    public function destroy(Evento $evento)
    {
        $this->authorize('delete', $evento);

        $imagen = $evento->imagen;
        $evento->delete();
        if($imagen) {
            Storage::disk('public')->delete($imagen);
        }

        return redirect()->route('eventos.index')
            ->with('exito', 'Evento eliminado correctamente.');
    }
}
