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
            $table->integer('therapy_id')->unsigned();
            $table->foreign('therapy_id')->references('id')->on('terapies');
            $table->integer('pacient_id')->unsigned();
            $table->foreign('pacient_id')->references('id')->on('pacients');
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
        Schema::table('pacient_therapies', function(Blueprint $table){
            $table->dropForeign(['pacient_id']);
            $table->dropForeign(['therapy_id']);
        });
        
        Schema::dropIfExists('pacient_therapies');
    }
}
