<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         schema::create('Categorias', function (Blueprint $table) {
            $table->increments('categoria_id');
            $table->string('nombre');
            $table->integer("categoria_padre")->unsigned()->nullable();


            $table->foreign("categoria_padre")->references('categoria_id')->on('Categorias')->onDelete("cascade");

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists("Categorias");
    }
}
