<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadASPsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
*/
    public function up()
    {
        Schema::create('actividad_a_s_ps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('asignatura');
            $table->string('profesor');
            $table->string('periodo');
            $table->unsignedInteger(('cant_estudiantes'));
            $table->string('evidencia');
            $table->timestamps();
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad_a_s_ps'); //
    }
}