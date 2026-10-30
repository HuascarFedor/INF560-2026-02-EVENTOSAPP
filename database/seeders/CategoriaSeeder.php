<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['Cultura', 'Deporte', 'Finanzas', 'Investigación', 'Bases de datos', 'Programación'] as $nombre) {
            Categoria::create([
                'nombre' => $nombre,
                'slug' => Str::slug($nombre),
            ]);
        }
    }
}
