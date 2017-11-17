<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductosTable extends Migration
{
    /**
     * Run the migrations.
     modificacion a la tabla productos para agregar la foranea de ciudades
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->integer("ciudad_id")->unsigned()->nullable();
            $table->foreign("ciudad_id")->references('ciudad_id')->on('Ciudades')->onDelete("cascade");
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
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('ciudad_id');
        });
    }
}
