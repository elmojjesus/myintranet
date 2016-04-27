<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('departament_id')->unsigned();
            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
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

        Schema::table('employees', function(Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['departament_id']);
            $table->dropForeign(['status_id']);
        });

        Schema::dropIfExists('employees');

    }
}
