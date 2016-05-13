<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCancionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancion', function (Blueprint $table) {
            $table->increments('id')->unique('pk_cancion');
            $table->integer('idcategoria')->unsigned();
            $table->string('titulo', 100)->nullable();
            $table->string('nota', 5)->nullable();
            $table->string('autor', 100)->nullable();
            $table->text('cuerpo')->nullable();
            $table->boolean('activo')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('idcategoria')->references('id')->on('catalogo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cancion');
    }
}
