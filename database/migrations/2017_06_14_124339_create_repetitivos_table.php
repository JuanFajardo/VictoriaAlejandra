<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepetitivosTable extends Migration
{
    public function up()
    {
        Schema::create('repetitivos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->string('categoria')->comment('niños / hombres / mujeres / ancianos ');
            $table->string('sexo');
            $table->string('marcado')->comment('ingreso/salida');
            $table->integer('persona_id')->references('id')->on('personas');
            $table->integer('horario_id')->references('id')->on('horarios');
            $table->integer('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repetitivos');
    }
}
