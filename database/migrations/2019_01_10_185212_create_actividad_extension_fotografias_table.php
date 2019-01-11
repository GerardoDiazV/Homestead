<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadExtensionFotografiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_extension_fotografias', function (Blueprint $table) {
            $table->unsignedInteger('actividad_extension_id');
            $table->foreign('actividad_extension_id')->references('id')->on('actividad_extensions');
            $table->string('fotografia');
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
        Schema::dropIfExists('actividad_extension_fotografias');
    }
}
