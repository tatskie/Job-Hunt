<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('posts', function(Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('job');
                $table->text('description');
                $table->integer('salary');
                $table->text('city');
                $table->integer('company_id')->unsigned();
                
                $table->integer('category_id')->unsigned();
                $table->integer('user_id')->unsigned();

                $table->timestamps();
                $table->softDeletes();
                $table->foreign('company_id')->references('id')->on('companies');
                $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::drop('posts');
    }

}
