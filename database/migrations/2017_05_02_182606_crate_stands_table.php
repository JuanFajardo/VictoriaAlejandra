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
          $table->integer('generar_personal')->nullable();
          $table->string('descripcion');
          $table->string('encargado');
          $table->string('direccion');
          $table->string('telefono',50);
          $table->longText('logo')->nullable();
          $table->integer('user_id')->references('id')->on('users');
          $table->timestamps();
          $table->softDeletes();
      });
    }

    public function down()
    {
        Schema::dropIfExists('stands');
    }
}
