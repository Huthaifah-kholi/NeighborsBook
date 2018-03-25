@extends('layouts.master')

@section('links')
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href="css/profile.css" rel="stylesheet" type="text/css" media="all"/>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>


<script type="text/javascript">
$(function(){
    $("#upload1").change(function(){
        $("#myform").submit();
    });
});


</script>

<style type="text/css">


/* ==========================================================================
   Author's custom styles
   ========================================================================== */

body
{
    font-family: 'Open Sans', sans-serif;
}

.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 1050px;  
    margin-bottom: 10px;
    margin-top: 20px;
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 20%; 
}



.fb-image-profile
{
    margin: -200px 10px 0px 25px;
    z-index: 9;
    width: 20%;
    border: solid #B81D22; 
    border-radius: 100px;
}
 
.container{
width: 1050px; 
margin: 20px;
margin-right: 0px;
background:#f2f2f2;   
} 
span.glyphicon-camera {
    font-size: 1.5em;
    width:20px;

} 
/* ==========================================================================
   Author's custom styles
   ========================================================================== */
</style>



<script type="text/javascript">




var socket = io.connect('http://localhost:8890');
  
   @for($i=0;$i<count($users);$i++)
    
   
    socket.on('channel'+{{$users[$i]->id}}+{{Auth::user()->id}}, function (data) {      
       
       data = jQuery.parseJSON(data);


$( "#nott" ).append(
    '<div id="not1">'+
    '<div class="appNotifications">'+
    '<div class="row" style="max-width:600px">'+
        '<div class="col-md-12 col-md-offset-3">'+
            '<div class="alert alert-purple alert-dismissable">'+
                '<span class="glyphicon glyphicon-bell" style=" margin-right:10px;"></span>'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+ 
                '<span class="notifTitle"><strong>New Approvement</strong></span><br><a href="" style="color:#fff;text-decoration:none;">Push notification body goes here, blah blah blah</a></div>'+
        '</div>'+
    '</div>'+
'</div>'+
'</div>'
    ); 

      
      });

 @endfor
     

</script>

@yield('Link')
@endsection



@section('body')
<div class="container" >
    <div class="fb-profile">
    
        <img align="left" class="fb-image-lg" src="{{URL::asset('/profile-images/cover.jpg')}}" alt="Profile image example" height="300px" />
       
        @if(count($pictures)!=0)
        <img align="left" class="fb-image-profile thumbnail" src="{{URL::asset('profile-images/'.$pictures[count($pictures)-1]->profile)}}"  alt="Profile image example" height="220px" />
        @else
        <img align="left" class="fb-image-profile thumbnail" src="{{URL::asset('profile-images/profile.jpg')}}"  alt="Profile image example" height="220px" />
        @endif            
        <form action="{{ url('/addpicture') }}" method="post" accept-charset="utf-8" class="form"  role="form" id="myform" enctype="multipart/form-data"> 
        {!! csrf_field() !!}
        <label class="btn btn-danger btn-sm" for="my-file-selector" style="float:left;margin-left:-130px;margin-top:-35px;color:black;">
        <span class="glyphicon glyphicon-camera"></span> 
        <input  type="file" style="width:1px;height:0px;" id="upload1" name="image" >
        </label>
        </form>

        <label class="btn btn-danger btn-sm" for="my-file-selector" style="float:left;margin-left:738px;margin-top:-50px;color:black;">
        <span class="glyphicon glyphicon-camera"></span> 
        <input id="my-file-selector" type="file" style="display:none;">
        </label>

       



    </div>

     <div class="pagination" style="margin-top:-1px;">
       <div class="btn-group btn-group-justified  btn-group-horizontal">
            
            <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{url('/profile')}}" >
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <div class="visible-lg" >profile</div>
                </a>
              </div>

           <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{url('/location')}}" >
                    <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
                    <div class="visible-lg" >Locations</div>
                </a>
              </div>

          <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{url('/addSkill')}}" >
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <div class="visible-lg" >Rate</div>
                </a>
              </div>
                 
           <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{url('/myuploads')}}" >
                    <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>
                    <div class="visible-lg" >My Uploads</div>
                </a>
              </div>
             
            <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{url('/myneighbors')}}" >
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <div class="visible-lg" >My Neighbors</div>
                </a>
              </div>

             <div class="btn-group " role="group"> 
                <a id="b1"  class="btn btn-nav" href="{{url('notifications')}}" >
         <span class="glyphicon glyphicon-bell " style="margin-left:-20px;" aria-hidden="true"></span>
        <span class="img-thumbnail" id="not" style="float:left;margin-left:5px;margin-top:5px;color:black;font-size:20px; font-family:'Oswald'; border: 2px solid red;border-radius: px;">20</span>

                    <div class="visible-lg" >Notifications</div>

                </a>
              </div>
    </div>
    
</div>


@yield('info')


</div> <!-- /container --> 

@endsection