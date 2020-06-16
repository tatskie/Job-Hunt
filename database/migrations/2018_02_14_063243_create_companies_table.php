<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('companies', function(Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('city');
                $table->text('address');
                $table->text('country');
                $table->text('postal');
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
        Schema::drop('companies');
    }

}
