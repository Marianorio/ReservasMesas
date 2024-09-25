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
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_mesas')->unique();
            $table->integer('cantidad_asientos');
            $table->boolean('disponibilidad')->default(true);
            $table->integer('reservas_activas')->default(0);
            $table->text('comentarios')->nullable();  // Nueva columna para comentarios
            $table->unsignedBigInteger('nid_persona');  // Asegúrate de que sea el mismo tipo que en personas
            $table->foreign('nid_persona')
                ->references('nid_persona')
                ->on('personas')
                ->onDelete('cascade');  // Opcional: elimina las mesas si se elimina una persona
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
