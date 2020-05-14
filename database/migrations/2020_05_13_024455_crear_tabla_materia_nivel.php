<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMateriaNivel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_nivel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('materia_id')->unsigned();
            $table->integer('nivel_id')->unsigned();

            $table->foreign('materia_id')->references('id')->on('materias');
            $table->foreign('nivel_id')->references('id')->on('niveles');

            $table->index(['materia_id', 'nivel_id']);
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
        Schema::dropIfExists('materia_nivel');
    }
}
