<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    public function up()
    {/*
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('horario', 50);
            $table->time('ingreso_am');
            $table->time('salida_am');
            $table->time('ingreso_pm');
            $table->time('salida_pm');
            $table->string('fijo', 3);
            $table->text('descripcion');
            $table->smallInteger('tolerancia');
            $table->integer('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    */}


    public function down()
    {
        //Schema::dropIfExists('horarios');
    }
}
