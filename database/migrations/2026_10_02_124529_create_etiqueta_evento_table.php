<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etiqueta_evento', function (Blueprint $table) {
            $table->foreignId('etiqueta_id')->constrained()->cascadeOnDelete();
            $table->foreignId('evento_id')->constrained()->cascadeOnDelete();
            $table->primary(['etiqueta_id', 'evento_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etiqueta_evento');
    }
};
