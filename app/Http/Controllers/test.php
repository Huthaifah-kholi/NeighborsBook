<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class test extends Controller
{
   

  public $global;

 public function __construct(){
    
   


   public function a(Request $request){

    
   $this->global="some value";

   }

   public function b(Request $request){
    
    echo $this->global;
    //it always return a null 
   	
   }


  
}
