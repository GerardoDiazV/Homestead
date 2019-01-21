<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadASPProfesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_a_s_p_profesors', function (Blueprint $table) {
            $table->unsignedInteger('actividad_asp_id');
            $table->foreign('actividad_asp_id')->references('id')->on('actividad_a_s_ps')
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
        Schema::dropIfExists('actividad_a_s_p_profesors');
    }
}
