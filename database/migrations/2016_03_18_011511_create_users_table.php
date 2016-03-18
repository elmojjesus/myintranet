<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('deficiency_id')->unsigned()->nullable()->default(NULL);
            $table->foreign('deficiency_id')->references('id')->on('deficiencies')->onDelete('cascade');
            $table->date('birthDate');
            $table->enum('sex', ['M', 'F']);
            $table->string('nationality', 25)->nullable();
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->integer('education')->unsigned()->nullable();
            $table->foreign('education')->references('id')->on('educations')->onDelete('cascade');
            $table->integer('profession')->unsigned()->nullable();
            $table->foreign('profession')->references('id')->on('professions')->onDelete('cascade');
            $table->integer('status');
            $table->boolean('voluntary');
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
