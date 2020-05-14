<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEvaluaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('grado_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->enum('tipo', ['EXA', 'LOG', 'REC']);
            $table->float('porcentaje', 8, 2);
            $table->char('periodo', 1);
            $table->integer('posicion');

            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
}
