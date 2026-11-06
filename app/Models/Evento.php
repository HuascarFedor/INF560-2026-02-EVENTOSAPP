<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        'categoria_id',
    ];

    // Conversion automática de tipos al leer/escribir
    protected $casts = [
        'fecha' => 'datetime',
        'precio' => 'decimal:2',
        'publicado' => 'boolean',
        'destacado' => 'boolean',
    ];

    // Relaciones
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function etiquetas(): BelongsToMany
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    public function usuario(): BelongsTo
    {
        // el nombre del método (usuario) no coincide con la columna de la tabla
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function imagenUrl() : Attribute
    {
        return Attribute::get(
            function(): ?string {
                if(! $this->imagen) {
                    return null;
                }
                if(Str::startsWith($this->imagen, ['http://', 'https://'])) {
                    return $this->imagen;
                }
                return Storage::disk('public')->url($this->imagen);
            }
        );
    }
}
