<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('trabajadores', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nom_empresa');
        $table->integer('ci')->unique();
        //$table->integer('cant_per_reg')->comment("cantidad de personal registrado");
        $table->date('fech_nac');
        $table->string('direccion');
        $table->string('telefono');
        $table->string('est_civil');
        $table->string('genero');
        $table->string('profesion');
        $table->string('email');
        $table->integer('id_cargo')->references('id')->on('cargos');
        $table->integer('id_stand')->references('id')->on('stands');
        $table->string('id_rfid')->references('id')->on('rfids')->unique();
        $table->integer('user_id')->references('id')->on('users');
        $table->timestamps();
        $table->softDeletes();
      });
    }

    /**e
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
}
