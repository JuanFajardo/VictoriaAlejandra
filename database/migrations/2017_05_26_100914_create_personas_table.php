<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('carnet');
            $table->integer('tarjeta')->unique();
            $table->string('estado_civil');
            $table->string('profesion', 50);
            $table->string('genero', 10);
            $table->string('clave');
            $table->string('reserva', 3);
            $table->string('encargado', 3);
            $table->longtext('imagen');
            $table->date('fecha_nacimiento');
            $table->date('fecha_inscripcion');

            $table->integer('horario_id')->references('id')->on('users');
            $table->integer('stand_id')->references('id')->on('users');
            $table->integer('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
