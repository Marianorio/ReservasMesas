<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleReservasTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_reservas', function (Blueprint $table) {
            $table->bigIncrements('nnumero_detalle'); // ID PK
            $table->unsignedBigInteger('nnumero_reserva'); // FK a reservas
            $table->unsignedBigInteger('id_usuario'); // FK a usuarios
            $table->unsignedBigInteger('id_mesa'); // FK a mesas
            $table->integer('cantidad_asientos');
            $table->timestamps();

            // Definición de claves foráneas
            $table->foreign('nnumero_reserva')->references('nnumero_reserva')->on('reservas')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_mesa')->references('id')->on('mesas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_reservas');
    }
}
