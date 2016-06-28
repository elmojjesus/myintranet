<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientTherapiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacient_therapies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('therapy_id')->unsigned();
            $table->foreign('therapy_id')->references('id')->on('terapies');
            $table->integer('pacient_id')->unsigned();
            $table->foreign('pacient_id')->references('id')->on('pacients');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('pacient_therapies');
    }
}
