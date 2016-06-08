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
        Schema::create('addresses', function(Blueprint $table) {
            $table->increments('id');
            $table->string('street', 100);
            $table->integer('number');
            $table->string('complement', 100)->nullable();
            $table->string('zip_code', 8)->nullable();
            $table->string('neighborhood', 40)->nullable();
            $table->string('city', 120)->nullable();
            $table->string('state', 120)->nullable();
            /* $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities'); */
            $table->string('regional', 120)->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function(Blueprint $table) {
            $table->dropForeign('addresses_user_id_foreign');
        });
        Schema::dropIfExists('addresses');
    }
}
