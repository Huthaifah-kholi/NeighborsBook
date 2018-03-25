<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Redis;
use App\notifications;
use App\orders;
use App\dvds;
use DB;

class chatController extends Controller {
	public function __construct()
	{
	$this->middleware('auth');

	}

public function sendMessage(){
		$redis = Redis::connection();
		$data = ['message' => Request::input('message'), 'user' => Request::input('user'), 'id'=> Request::input('id') ];
		$redis->publish('message', json_encode($data));
		//dd($data);
		return response()->json([]);
	}

public function sendNotifications(Request $request){

        $notifications = new notifications;
        $notifications->user_id = Request::input('id');
        $notifications->notified_id =Request::input('des_id');
        $notifications->body = Request::input('stuff');
        $notifications->save();
        
        $des_id=Request::input('des_id');
        $stuff_id=Request::input('stuff_id');
        
        $matchThese = ['user_id' => $des_id, 'stuff_id' => $stuff_id];
       
      DB::table('orders')
      ->where('stuff_id', '=', $stuff_id)
      ->where('user_id', '=', $des_id)
      ->delete();


      DB::table('dvds')
      ->where('id', '=', $stuff_id)
      ->delete();

       
      //dd($flight);
       //$flight->delete();

        //$deletedRows = App\orders::where('id',5)->delete();

		$redis = Redis::connection();
		$data = ['user' => Request::input('user'), 'id'=> Request::input('id'),'des_id' => Request::input('des_id'),'stuff'=>Request::input('stuff')];
		$redis->publish('notifications', json_encode($data));
         
        	


        	}



}