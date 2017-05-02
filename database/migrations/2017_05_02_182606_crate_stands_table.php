<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('stands', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom_empresa');
          $table->integer('cant_personal');
          $table->string('descripcion');
          $table->string('encargado');
          $table->string('direccion');
          $table->string('telefono',50);
          $table->string('logo');
          $table->integer('user_id')->references('id')->on('users');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stands');

    }
}
