<?php

use Illuminate\Database\Seeder;

class catseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 // DB::table('dvds')->insert([
      //       'user_id' => 1 ,
      //       'email' => str_random(10).'@gmail.com',
      //       'password' => bcrypt('123123'),
      //   ]);


   factory(App\User::class, 10)->create(['user_id'=>'1']);
       
    }
}
