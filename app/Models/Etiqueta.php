<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Etiqueta extends Model
{
    protected $table = 'etiquetas';

    protected $fillable = ['nombre', 'slug'];

    // Relaciones

    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Evento::class);
    }
}
