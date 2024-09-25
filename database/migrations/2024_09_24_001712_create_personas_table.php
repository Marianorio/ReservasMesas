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
        Schema::create('personas', function (Blueprint $table) {
            $table->id('nid_persona');  // ID autoincremental
            $table->string('nombre', 25);
            $table->string('apellido', 25);
            // $table->date('dfecha_nacimiento'); // Opcional
            // $table->string('telefono', 15)->nullable();  // Opcional
            // $table->string('direccion')->nullable();  // Opcional
            $table->string('email', 64)->unique();  // Puede ser necesario
            $table->timestamps();  // Timestamps para auditoría
            $table->softDeletes();  // Para eliminar registros sin borrarlos físicamente
            $table->engine = 'InnoDB';  // Asegura que se utilice InnoDB
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
