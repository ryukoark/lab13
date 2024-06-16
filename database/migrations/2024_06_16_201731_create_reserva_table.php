<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva', function (Blueprint $table) {
            $table->increments('id_reserva');
            $table->string('codigo_libro', 50);
            $table->unsignedBigInteger('id_usuario');
            $table->string('dni', 50);
            $table->date('fecha_devolucion');
            $table->timestamps();

            $table->foreign('codigo_libro')->references('codigo_libro')->on('libros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva');
    }
}
