@extends('layouts.master')
@section('links')
<style type="text/css">
 .firstHeading{
  font-family: 'Oswald';
  font-size:15px;

 } 
 .span11{
font-family: 'Oswald';
font-size:13px bold;

 }

 #siteNotice{

  border: solid black;
 }

</style>
<script type="text/javascript">
  
  function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng( {{ Auth::user()->lat }}
             ,  {{ Auth::user()->lng }} ),
      zoom: 13
    };
  
    var map = new google.maps.Map(document.getElementById("MapDiv"),
        mapOptions);

  var mgr = new MarkerManager(map);

  google.maps.event.addListener(mgr, 'loaded', function () {
            

             var marker{{Auth::user()->id}} = new google.maps.Marker({
                    position: new google.maps.LatLng({{Auth::user()->lat}},{{Auth::user()->lng}}),
                    map: map,
                    title: "{{Auth::user()->fname}}",
                    icon:"{{URL::asset('/images/home.png')}}",
                    animation: google.maps.Animation.BOUNCE
                       });

           

                 
                            

             
            @foreach($mapinfo as $user)
           @if($user->id !=Auth::user()->id)
           var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1  class="firstHeading">{{$user->fname}}</h1>'+
            '<div id="bodyContent">'+
            '<p class="span11"><b>Lives : </b>,  @if($user->distance<1) {{floor($user->distance*1000)}}m @else
             {{floor($user->distance)}} Km @endif
             away from you.<br>' +
            'skills:@if($user->name!=null){{$user->name}}. @else No Skills Avalibale yet @endif <br>' +
            '</p>'+
            '<p class="span11">Email:{{$user->email}}</p>'+
            '</div>'+
            '</div>';


       var infowindow{{$user->id}} = new google.maps.InfoWindow({
          content: contentString
        });
            var marker{{$user->id}} = new google.maps.Marker({
                position: new google.maps.LatLng({{$user->lat}},{{$user->lng}}),
                map: map,
                title: "{{$user->fname}}"
                //icon:"{{URL::asset('/images/home12.png')}}"
                   });

                marker{{$user->id}}.addListener('click', function() {
                
                infowindow{{$user->id}}.open(map, marker{{$user->id}});
                    
                    });
               

            mgr.addMarker(marker{{$user->id}},0);
            mgr.refresh();
            mgr.show();
  
           @endif

            @endforeach

                
                    //alert(mgr.getMarkerCount(18));
            });
        




 

            }

google.maps.event.addDomListener(window, 'load', initialize);
</script>







