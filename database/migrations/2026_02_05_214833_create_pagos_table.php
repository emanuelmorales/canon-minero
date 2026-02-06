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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('expte');

            // donde localidades es el nombre de ta tabla en la DB
            $table->foreignId('localidad_id')->constrained('localidades')->onDelete('cascade');
            $table->foreignId('mina_id')->constrained('minas')->onDelete('cascade');
            $table->foreignId('mineral_id')->constrained('minerals')->onDelete('cascade');
            $table->foreignId('propietario_id')->constrained('propietarios')->onDelete('cascade');

            $table->string('categoria');
            $table->string('pertenencia');
            $table->decimal('superficie', 10, 2);


            $table->foreignId('estado_exp_id')->constrained('estado_exps')->onDelete('cascade');

            $table->year('anioPago');
            $table->decimal('monto', 15, 2);
            $table->text('detalle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
