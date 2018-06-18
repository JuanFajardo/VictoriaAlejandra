<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNivelsTable extends Migration
{
    public function up()
    {
        Schema::create('nivels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('piso');
            $table->string('bloque');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nivels');
    }
}
