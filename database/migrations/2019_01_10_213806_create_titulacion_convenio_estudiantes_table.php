<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulacionConvenioEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulacion_convenio_estudiantes', function (Blueprint $table) {
            $table->unsignedInteger('titulacion_convenio_id');
            $table->foreign('titulacion_convenio_id')->references('id')->on('titulacion_convenios');
            $table->string('nombre');
            $table->string('rut');
            $table->string('carrera');
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
        Schema::dropIfExists('titulacion_convenio_estudiantes');
    }
}
