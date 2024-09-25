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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('nnumero_reserva');  // ID autoincremental
            $table->string('ccodigo_verificacion', 6)->nullable();
            $table->date('dfecha');
            $table->time('dhora');
            $table->integer('duracion_reserva')->nullable();  // Nueva columna para duración de la reserva
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente'); // Estado de la reserva
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
