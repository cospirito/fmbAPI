<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->string('code')->primary();
            $table->unsignedInteger('categorie_id');
            $table->unsignedInteger('collection_id');
            $table->string('nom');
            $table->string('auteur');
            $table->string('prix');
            $table->string('date_parution');
            $table->text('description');
            $table->string('langue');
            $table->integer('nb_page');
            $table->string('editeur');
            $table->string('image');

            //index
            $table->index('categorie_id');
            $table->index('collection_id');

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
        Schema::dropIfExists('articles');
    }
}
