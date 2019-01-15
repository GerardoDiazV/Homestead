<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulacionConvenioProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulacion_convenio_profesors', function (Blueprint $table) {
            $table->unsignedInteger('titulacion_convenio_id');
            $table->foreign('titulacion_convenio_id')->references('id')->on('titulacion_convenios')
                ->onDelete('cascade');
            $table->string('nombre_profesor');
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
        Schema::dropIfExists('titulacion_convenio_profesors');
    }
}
