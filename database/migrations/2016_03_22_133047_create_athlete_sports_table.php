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
            $table->foreign('athlete_id')->references('id')->on('athletes');

            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports');
<<<<<<< HEAD
            
            $table->timestamps();
=======
                
            
>>>>>>> 3a2d3fb98947c970d0b2f2126a441025a571f146
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
        Schema::table('athlete_sports', function(Blueprint $table){
            $table->dropForeign(['athlete_id']);
            $table->dropForeign(['sport_id']);
        });

        Schema::dropIfExists('athlete_sports');
    }
}
