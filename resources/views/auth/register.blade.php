@extends('layouts.master')
@section('links')
<link href="css/register.css" rel="stylesheet" type="text/css" media="all"/>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE6RfNc2xUty4LuxCstPRwQnRDL18fmO8&libraries=places">
</script>
<script src="{{URL::asset('js/maps-login-js.js')}}" type="text/javascript"></script> 
@endsection
@section('body')

<br />
<div class="container">
   
    <div class="col-md-6">
         <div class="row myborder">
    <form action="{{ url('register') }}" method="post" accept-charset="utf-8" class="form"  role="form" id="myform"> 
              {!! csrf_field() !!}
            <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;">Sign Up Now</h4><hr>
              <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="First Name" name="firstname" id="UserRegistration_fname" type="text">
            
            </div>
             @if ($errors->has('firstname'))
                                    <span class="help-block" style="color:red" >
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif                                  

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Last Name" name="lastname" id="UserRegistration_lname" type="text">
               
            </div> 

            <input type='hidden' id= 'lat_id' name='lat' value='' />
            <input type='hidden' id= 'lng_id' name='lng' value='' />


              @if ($errors->has('lastname'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Email" name="email" id="UserRegistration_username" type="text">
               
            </div>
              @if ($errors->has('email'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Password" name="password" id="UserRegistration_password" type="password">
                

            </div> 
             @if ($errors->has('password'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif                                   

             <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="UserRegistration_password" type="password">
                 
            </div>  
            @if ($errors->has('password_confirmation'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif                                            

            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Contact Number" name="MobileNo" id="UserRegistration_contactnumber" type="text">
             
            </div>
                @if ($errors->has('MobileNo'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('MobileNo') }}</strong>
                                    </span>
                                @endif 
            <span class="help-block" style="color:black; font-size:20px">By clicking create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>

            <div class="row">
                <div class="col-md-12">
            <button class="btn-u pull-left" type="submit">Sign Up</button>
                </div>
            </div>

        </div>
        <div class="col-md-2">
        
        </div>
    </div> 
        &nbsp&nbsp &nbsp&nbsp <span style="color:blue;margin-bottom:10px;"> Hint : You Can Drag The Marker Exactly To Your Location  </span><br>

    <div class="input-group margin-bottom-20" >

   &nbsp&nbsp &nbsp&nbsp<span class="input-group-addon"><i style="height:15px;"class="glyphicon glyphicon-envelope mycolor"></i></span>
  &nbsp&nbsp &nbsp&nbsp<input size="100" style="width:400px;" height="100" maxlength="255" class="form-control" placeholder="Address" name="address" id="pac-input" type="text">
    </div>

    <div class="col-md-6" style="margin-left:30px;width:450px;height:450px" id="MapDiv">
    

    </div>
   </form> 
      </div>
      <br><br>
@endsection
