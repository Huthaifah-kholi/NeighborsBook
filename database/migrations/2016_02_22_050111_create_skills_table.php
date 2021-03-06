<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('name');
            $table->text('imageSkill');
            $table->string('days');
            $table->time('from');
            $table->time('to');
            $table->text('description');
            $table->timestamps();
          
        });

       Schema::table('skills', function($table) {
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
