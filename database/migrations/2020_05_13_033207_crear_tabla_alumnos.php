<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAlumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('municipio_id')->unsigned();
            $table->char('codigo', 20)->unique();
            $table->char('doc', 20)->unique();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->date('fecha_nacimiento');
            $table->enum('genero', ['F', 'M']);
            $table->string('direccion', 400)->nullable();
            $table->char('telefono', 15);
            $table->string('responsable', 200);
            $table->char('telresponsable');
            $table->boolean('estado');
            $table->integer('grado_id');
            $table->foreign('grado_id')->references('id')->on('grados');
            $table->date('fmatricula');
            $table->string('rh', 10);
            $table->string('tiposangre', 20);


            $table->foreign('municipio_id')->references('id')->on('municipios');
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
        Schema::dropIfExists('alumnos');
    }
}
