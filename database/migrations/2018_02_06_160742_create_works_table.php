<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('works', function(Blueprint $table) {
                $table->increments('id');
                $table->string('comapny');
                $table->string('position');
                $table->string('city');
                $table->string('discription', 1000)->nullable();
                $table->date('date_start');
                $table->date('date_end')->nullable();
                $table->boolean('current')->default(0);
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
        Schema::drop('works');
    }

}
