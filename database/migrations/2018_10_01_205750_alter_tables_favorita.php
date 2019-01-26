<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablesSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('italianos', function (Blueprint $table) {
        $table->integer('favorita')->default(0);
      });
      Schema::table('griegos', function (Blueprint $table) {
        $table->integer('favorita')->default(0);
      });
      Schema::table('ingles', function (Blueprint $table) {
        $table->integer('favorita')->default(0);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('italianos', function (Blueprint $table) {
        $table->dropColumn('slug');
      });
      Schema::table('italianos', function (Blueprint $table) {
        $table->dropColumn('slug');
      });
      Schema::table('italianos', function (Blueprint $table) {
        $table->dropColumn('slug');
      });
    }
}
