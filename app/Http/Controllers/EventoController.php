<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index() {
        $eventos = [
            ['titulo' => 'Laravel Bolivia 2026', 'tipo' => 'Conferencia', 'lugar' => 'Auditorio UATF', 'fecha' => '20 de septiembre', 'destacado' => true, 'cupos' => 120, 'categoria' => 'Finanzas'],
            ['titulo' => 'Taller de Tailwind v4', 'tipo' => 'Taller', 'lugar' => 'Auditorio UATF', 'fecha' => '20 de septiembre', 'destacado' => true, 'cupos' => 0, 'categoria' => 'Tecnologia'],
            ['titulo' => 'Hackathon UATF', 'tipo' => 'Competencia', 'lugar' => 'Auditorio UATF', 'fecha' => '20 de septiembre', 'destacado' => false, 'cupos' => 20, 'categoria' => 'Cultura'],
            ['titulo' => 'Competencia de programación', 'tipo' => 'Cmpetencia', 'lugar' => 'Auditorio UATF', 'fecha' => '20 de septiembre', 'destacado' => false, 'cupos' => 70, 'categoria' => 'Deporte'],
            ['titulo' => 'Taller de Flutter', 'tipo' => 'Taller', 'lugar' => 'Auditorio UATF', 'fecha' => '20 de septiembre', 'destacado' => true, 'cupos' => 0, 'categoria' => 'Musica'],
        ];

        return view('eventos.index', compact('eventos'));
    }
}
