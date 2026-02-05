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
        Schema::create('minas', function (Blueprint $table) {
            $table->id();

            // crramos los campos relacionales para que al momento de eliminar se borren en cascada
            $table->foreignId('grupominero_id')->constrained('grupo_mineros')->onDelete('cascade');
            // fin campos relacionales

            $table->string('nombre');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('minas');
    }
};
