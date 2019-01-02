<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_extensions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('localizacion');
            $table->date('fecha');
            $table->unsignedInteger(('cant_asistentes'));
            $table->string('evidencia');
            $table->unsignedInteger('convenio_id')->nullable();
            $table->foreign('convenio_id')->references('id')->on('convenios');
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
        Schema::dropIfExists('actividad_extensions');
    }
}
