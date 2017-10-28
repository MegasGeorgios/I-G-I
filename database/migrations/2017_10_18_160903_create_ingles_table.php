<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingles', function (Blueprint $table) {
          $table->increments('id_en');
          $table->string('palabra');
          $table->string('significado');
          $table->integer('id_categoria')->unsigned();
          $table->foreign('id_categoria')->references('id_categoria')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ingles');
    }
}
