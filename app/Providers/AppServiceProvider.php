<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider 
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

   
public $myusers;

    public function boot()
    {    
    
   /* $user = auth()->user();

     $origLat=$user->lat;
     $origLon=\Auth::user()->lng;
     $dist=5;
     $lon1=$origLon-$dist/cos(deg2rad($origLat))*73.2044736;
     $lon2=$origLon+$dist/cos(deg2rad($origLat));
     $lat1=$origLat-($dist/73.2044763);
     $lat2=$origLat+($dist/73.2044763);
     
 $id=\Auth::user()->id;                            
 $pictures=User::find($id)->pictures;
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
*/

                


                   view()->share('myusers', $this->myusers);






    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
