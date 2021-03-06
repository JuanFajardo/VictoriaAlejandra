<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreventaTable extends Migration
{
    public function up()
    {
        Schema::create('preventa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo');
            $table->string('carnet');
            $table->string('fecha_nacimiento');
            $table->string('telefono');
            $table->string('genero', 10);
            $table->longtext('imagen');
            $table->integer('reserva');
            $table->integer('tarjeta')->unique()->nullable();
            $table->decimal('cantidad',4,2)->nullable();
            $table->integer('persona_id')->references('id')->on('personas')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preventa');
    }
}
