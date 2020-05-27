<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAlumnoValor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_valor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio_id');
            $table->integer('alumno_id')->unsigned();
            $table->integer('valor_id')->unsigned();
            $table->integer('grado_id')->unsigned();
            $table->char('periodo', 1);
            $table->string('nota', 2)->nullable();

            $table->foreign('anio_id')->references('id')->on('anios');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('valor_id')->references('id')->on('valores');
            $table->foreign('grado_id')->references('id')->on('grados');
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
        Schema::dropIfExists('alumno_valor');
    }
}
