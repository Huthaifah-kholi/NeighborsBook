<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class others extends Model
{
    //
    public function User(){
   
     return $this->belongsTo('App\User','user_id','id');

    }

     public function pictures(){
   
     return $this->belongsTo('App\profile','user_id','id');

    }
}
