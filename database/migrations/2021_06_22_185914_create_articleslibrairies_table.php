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
            $table->increments('id');
            $table->string('code_article');
            $table->unsignedInteger('librairie_id');

            //index
            $table->index('code_article');
            $table->index('librairie_id');

            //necessaire à laravel
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at');

           
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
