<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->unique();
            $table->unsignedinteger('year_inicio');
            $table->unsignedInteger('year_termino');
            $table->string('descripcion',500);
            $table->string('formula');
            $table->string('tipo_evidencia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indicadors');
    }
}
