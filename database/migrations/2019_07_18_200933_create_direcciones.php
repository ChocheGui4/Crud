<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('calle');
            $table->string('numero');
            $table->string('colonia');            
            $table->string('delegacion');
            $table->integer('usuarios_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('direcciones');
    }
}
