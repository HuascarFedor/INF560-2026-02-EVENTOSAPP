<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = ['nombre', 'slug'];

    // Relaciones
    public function eventos(): HasMany
    {
        return $this->hasMany(Evento::class);
    }
}
