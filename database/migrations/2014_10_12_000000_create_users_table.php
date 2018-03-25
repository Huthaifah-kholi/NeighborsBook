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
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('mobile');
            $table->text('location');
            $table->double('lat');
            $table->double('lng');
            $table->rememberToken();
            $table->timestamps();
        });
       }
       
       /*
       Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('location');
            $table->double('Lat');
            $table->double('lng');            
            $table->timestamps();
        });

        Schema::table('locations', function($table) {
        $table->foreign('user_id')->references('id')->on('users');
   });
       */
       
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
