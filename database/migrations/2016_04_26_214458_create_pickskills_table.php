<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickskillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('pickskills', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('name');            
            $table->text('cat');
            $table->text('description');
            $table->timestamps();
          
        });

       Schema::table('pickskills', function($table) {
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
        Schema::drop('pickskills');
    }
}
