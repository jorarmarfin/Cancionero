<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeleccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleccion', function (Blueprint $table) {
            $table->increments('id')->unique('pk_seleccion');
            $table->string('nombre');
            $table->integer('idcancion')->unsigned();
            $table->integer('orden');
            $table->timestamps();
            $table->foreign('idcancion')->references('id')->on('cancion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seleccion');
    }
}
