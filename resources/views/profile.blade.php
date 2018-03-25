@extends('layouts.profile-master')
@section('Link')

@endsection
@section('info')
<div class="container" id="form1">
      <div class="row">
  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #383838">
              <h3 style="color:white">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
            </div>
            <div class="panel-body" style="background-color:white;">
              <div class="row">
              @if(count($pictures)!=0)
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"  src="{{URL::asset('profile-images/'.$pictures[count($pictures)-1]->profile )}}"  class="img-circle img-responsive"> </div>
              @else
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"  src="{{URL::asset('profile-images/profile.jpg')}}" class="img-circle img-responsive"> </div>  
               @endif
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      
                      <tr>
                        <td>Location:</td>
                        <td>{{ Auth::user()->location }}</td>
                      </tr>
                        
                      <tr>
                        <td>My Skills:</td>
                        <td>
                            
                        @if(count($skillsToProfile)==0)
                        <span>No Skills Added <a href="{{url('/addSkill')}}"  class="btn btn-danger"> Add One </a> <span>
                        @else 


                           @for($i=0; $i<count($skillsToProfile); $i++)
                           <span>{{$skillsToProfile[$i]->name}}</span>
                           @endfor
                    
                           @endif

                      </td>
                      </tr>
                      <tr>
                     
                        <td>Join At:</td>
                        <?php $var =Auth::user()->created_at; ?>
                           
                        <td>{{date("Y/m/d", strtotime($var))}}</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender:</td>
                        <td>Male</td>
                    
                      <tr>
                        <td>Email:</td>
                        <td>{{ Auth::user()->email}}</td>
                      </tr>
                        <td>Mobile:</td>
                        <td>{{ Auth::user()->mobile}}
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <a  class="btn btn-danger" onClick="$('#form1').hide(); $('#form2').show()"> Edit Profile </a>

                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>
    <!--form2-->

    <div class="container" id="form2" style="display:none;">
      <div class="row">
  
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #383838">
              <h3 style="color:white">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
            </div>
            <div class="panel-body" style="background-color:white;">
              <div class="row">
              @if(count($pictures)!=0)
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"  src="{{URL::asset('profile-images/'.$pictures[count($pictures)-1]->profile )}}"  class="img-circle img-responsive"> </div>
              @else
              <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic"  src="{{URL::asset('profile-images/profile.jpg')}}" class="img-circle img-responsive"> </div>  
               @endif
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      
                      <tr>
                        <td>Name:</td>
                        <td>
                        <div class="form-group">
                        <input type="text" class="form-control" id="usr">
                        </div></td>

                      </tr>
                        
                      <tr>
                        <td>Password:</td>
                        <td>
                        <div class="form-group">
                          <input type="text" class="form-control" id="usr">
                        </div>
                          </td>
                          </tr>
                          <tr>
                     
                        <td>Mobile</td>
                           
                        <td>
                        <div class="form-group">
                          <input type="number" class="form-control" id="usr">
                        </div></td>
                        
                        </tr>
                        <tr>
                             <tr>
                        <td>Email:</td>
                        <td>
                        <div class="form-group">
                          <input type="email" class="form-control" id="usr">
                        </div>
                        </td>
                      </tr>

                        

                     
                    
                  </table>
                  
                  <a  class="btn btn-danger" onClick="$('#form2').hide(); $('#form1').show()"> Show Profile </a>
                  <input type="submit"  class="btn btn-success" value=" Submit Changes" ></input>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>

                 


@endsection

    
