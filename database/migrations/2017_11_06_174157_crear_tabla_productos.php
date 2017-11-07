<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productos', function (Blueprint $table) {
            $table->increments('producto_id');
            $table->string('nombre',500);
            $table->integer('precio_carulla');
            $table->integer('precio_exito');
            $table->integer('precio_jumbo');
            $table->integer('precio_euro');
            $table->integer('precio_makro');
            $table->string('link_carulla',500);
            $table->string('link_exito',500);
            $table->string('link_jumbo',500);
            $table->string('link_euro',500);
            $table->string('link_makro',500);
            $table->integer('prioridad');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer("categoria_id")->unsigned()->nullable();
            $table->timestamps();
        

            $table->foreign("categoria_id")->references('categoria_id')->on('Categorias')->onDelete("cascade");


            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("Productos");
    }
}
