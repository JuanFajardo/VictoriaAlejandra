<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('detalle_ventas', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('persona_id')->references('id')->on('personas');
          $table->integer('horarios_id')->references('id')->on('horarios');
          $table->string('asunto');
          $table->decimal('precio',6,2);
          $table->integer('cantidad');
          $table->decimal('total',8,2);
          $table->date('fecha_registro');
          $table->time('hora_regitro');
          $table->integer('user_id')->references('id')->on('users');
          $table->softDeletes();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::dropIfExists('detalle_ventas');
    }
}
