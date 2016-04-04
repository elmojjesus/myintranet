<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function(Blueprint $table) {
            $table->increments('id');
            $table->string('street', 100);
            $table->integer('number');
            $table->string('complement', 100)->nullable();
            $table->string('zip_code', 8)->nullable();
            $table->string('neighborhood', 40)->nullable();
            $table->integer('city')->unsigned();
            $table->foreign('city')->references('id')->on('cities');
            $table->string('regional', 120)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
