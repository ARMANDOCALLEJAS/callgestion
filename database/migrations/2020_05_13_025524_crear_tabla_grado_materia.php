<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaGradoMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grado_materia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('grado_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->integer('docente_id')->unsigned()->nullable();

            $table->foreign('grado_id')->references('id')->on('grados');
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->index(['grado_id', 'materia_id']);
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
        Schema::dropIfExists('grado_materia');
    }
}
