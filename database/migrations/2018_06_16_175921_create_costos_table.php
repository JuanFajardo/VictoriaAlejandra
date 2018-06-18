<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostosTable extends Migration
{
    public function up()
    {
        Schema::create('costos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->float('precio',8,2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('costos');
    }
}
