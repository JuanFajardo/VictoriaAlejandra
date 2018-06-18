<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('credito', function (Blueprint $table) {
          $table->increments('id');
          $table->decimal('cantidad',6,2);
          $table->decimal('gastado',6,2)->nullable();
          $table->integer('cod_tarjeta');
          $table->integer('persona_id')->references('id')->on('personas');
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
        Schema::dropIfExists('credito');
    }
}
