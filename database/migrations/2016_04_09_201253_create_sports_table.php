<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('image');
            $table->string('type');
            $table->date('didline')->nullable();
            $table->text('description');
            $table->timestamps();

            
        });

       Schema::table('sports', function($table) {
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
        Schema::drop('sports');
    }
}
