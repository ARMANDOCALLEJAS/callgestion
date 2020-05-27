<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAlumnoPago extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_pago', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('alumno_id')->unsigned();
            $table->integer('pago_id')->unsigned();
            $table->float('pago', 8, 2);

            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('pago_id')->references('id')->on('pagos');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_pago');
    }
}
