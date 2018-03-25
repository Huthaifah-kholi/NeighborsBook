<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\User;
use App\Dvds;
use App\Skills;
use App\electrical;
use App\books;
use App\beaty;
use App\furniture;
use App\games;
use App\garden;
use App\kids;
use App\others;
use App\sports;
use App\toys;
use App\clothing;
use App\babies;
use App\pickneed;
use App\pickskill;
use App\imgname;
use App\orders;
use App\profile;
use App\notifications;

use Illuminate\Support\Facades\Input;

class huz extends Controller
{

   
   

    public function __construct()
    {
    

    }



    public function stuff(Request $request){
     
     $id=$request->input("userId");
     $data=User::find($id);

     $origLat=$data->lat;
     $origLon=$data->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);      
      

      $stuff = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join('dvds','users.id','=','dvds.user_id')
                ->where('users.id', '!=', $id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();

       $skills = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join('skills','users.id','=','skills.user_id')
                ->where('users.id', '!=', $id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();


     return Response()->json(array('stuff'=>$stuff,'skills'=>$skills));


     }

     public function authcheck(Request $request){
    
     
     $id=$request->input("userId");
     $password=$request->input("password");
     $cc=$request->all();
     $responseOk="ok";
     $responseNotOk="failed";
     $data=User::find($id);
     $pass1=$data->password;
     
     if (Hash::check($password,$pass1)) {
       return response($responseOk);
       }

     else return response($responseNotOk); 
    }

    
    public function skills(Request $request){
     
     $id=$request->input("id");
     $data=User::find($id);

     $origLat=$data->lat;
     $origLon=$data->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);      
      

     $skills = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join('skills','users.id','=','skills.user_id')
                ->where('users.id', '!=', $id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();



     return Response()->json(json_encode($skills));

     }

      
    public function addphoto(Request $request){
    
    //$n=$request->file('image')->getClientOriginalName();

    $imgname =str_random(12).$request->file('image')->getClientOriginalName();
    if ($request->hasFile('image')) {

    $path = base_path() . '/public/uploaded-images/';
    $request->file('image')->move($path,$imgname);

    
    }
      

  $newRecord=new imgname;
  $newRecord->name=$imgname;  
  $newRecord->save();

      
      return "ok"; 
    }


    public function addstuff(Request $request){
      
    
   // $this->ggg="khbjhvhj";
    //$data1=$request->data;
    // $data=json_decode($data1);
    $id=$request->data;  
    
   
    $newRecord;

    $cat=$request->cat;
    
   $record=imgname::all()->last();

   if($cat=="Electrical")$newRecord=new electrical;
   else if($cat=="Beauty")$newRecord=new beaty;
   else if($cat=="Books")$newRecord=new books;
   else if($cat=="DVDs")$newRecord=new Dvds;
   else if($cat=="Furniture")$newRecord=new furniture;
   else if($cat=="Computer")$newRecord=new games;
   else if($cat=="Garden")$newRecord=new garden;
   else if($cat=="Sports")$newRecord=new sports;
   else if($cat=="Others")$newRecord=new others;
   else if($cat=="Clothing")$newRecord=new clothing;
   else if($cat=="Babies")$newRecord=new babies;
   else if($cat=="Toys")$newRecord=new toys;
  
   

  $newRecord->name=$request->name;
  $newRecord->user_id=$id;
  $newRecord->image=$record->name;
  $newRecord->type=$request->type;
  $newRecord->didline=$request->date;
  $newRecord->description=$request->details;
  $newRecord->save();

    

     return $record->name;


     }

      
    public function addskill(Request $request){
    
    $data=$request->data;
    $data=json_decode($data);
    $id=$data->userId;
    $type=$request->cat;
    $image= $type.".jpg";
     
     $days=$request->days;
      $day="";
     $counter=count($days);
    for ($i=0;$i<$counter;$i++){
    if($i==$counter-1) 
     $day.=$days[$i].".";
     else 
     $day.=$days[$i].",";

    }
    
     $newRecord=new Skills;
     $newRecord->name=$request->name;
     $newRecord->user_id=$id;
     $newRecord->imageSkill=$image;
     $newRecord->days=$day;
     $newRecord->from=$request->startTime;
     $newRecord->To=$request->endTime;
     $newRecord->description=$request->details;
     $newRecord->save();


  
   return $data;

     }


   public function getcat(Request $request){

    $id=$request->id;
    $cat=$request->cat;

     $data=User::find($id);
     $origLat=$data->lat;
     $origLon=$data->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);




  $stuff = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join($cat,'users.id','=',"$cat.user_id")
                ->where('users.id', '!=', $id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();


  //$info = Dvds::all();

return Response()->json(array('stuff'=>$stuff));   
   }



public function getthing(Request $request){


 $newRecord=new orders;
 $newRecord->user_id=$request->id;
 $newRecord->stuff_id=$request->stuffid;
 $newRecord->owner_id=$request->ownerid;
 $newRecord->cat=$request->cat;
 $newRecord->save();

return $request->id.$request->stuffid.$request->ownerid.$request->cat;

}

public function orders(Request $request){

$id=$request->id;  

$orderd = DB::table('dvds')
            ->join('orders', 'orders.stuff_id', '=', 'dvds.id')
            ->where('dvds.user_id','=',$id)
            ->selectRaw('*, COUNT(*) as count')
            ->groupBy('orders.stuff_id')
            ->get();



$unorderd=DB::table('orders')
            ->rightjoin('dvds', 'dvds.id', '=', 'orders.stuff_id')
            ->where('dvds.user_id','=',$id)
            ->get();




return Response()->json(array('orderd'=>$orderd,'unorderd'=>$unorderd));  


}


public function getusers(Request $request){


$userid=$request->userId;
$id=$request->id;

$data=User::find($userid);

     $origLat=$data->lat;
     $origLon=$data->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);

$users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                         ->leftjoin('profiles','users.id','=','profiles.user_id') 
                        ->join('orders','users.id','=','orders.user_id')
                        ->where('users.id', '!=', $userid)
                        ->where('orders.stuff_id', '=', $id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance")
                        ->groupBy('orders.user_id') 
                        ->get();
  
  return Response()->json(array('users'=>$users));  

              


}


public function done(Request $request){


        $notifications = new notifications;
        
        $notifications->user_id =$request->id;
        $notifications->notified_id =$request->des_id;
        $notifications->body =$request->stuff;
        $notifications->save();
        
        $des_id=$request->des_id;
        $stuff_id=$request->stuff_id;
        
        //$matchThese = ['user_id' => $des_id, 'stuff_id' => $stuff_id];
       
      DB::table('orders')
      ->where('stuff_id', '=', $stuff_id)
      ->where('user_id', '=', $des_id)
      ->delete();


      DB::table('dvds')
      ->where('id', '=', $stuff_id)
      ->delete();

      return "ok";

}



}
