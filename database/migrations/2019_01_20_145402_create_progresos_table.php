<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresos', function (Blueprint $table) {
            $table->unsignedInteger('indicador_id');
            $table->foreign('indicador_id')->references('id')->on('indicadors')
                ->onDelete('cascade');
            $table->unsignedInteger('year');
            $table->integer('valor_progreso');
            $table->string('nombre');
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
        Schema::dropIfExists('progresos');
    }
}
