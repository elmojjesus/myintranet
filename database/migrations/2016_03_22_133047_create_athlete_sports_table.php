<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAthleteSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('athlete_sports', function(Blueprint $table) {
            $table->integer('athlete_id')->unsigned();
            $table->foreign('athlete_id')->references('id')->on('athletes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('athlete_sports');
    }
}
