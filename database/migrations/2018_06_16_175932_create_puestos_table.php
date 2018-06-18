<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestosTable extends Migration
{

    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('lado');
            $table->string('tipo');
            $table->string('dimension');
            $table->string('estado');
            $table->integer('costo_id');
            $table->integer('nivel_id');
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('puestos');
    }
}
