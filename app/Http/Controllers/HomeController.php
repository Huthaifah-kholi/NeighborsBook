<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Event;
use App\User;
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
use App\Dvds;
use App\orders;
use App\Skills;
use App\Events\Getstuff;
use App\Events\approvestuff;
use App\profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $users;
    public $myusers;

 

    public function __construct()
    {
     

     $this->middleware('auth'); 
     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);
     
 $id=\Auth::user()->id;                            
 $pictures=User::find($id)->pictures;
 //dd($pictures[0]->id);
 $this->myusers = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();


        view()->share('myusers', $this->myusers);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

   

    public function index(Request $request)
    {   

     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);     
    
    

     $mapinfo= DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->leftjoin('skills','users.id','=','skills.user_id')
                ->where('users.id', '!=', \Auth::user()->id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();

       //dd($mapinfo);
    $this->users = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join('books','users.id','=','books.user_id')
                ->where('users.id', '!=', \Auth::user()->id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();

            //dd($this->users);
            
      $skills = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join('skills','users.id','=','skills.user_id')
                ->where('users.id', '!=', \Auth::user()->id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();

        
         //dd($skills);
        //$this->request->header->accept =="Application/json"
             

        
        return view('home')->with(['users'=>$this->users,"skills"=>$skills, "mapinfo"=>$mapinfo ]);
    }



   public function addSomthing(){


   /*$this->validate($request, [
        'name' => 'required|max:15', 
        'location' => 'required|max:30',
        'email' => 'required|max:20|unique:loginTable,email', 
        'MobileNo' =>  'required|max:15|digits_between:5,10',
        'location' =>  'required|max:15',


    ]);*/
    
   
 
   return view('addthing');

   }


public function addthing(Request $request){


   /*$this->validate($request, [
        'name' => 'required|max:15', 
        'location' => 'required|max:30',
        'email' => 'required|max:20|unique:loginTable,email', 
        'MobileNo' =>  'required|max:15|digits_between:5,10',
        'location' =>  'required|max:15',


    ]);*/
//dd($request);

$imagename =str_random(12).$request->file('image')->getClientOriginalName();
if ($request->hasFile('image')) {

$path = base_path() . '/public/uploaded-images/';
$request->file('image')->move($path,$imagename);

}  
   $newRecord;
   

   $cat=$request->cat;
   
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
   $newRecord->user_id=\Auth::user()->id;
   $newRecord->image=$imagename;
   $newRecord->type=$request->optradio;
   $newRecord->didline=$request->didline;
   $newRecord->description=$request->details;
   $newRecord->save();


   return view('addthing');

   }
   
   public function addpicture(Request $request){


$imagename =str_random(12).$request->file('image')->getClientOriginalName();

if ($request->hasFile('image')) {
$path = base_path() . '/public/profile-images/';
$request->file('image')->move($path,$imagename);
}  
  
   $newRecord=new profile;
   $newRecord->user_id=\Auth::user()->id;
   $newRecord->profile=$imagename;
   $newRecord->save();

    $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);     
    

    $skillsToProfile = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join('skills','users.id','=','skills.user_id')
                ->where('users.id', '=', \Auth::user()->id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();


   //dd($skillsToProfile);
                  $id=\Auth::user()->id;                            
                  $pictures=User::find($id)->pictures;


            return view('profile')->with(["skillsToProfile"=>$skillsToProfile,"pictures"=>$pictures]);

   }


   public function addSkill(){
   return view('addSkill');

   }


public function databaseSill(Request $request){

//dd($request);
   
   $belongs=$request->all();
   



   $type=$request->cat;
   $image= $type.".jpg";
   
  $days=$request->checkboxes;
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
   $newRecord->user_id=\Auth::user()->id;
   $newRecord->imageSkill=$image;
   $newRecord->days=$day;
   $newRecord->from=$request->From;
   $newRecord->To=$request->To;
   $newRecord->description=$request->details;
   $newRecord->save();

   return view('addSkill');

   }


public function profile(){

    

     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);     
    

    $skillsToProfile = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join('skills','users.id','=','skills.user_id')
                ->where('users.id', '=', \Auth::user()->id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();


                  $id=\Auth::user()->id;                            
                  $pictures=User::find($id)->pictures;

            $users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();


                  
                   
            return view('profile')->with(["skillsToProfile"=>$skillsToProfile,"pictures"=>$pictures, "users" => $users]);

            }


            public function location(){
             $origLat=\Auth::user()->lat;
             $origLon=\Auth::user()->lng;
             $dist=5;
             $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
             
             $lon2=$origLon+$dist/cos(deg2rad($origLat));
             $lat1=$origLat-($dist/73.2044763);
             $lat2=$origLat+($dist/73.2044763);     
            
            $this->users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->leftjoin('dvds','users.id','=','dvds.user_id')
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();

                    $id=\Auth::user()->id;                            
                    $pictures=User::find($id)->pictures;


            return view('location')->with(["users"=>$this->users,"pictures"=>$pictures]);
            }



public function myuploads(){

  $origLat=\Auth::user()->lat;
             $origLon=\Auth::user()->lng;
             $dist=5;
             $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
             
             $lon2=$origLon+$dist/cos(deg2rad($origLat));
             $lat1=$origLat-($dist/73.2044763);
             $lat2=$origLat+($dist/73.2044763); 


$id=\Auth::user()->id;                            
$this->users =User::find($id)->dvds;
$pictures=User::find($id)->pictures;

$orderd = DB::table('dvds')
            ->join('orders', 'orders.stuff_id', '=', 'dvds.id')
            ->where('dvds.user_id','=',\Auth::user()->id)
            ->selectRaw('*, COUNT(*) as count')
            ->groupBy('orders.stuff_id')
            ->get();



$unorderd=DB::table('orders')
            ->rightjoin('dvds', 'dvds.id', '=', 'orders.stuff_id')
            ->where('dvds.user_id','=',\Auth::user()->id)
            ->get();


$users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();

return view('myuploads')->with(["orderd"=>$orderd,"pictures"=>$pictures,"unorderd"=>$unorderd, "users"=>$users]);
}


public function myneighbors(){

 $id=\Auth::user()->id;
 $origLat=\Auth::user()->lat;
 $origLon=\Auth::user()->lng;
 $dist=5;
 $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
 
 $lon2=$origLon+$dist/cos(deg2rad($origLat));
 $lat1=$origLat-($dist/73.2044763);
 $lat2=$origLat+($dist/73.2044763); 

$this->users = DB::table('profiles')   
                        ->rightjoin('users','users.id','=','profiles.user_id')
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->select(
                        DB::raw("*,
                                    3956 * 2 * 
                          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                          as distance"
                          )) 
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();

                 
                 //dd($this->users);
                  $id=\Auth::user()->id;                            
                  $pictures=User::find($id)->pictures;
                 

return view('myneighbors')->with(["users"=>$this->users,"pictures"=>$pictures]);
}



public function stuffpreview($cat,$id){

   
 //dd($cat);
   if($cat=="electrical"){

      $data1=new electrical;
      $info=electrical::find($id)->User;
      $pictures=electrical::find($id)->pictures;

       }
       else if($cat=="beauty"){ 
        $data1 =beaty::find($id);
        $info=beaty::find($id)->User;
        $pictures=beaty::find($id)->pictures;

        }
       else if($cat=="books"){
        $data1 =books::find($id);  
        $info=books::find($id)->User;
        $pictures=books::find($id)->pictures;

        }
       else if($cat=="Dvds"){ $data1 =Dvds::find($id);
        $info=Dvds::find($id)->User; 
        $pictures=Dvds::find($id)->pictures;
       // echo "hi";


        }
       else if($cat=="furniture"){ $data1 =furniture::find($id);
        
       $info=furniture::find($id)->User; 
        $pictures=furniture::find($id)->pictures;
        }
       else if($cat=="games"){ $data1 =games::find($id);
        
       $info=games::find($id)->User; 
        $pictures=games::find($id)->pictures;
        }
       else if($cat=="garden"){ $data1 =garden::find($id);
        
       $info=garden::find($id)->User; 
       $pictures=games::find($id)->pictures;

        }
       else if($cat=="sports"){ $data1 =sports::find($id);
        
       $info=sports::find($id)->User; 
       $pictures=sports::find($id)->pictures;

        }
       else if($cat=="others"){ $data1 =others::find($id);
        
       $info=others::find($id)->User; 
        $pictures=others::find($id)->pictures;

        }       
       else if($cat=="clothing"){ $data1 =clothing::find($id);
        
       $info=clothing::find($id)->User; 
        $pictures=clothing::find($id)->pictures;

        }
       else if($cat=="babies"){$data1 =babies::find($id);
        
       $info=babies::find($id)->User; 
        $pictures=babies::find($id)->pictures;

        }       
       else if($cat=="toys"){$data1 =toys::find($id);
        
       $info=toys::find($id)->User; 
        $pictures=toys::find($id)->pictures;

        }




//$data1 =$newRecord::find($id);
//$info=$newRecord::find($id)->User; 
//$pictures=$newRecord::find($id)->pictures;


     
     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);


 
 $this->users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->leftjoin($cat,'users.id','=',"$cat.user_id")
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->where("$cat.id", '!=', $id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();
      //dd($this->users);

return view('stuffpreview')->with(["data1"=>$data1,"info"=>$info,"users"=>$this->users,"pictures"=>$pictures,"cat"=>$cat]);


}

public function stufflocation($cat,$id){

if($cat=="electrical"){

      $data1=new electrical;
      $info=electrical::find($id)->User;
      $pictures=electrical::find($id)->pictures;

       }
       else if($cat=="beauty"){ 
        $data1 =beaty::find($id);
        $info=beaty::find($id)->User;
        $pictures=beaty::find($id)->pictures;

        }
       else if($cat=="books"){
        $data1 =books::find($id);  
        $info=books::find($id)->User;
        $pictures=books::find($id)->pictures;

        }
       else if($cat=="Dvds"){ $data1 =Dvds::find($id);
        $info=Dvds::find($id)->User; 
        $pictures=Dvds::find($id)->pictures;
       // echo "hi";


        }
       else if($cat=="furniture"){ $data1 =furniture::find($id);
        
       $info=furniture::find($id)->User; 
        $pictures=furniture::find($id)->pictures;
        }
       else if($cat=="games"){ $data1 =games::find($id);
        
       $info=games::find($id)->User; 
        $pictures=games::find($id)->pictures;
        }
       else if($cat=="garden"){ $data1 =garden::find($id);
        
       $info=garden::find($id)->User; 
       $pictures=games::find($id)->pictures;

        }
       else if($cat=="sports"){ $data1 =sports::find($id);
        
       $info=sports::find($id)->User; 
       $pictures=sports::find($id)->pictures;

        }
       else if($cat=="others"){ $data1 =others::find($id);
        
       $info=others::find($id)->User; 
        $pictures=others::find($id)->pictures;

        }       
       else if($cat=="clothing"){ $data1 =clothing::find($id);
        
       $info=clothing::find($id)->User; 
        $pictures=clothing::find($id)->pictures;

        }
       else if($cat=="babies"){$data1 =babies::find($id);
        
       $info=babies::find($id)->User; 
        $pictures=babies::find($id)->pictures;

        }       
       else if($cat=="toys"){$data1 =toys::find($id);
        
       $info=toys::find($id)->User; 
        $pictures=toys::find($id)->pictures;

        }




//$data1 =$newRecord::find($id);
//$info=$newRecord::find($id)->User; 
//$pictures=$newRecord::find($id)->pictures;


     
     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);


 
 $this->users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->leftjoin($cat,'users.id','=',"$cat.user_id")
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->where("$cat.id", '!=', $id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();

return view('stuff-location')->with(["data1"=>$data1, "info" =>$info , "users" => $this->users ,"pictures"=>$pictures,"cat"=>$cat]);

}

public function stufffind($cat,$id){
if($cat=="electrical"){

      $data1=new electrical;
      $info=electrical::find($id)->User;
      $pictures=electrical::find($id)->pictures;

       }
       else if($cat=="beauty"){ 
        $data1 =beaty::find($id);
        $info=beaty::find($id)->User;
        $pictures=beaty::find($id)->pictures;

        }
       else if($cat=="books"){
        $data1 =books::find($id);  
        $info=books::find($id)->User;
        $pictures=books::find($id)->pictures;

        }
       else if($cat=="Dvds"){ $data1 =Dvds::find($id);
        $info=Dvds::find($id)->User; 
        $pictures=Dvds::find($id)->pictures;
       // echo "hi";


        }
       else if($cat=="furniture"){ $data1 =furniture::find($id);
        
       $info=furniture::find($id)->User; 
        $pictures=furniture::find($id)->pictures;
        }
       else if($cat=="games"){ $data1 =games::find($id);
        
       $info=games::find($id)->User; 
        $pictures=games::find($id)->pictures;
        }
       else if($cat=="garden"){ $data1 =garden::find($id);
        
       $info=garden::find($id)->User; 
       $pictures=games::find($id)->pictures;

        }
       else if($cat=="sports"){ $data1 =sports::find($id);
        
       $info=sports::find($id)->User; 
       $pictures=sports::find($id)->pictures;

        }
       else if($cat=="others"){ $data1 =others::find($id);
        
       $info=others::find($id)->User; 
        $pictures=others::find($id)->pictures;

        }       
       else if($cat=="clothing"){ $data1 =clothing::find($id);
        
       $info=clothing::find($id)->User; 
        $pictures=clothing::find($id)->pictures;

        }
       else if($cat=="babies"){$data1 =babies::find($id);
        
       $info=babies::find($id)->User; 
        $pictures=babies::find($id)->pictures;

        }       
       else if($cat=="toys"){$data1 =toys::find($id);
        
       $info=toys::find($id)->User; 
        $pictures=toys::find($id)->pictures;

        }




//$data1 =$newRecord::find($id);
//$info=$newRecord::find($id)->User; 
//$pictures=$newRecord::find($id)->pictures;


     
     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);


 
 $this->users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->leftjoin($cat,'users.id','=',"$cat.user_id")
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->where("$cat.id", '!=', $id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();

return view('stuff-find')->with(["data1"=>$data1,"info" =>$info,"users"=>$this->users,"pictures"=>$pictures,"cat"=>$cat]);

}

public function mystuff($id){

$data1 = Dvds::find($id);
$info=Dvds::find($id)->User; 

//dd($data1);
     
     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);
 
 $related = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->leftjoin('dvds','users.id','=','dvds.user_id')
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();


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
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->where('orders.stuff_id', '=', $id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance")
                        ->groupBy('orders.user_id') 
                        ->get();


                
//dd($users);

return view('mystuff')->with(["data1"=>$data1,"info"=>$info,"related"=>$related,"users"=>$users]);
  




}

public function notify(){

     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);
     
 $id=\Auth::user()->id;                            
 $pictures=User::find($id)->pictures;
 $users = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();
  $notifications2 = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->join('pickneeds','users.id','=','pickneeds.user_id') 
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();

  $notifications3 = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->join('pickskills','users.id','=','pickskills.user_id') 
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance") 
                        ->get();                   


$notifications = DB::table('users')->select(
               
                DB::raw("*,
                            3956 * 2 * 
                  ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
                  +COS($origLat*pi()/180 )*COS(lat*pi()/180)
                  *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
                  as distance"
                  ))    
                        ->join('notifications','users.id','=','notifications.user_id')
                        ->where('users.id', '!=', \Auth::user()->id)
                        ->whereBetween('lng',[$lon1,$lon2])
                        ->whereBetween('lat',[$lat1,$lat2])
                        ->having("distance", "<", "$dist")
                        ->orderBy("distance")
                        ->get();

                        //dd($notifications);


return view('notifications')->with(["pictures"=>$pictures,"users"=>$users,'notifications'=>$notifications,'notifications2'=>$notifications2 ,'notifications3'=>$notifications3 ]);
  

}



public function userprofile ($id){





               $skillsToProfile = DB::table('users')      
                ->join('skills','users.id','=','skills.user_id')
                ->where('users.id', '=', $id)                
                ->get();


                 
               $info=User::find($id);
      //         dd($info);
               
                  $pictures=User::find($id)->pictures;
               

            return view('user-profile')->with(["skillsToProfile"=>$skillsToProfile,"pictures"=>$pictures, "info" => $info]);


}


public function pickneed(){

return view('pick-need');


}

public function pickskill(){

return view('pick-skill');

}

public function addpickneed(Request $request){
   
   $newRecord=new pickneed;
   $newRecord->name=$request->name;
   $newRecord->user_id=\Auth::user()->id;
   $newRecord->cat=$request->cat;
   $newRecord->description=$request->details;
   $newRecord->save();

return view('pick-need');


}

public function addpickskill(Request $request){
   
  // dd($request);
   $newRecord=new pickskill;
   $newRecord->name=$request->name;
   $newRecord->user_id=\Auth::user()->id;
   $newRecord->cat=$request->cat;
   $newRecord->description=$request->details;
   $newRecord->save();

return view('pick-skill');

}


public function catg($id){

     //dd($id);

     $origLat=\Auth::user()->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);


 




  $data = DB::table('users')->select(
       
        DB::raw("*,
                    3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat- lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lng)*pi()/180/2),2)))*1.609344 
          as distance"
          ))    
                ->join($id,'users.id','=', "$id.user_id")
                ->where('users.id', '!=', \Auth::user()->id)
                ->whereBetween('lng',[$lon1,$lon2])
                ->whereBetween('lat',[$lat1,$lat2])
                ->having("distance", "<", "$dist")
                ->orderBy("distance") 
                ->get();


 return view('cat')->with(['data'=>$data, 'cat'=>$id]);


}

}
