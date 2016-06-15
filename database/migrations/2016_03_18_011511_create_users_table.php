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
            $table->string('custom_code', 5);
            $table->string('email')->unique();
            $table->string('password', 60)->nullable()->default(NULL);
            $table->string('image', 100)->nullable()->default(NULL);
            $table->integer('deficiency_id')->unsigned()->index()->nullable()->default(NULL);
            $table->foreign('deficiency_id')->references('id')->on('deficiencies')->onDelete('set null');
            $table->date('birthDate');
            $table->enum('sex', ['M', 'F']);
            $table->string('nationality', 25)->nullable();
            $table->string('mother')->nullable();
            $table->string('father')->nullable();
            $table->integer('education_id')->unsigned()->index()->nullable();
            $table->foreign('education_id')->references('id')->on('educations')->onDelete('set null');
            $table->text('telephone1')->nullable()->default(NULL);
            $table->text('telephone2')->nullable()->default(NULL);
            $table->integer('profession_id')->unsigned()->index()->nullable();
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('set null');
            $table->integer('status_id')->unsigned()->index()->nullable();
            $table->foreign('status_id')->references('id')->on('status')->onDelete('set null');
            $table->integer('regional_id')->unsigned()->index()->nullable();
            $table->foreign('regional_id')->references('id')->on('regionais')->onDelete('set null');
            $table->boolean('voluntary');
            $table->string('entry_port', 40)->nullable();
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
