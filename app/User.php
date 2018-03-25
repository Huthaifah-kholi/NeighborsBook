<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;

class User extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    
    protected $fillable = [
        'fname', 'lname','email', 'password','mobile', 'location','lat','lng','address'
    ];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function dvds(){

        return $this->hasMany('App\Dvds','user_id','id');
    }

    public function pictures(){

        return $this->hasMany('App\profile','user_id','id');
    }

}
