<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = ['Gratis', 'Aire libre', 'Música', 'Académico', 'Taller', 'Networking'];

        foreach ($nombres as $nombre) {
            Etiqueta::create(['nombre' => $nombre, 'slug' => Str::slug($nombre)]);
        }
    }
}
