<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    // Permite utilizar el modelo desde una Factory
    use HasFactory;

    // La tabla asociada al modelo
    protected $table = 'eventos';

    // Columnas que se puede aignar de forma masiva
    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'fecha',
        'lugar',
        'cupo',
        'precio',
        'imagen',
        'publicado',
        'destacado',
    ];

    // Conversion automática de tipos al leer/escribir
    protected $casts = [
        'fecha' => 'datetime',
        'precio' => 'decimal:2',
        'publicado' => 'boolean',
        'destacado' => 'boolean',
    ];
}
