<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrosTable extends Migration
{
    public function up()
    {
        Schema::create('cobros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('empresa');
            $table->string('encargado');
            $table->string('telefono');
            $table->float('monto', 8,2);
            $table->integer('nro_venta');
            $table->dateTime('fecha');
            $table->integer('puesto_id');
            $table->integer('precio_id');
            $table->integer('stand_id');
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cobros');
    }
}
