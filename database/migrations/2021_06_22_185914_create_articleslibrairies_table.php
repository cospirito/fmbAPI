<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleslibrairiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleslibrairies', function (Blueprint $table) {
            $table->string('code_article');
            $table->unsignedInteger('librairie_id');
            $table->primary(['librairie_id', 'code_article']);

            //index
            $table->index('code_article');
            $table->index('librairie_id');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articleslibrairies');
    }
}
