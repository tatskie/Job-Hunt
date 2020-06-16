<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('educations', function(Blueprint $table) {
                $table->increments('id');
                $table->string('school');
                $table->date('year_start');
                $table->date('year_end')->nullable();
                $table->boolean('graduated')->default(0);
                $table->string('discription', 1000)->nullable();
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
        Schema::drop('educations');
    }

}
