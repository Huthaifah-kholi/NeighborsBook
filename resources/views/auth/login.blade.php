@extends('layouts.master')

@section('body')
 <div class="container">    
        <div id="loginbox" style="margin-top:50px;"  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info"  >
                    <div class="panel-heading" style="background:#383838;color:white;">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px;"><a style="color:white;" href="{{ url('/password/reset') }}">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px; background-color:white" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" method="post" class="form-horizontal" action="{{ url('/login') }}" role="form">
                         
                         {!! csrf_field() !!}

                                 <div style="margin-bottom: 25px" class="input-group" >
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="username or email">                                        
                                    </div>
                                      @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                               
                                    </div>

                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    
                                    
                                   <button class="btn btn-lg btn-danger btn-block signup-btn" type="submit">
                                    Log In</button>

                                    


                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                           <strong style="font-size:17px; color:black"> Don't have an account! </strong> 
                                        <a href="{{ url('register') }}" >
                                <strong style="font-size:15px"> Sign Up here! </strong> 

                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>

       
    </div>
        
@endsection
