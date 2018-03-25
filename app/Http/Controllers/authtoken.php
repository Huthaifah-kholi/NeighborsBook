<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class authtoken extends Controller
{
     public function token()
  {
    return csrf_token();
  }

}
