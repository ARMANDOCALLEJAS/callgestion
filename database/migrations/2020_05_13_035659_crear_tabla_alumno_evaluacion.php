<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAlumnoEvaluacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_evaluacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio_id');
            $table->integer('periodo_id');
            $table->integer('alumno_id')->unsigned();
            $table->integer('evaluacion_id')->unsigned();
            $table->float('nota', 8, 2);
            $table->double('valor', 6, 3);

            $table->foreign('anio_id')->references('id')->on('anios');
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('evaluacion_id')->references('id')->on('evaluaciones');
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
        Schema::dropIfExists('alumno_evaluacion');
    }
}
