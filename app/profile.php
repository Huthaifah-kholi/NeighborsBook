<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    //
    public function User(){
   
     return $this->belongsTo('App\User','user_id','id');

    }

 public function Dvds(){

 return $this->hasMany('App\Dvds','user_id','id');

 }   


}
