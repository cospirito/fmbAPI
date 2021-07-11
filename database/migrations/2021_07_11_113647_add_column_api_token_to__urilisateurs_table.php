<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnApiTokenToUrilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Utilisateurs', function (Blueprint $table) {
            $table->string('api_token', 80)->after('mot_de_passe')
            ->unique()
            ->nullable()
            ->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Utilisateurs', function (Blueprint $table) {
            Schema::dropIfExists('api_token');
        });
    }
}