@endsection
@section('body')
<div class="header_slide">
            <div class="header_bottom_left">                
                <div class="categories">
                  <ul>
                    <h3>Categories</h3>
                   

                      <li><a href="{{route('categories', ['id' => 'Dvds'])}}" >DVDs</a></li>
                      <li><a href="{{route('categories', ['id' => 'sports'])}}">Sports &amp; Fitness</a></li>
                      <li><a href="{{route('categories', ['id' => 'games'])}}">Computer Games</a></li>
                      <li><a href="{{route('categories', ['id' => 'books'])}}">Bocks</a></li>
                      <li><a href="{{route('categories', ['id' => 'clothings'])}}">Clothing</a></li>
                      <li><a href="{{route('categories', ['id' => 'beaties'])}}">Beauty &amp; Healthcare</a></li>
                       <li><a href="{{route('categories', ['id' => 'toys'])}}">Toys, Kids &amp; Babies</a></li>
                       <li><a href="{{route('categories', ['id' => 'gardens'])}}">Garden Equipment</a></li>
                       <li><a href="{{route('categories', ['id' => 'furnitures'])}}">Furniture</a></li>
                       <li><a href="{{route('categories', ['id' => 'electricals'])}}">Electrical</a></li>
                       <li><a href="{{route('categories', ['id' => 'others'])}}">Others</a></li>
                  </ul>
                </div>                  
             </div>

        <div class="header_bottom_right" style="margin-left:20px;width:780px;height:450px" id="MapDiv">                   
        </div>                
   </div>

 <div class="main">
    <div class="content"  style="background-color:white;">
        <div  >

            <div class="heading" style="margin:20px" >
            <h3> <span style="color:red">Unrestrained</span> Stuff around you </h3>
            </div>
            <div class="see" style="margin:20px">
                <p><a href="#">See all</a></p>
            </div>
            <div class="clear"></div>
           </div>

          <div class="section group">

               <?php $c2=0 ?>
                
               @for($i=0; $i<count($users); $i++)
               @if($users[$i]->id !=Auth::user()->id && $users[$i]->type =="forfree")
               @if($c2++==4)@break;
               @endif
                <div class="grid_1_of_4 images_1_of_4" style="margin-left:20px; border-radius: 15px;border: 2px solid black;">
                     <a href=""><img src="uploaded-images/{{$users[$i]->image}}" alt="" width="212px" height="212px" /></a>
                     <h2> <span style="color:black"> Name:{{$users[$i]->fname}}<br>{{$users[$i]->name}}<br><span style="color:red;">Unrestrained</span> </span></h2>
                    <div class="price-details">
                       <div class="price-number">
                            @if($users[$i]->distance<1)
                            <p><span class="rupees" style="color:black">{{floor($users[$i]->distance*1000)}}m</span></p>
                           @else 
                           <p><span class="rupees" style="color:black">{{floor($users[$i]->distance)}} Km</span></p>
                           @endif
                        </div>
                                <div class="add-cart">                              
                                <h4>
                            <!-- <a href="{{url('stuffpreview/'.'dvds'.'/'.$users[$i]->id)}}" > More Details ! </a> -->
                            <a href="{{route('stuffpreview',['cat' => 'dvds' ,'id' => $users[$i]->id ])}}" > More Details ! </a>

                                </h4>
                                 </div>
                             <div class="clear"></div>
                    </div>
               
                </div>
               @endif
                @endfor
               
            </div>
            
            <div class="content_bottom">
            <div class="heading">
            <h3> <span style="color:red">Limited</span> Stuff around you </h3>
            </div>
            <div class="see">
                <p><a href="#">See all</a></p>
            </div>
            <div class="clear"></div>
        </div>
            <div class="section group">

            
                <?php $c1=0 ?>

               @for($i=0; $i<count($users); $i++)
               @if($users[$i]->id !=Auth::user()->id && $users[$i]->type =="fordate")
                @if($c1++==4)@break;
               @endif
                <div class="grid_1_of_4 images_1_of_4" style="margin-left:20px; border-radius: 15px;border: 2px solid black;">
                     <a href="preview.html"><img src="uploaded-images/{{$users[$i]->image}}" alt="" width="212px" height="212px" /></a>
                     <h2><span style="color:black">Name:{{$users[$i]->fname}}<br>{{$users[$i]->name}}<br></span> <span style="color:red;text-transform:none">Died Line :{{$users[$i]->didline}} </span></h2>
                    <div class="price-details">
                       <div class="price-number">
                            @if($users[$i]->distance<1)
                            <p><span class="rupees" style="color:black">{{floor($users[$i]->distance*1000)}}m</span></p>
                           @else 
                           <p><span class="rupees" style="color:black" >{{floor($users[$i]->distance)}} Km</span></p>
                           @endif
                        </div>
                                <div class="add-cart">                              
                                    <h4>
                            <a href="" > More Details ! </a>
                                    </h4>
                                 
                                 </div>
                             <div class="clear"></div>
                    </div>
               
                </div>
               @endif
                @endfor

            </div>

             <div class="content_bottom">
            <div class="heading">
            <h3> <span style="color:red">SKills</span>  Around You</h3>
            </div>
            <div class="see">
                <p><a href="#">See all</a></p>
            </div>
            <div class="clear"></div>
        </div>

          <div class="section group">

              <?php $c=0 ?>

               @for($i=0; $i<count($skills);$i++)
                        

               @if($c++==4)@break;
               @endif 
                <div class="grid_1_of_4 images_1_of_4" style="margin-left:20px; border-radius: 15px;border: 2px solid black;">
                     <a href="preview.html"><img src="skills/{{$skills[$i]->imageSkill}}" alt="" width="212px" height="212px" /></a>
                     <h2><span style="color:black">Name:{{$skills[$i]->fname}}<br>Skill:{{$skills[$i]->name}}<br> {{$skills[$i]->days}} <br></span> <span style="color:red">{{date("g:i a", strtotime($skills[$i]->from))}}-{{date("g:i a", strtotime($skills[$i]->to))}}</span></h2>
                     <div class="price-details">
                       <div class="price-number">
                            @if($skills[$i]->distance<1)
                            <p><span class="rupees" style="color:black">{{floor($skills[$i]->distance*1000)}}m</span></p>
                           @else 
                           <p><span class="rupees" style="color:black" >{{floor($skills[$i]->distance)}} Km</span></p>
                           @endif
                        </div>
                                <div class="add-cart">                              
                                    <h4> <a href="" >Contact!</a></h4>
                                 </div>
                             <div class="clear"></div>
                    </div>
               
                </div>
                @endfor

            </div>


    </div>
 </div>
</div>


@endsection
