<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cat');
            $table->integer('user_id')->unsigned();
            $table->integer('stuff_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->timestamps();
        });
        
        // Schema::table('orders', function($table) {
        // $table->foreign('stuff_id')->references('id')->on('Dvds');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
