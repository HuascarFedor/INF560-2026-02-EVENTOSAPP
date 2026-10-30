<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etiquetas = Etiqueta::pluck('id');

        Evento::factory()->count(20)->create()
            ->each(fn (Evento $evento) => $evento->etiquetas()->attach($etiquetas->random(rand(1, 3))));
    }
}
