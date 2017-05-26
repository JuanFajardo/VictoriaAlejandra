<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlingresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('controlingreso', function (Blueprint $table) {
          $table->increments('id');
          $table->time('ingreso_am');
          $table->time('salida_am');
          $table->time('ingreso_pm');
          $table->time('salida_pm');
          $table->string('justificacion');
          $table->smallInteger('tolerancia');
          $table->integer('user_id')->references('id')->on('users');
          $table->integer('trabajador_id')->references('id')->on('trabajadores');

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
      Schema::dropIfExists('controlingreso');
  }
}
