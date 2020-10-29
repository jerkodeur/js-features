<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOffersUsers extends Migration
{
    /**
     * Run the migrations.
     * Many to many tables
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers_users', function (Blueprint $table) {
            $table->bigInteger('offers_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->foreign('offers_id')->references('id')->on('offers');
            $table->foreign('users_id')->references('id')->on('users');
            $table->primary(['offers_id', 'users_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers_users');
    }
}
