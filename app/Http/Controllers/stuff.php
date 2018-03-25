<?php

namespace App\Http\Controllers;
use Event;
use App\Dvds;
use App\User;
use App\Events\Getstuff;
use App\Http\Controllers\Controller;

class stuff extends Controller
{



	public function getstuff($id){
    $data=Dvds::find($id); 
    $ownerid=$data->user_id;
    $userid=\Auth::user()->id;
	Event::fire(new Getstuff($id,$userid,$ownerid));
	return view("thanks");

	}


	}
