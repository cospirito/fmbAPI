<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrairiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librairies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('adresse');
            $table->string('tel');
            $table->string('site_url')->nullable();
            $table->string('logo')->nullable();
            $table->string('ice')->nullable();
            $table->string('email')->nullable();

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
        Schema::dropIfExists('librairies');
    }
}
