<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('ingreso_am');
            $table->time('salida_am');
            $table->time('ingreso_pm');
            $table->time('salida_pm');
            $table->string('justificacion');
            $table->string('retraso_am');
            $table->string('retraso_pm');
            $table->integer('persona_id')->references('id')->on('personas');
            $table->integer('horario_id')->references('id')->on('horarios');
            $table->integer('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
