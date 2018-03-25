@extends('layouts.profile-master')
@section('Link')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAE6RfNc2xUty4LuxCstPRwQnRDL18fmO8&libraries=places">
</script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markermanager/src/markermanager.js"></script>
<script type="text/javascript">
  
  function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng( {{ Auth::user()->lat }}
             ,  {{ Auth::user()->lng }} ),
      zoom: 13,
      draggable:false
    };
  
    var map = new google.maps.Map(document.getElementById("MapDiv1"),
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

            @foreach($users as $user)
             

           @if($user->id !=Auth::user()->id)
            var marker{{$user->id}} = new google.maps.Marker({
                position: new google.maps.LatLng({{$user->lat}},{{$user->lng}}),
                map: map,
                title: "{{$user->fname}}"
                //icon:"{{URL::asset('/images/home12.png')}}"
                   });

               

            mgr.addMarker(marker{{$user->id}},0);
            mgr.refresh();
            mgr.show();
  
           @endif

            @endforeach

                
            });
        




 

            }

google.maps.event.addDomListener(window, 'load', initialize);
</script>


<script type="text/javascript">
  
   function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng( {{ Auth::user()->lat }}
             ,  {{ Auth::user()->lng }} ),
      zoom: 13,
      draggable:false
    };
  
    var map = new google.maps.Map(document.getElementById("MapDiv"),
        mapOptions);

  var mgr = new MarkerManager(map);

  google.maps.event.addListener(mgr, 'loaded', function () {
            

             var marker{{Auth::user()->id}} = new google.maps.Marker({
                    position: new google.maps.LatLng({{Auth::user()->lat}},{{Auth::user()->lng}}),
                    map: map,
                    title: "{{Auth::user()->fname}}",
                    icon:"{{URL::asset('/images/work.png')}}",
                    animation: google.maps.Animation.BOUNCE

                       });

      

                
            });
        




 

            }

google.maps.event.addDomListener(window, 'load', initialize);
</script>


@endsection
@section('info')
  
  
<div class="container">
<div class="row">

<div class="col-lg-3">
<a  class="btn btn-danger">
    <span class="glyphicon glyphicon-home"></span> Home Location
  </a>
</div>

<div class="col-lg-3">

</div> 

<div class="col-lg-3">
<a style="margin-left:-68px;" class="btn btn-danger">
    <span class="glyphicon glyphicon-picture"></span> Work Location
  </a>
</div>

<div class="col-lg-3">

</div> 

</div>

<div class="row">
<div class="col-lg-6" style="margin-left:0px;margin-right:10px;margin-top:5px;width:450px;height:450px" id="MapDiv1">
</div>
<div class="col-lg-6" style="margin-left:0px;margin-top:5px;width:450px;height:450px" id="MapDiv">
<input type='hidden' id= 'lat_id' name='lat' value='' />
<input type='hidden' id= 'lng_id' name='lng' value='' />
</div>



</div>
</div>
@endsection

    
