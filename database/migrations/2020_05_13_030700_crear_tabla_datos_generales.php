<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaDatosGenerales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_generales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',200);
            $table->string('jornada', 50);
            $table->string('calendario',10);
            $table->string('dir', 200);
            $table->integer('telefono');
            $table->string('rector', 100);
            $table->integer('doc_rector');
            $table->string('lema', 100);
            $table->integer('nit');
            $table->integer('inscripcion');
            $table->integer('departamento_id');
            $table->integer('municipio_id');

            $table->foreign('departamento_id', 'fk_departamento_departamentos')->references('id')->on('departamentos');
            $table->foreign('municipio_id', 'fk_municipio_municipios')->references('id')->on('municipios');

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
        Schema::dropIfExists('datos_generales');
    }
}
