<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaGrados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nivel_id')->unsigned();
            $table->integer('anio_id')->unsigned();
            $table->integer('docente_id')->unsigned();
            $table->string('codigo', 10)->unique();
            $table->char('seccion', 1)->nullable();
            $table->boolean('estado');

            $table->foreign('nivel_id')->references('id')->on('niveles');
            $table->foreign('anio_id')->references('id')->on('anios');
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->index(['nivel_id', 'anio_id', 'seccion']);
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
        Schema::dropIfExists('grados');
    }
}
