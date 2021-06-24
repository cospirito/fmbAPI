<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToArticleslibrairiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articleslibrairies', function (Blueprint $table) {
             //Forein keys constraints
             $table->foreign('code_article')->references('code')->on('articles')->onDelete('cascade');
             $table->foreign('librairie_id')->references('id')->on('librairies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articleslibrairies', function (Blueprint $table) {
            //
        });
    }
}
