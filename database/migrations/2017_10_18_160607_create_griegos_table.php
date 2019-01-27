<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGriegosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('griegos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('palabra');
          $table->string('significado');
          $table->integer('favorita')->default(0);
          $table->integer('id_categoria')->unsigned();
          $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('griegos');
    }
}
