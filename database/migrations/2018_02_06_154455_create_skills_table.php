<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('skills', function(Blueprint $table) {
                $table->increments('id');
                $table->string('skill');
                $table->integer('user_id')->unsigned();

                $table->timestamps();
                $table->softDeletes();

                $table->foreign('user_id')->references('id')->on('users');
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('skills');
    }

}
