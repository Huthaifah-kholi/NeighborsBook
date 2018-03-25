<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
protected function validator(array $data)
    {
        return 
        Validator::make($data, [
        
        'firstname' => 'required|max:15', 
        'lastname' =>  'required|max:15',
        'password' =>  'required|max:15|confirmed',
        'email' => 'required|max:50|unique:users', 
        'MobileNo' =>  'required|max:15|digits_between:5,10',
        'address' => '',
        'lat' => '',
        'lng' => '',
        ]);

        
    }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */

    protected function create(array $data)
    {     
           $ltat=$data['lat'];
           $lang=$data['lng'];

            return 
            User::create([
            'fname' => $data['firstname'],
            'lname' => $data['lastname'],
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
            'mobile' => $data['MobileNo'],
            'location' => $data['address'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            ]);

    }
}
