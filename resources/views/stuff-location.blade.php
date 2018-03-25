@extends('layouts.preview-master')
@section('div-content')
<div style="width:700px;height:600px;background-color:#f5f5f0;" id="MapDiv2"></div>
<script type="text/javascript">
  
  function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng( {{ Auth::user()->lat }}
             ,  {{ Auth::user()->lng }} ),
      zoom: 13
    };
  
    var map = new google.maps.Map(document.getElementById("MapDiv2"),
        mapOptions);

  var mgr = new MarkerManager(map);

  google.maps.event.addListener(mgr, 'loaded', function () {
            

             var marker{{Auth::user()->id}} = new google.maps.Marker({
                    position: new google.maps.LatLng({{$info->lat}},{{$info->lng}}),
                    map: map,
                    title: "{{$info->fname}}",
                    icon:"{{URL::asset('/images/loc.png')}}",
                    animation: google.maps.Animation.BOUNCE
                       });

     

                
            });
        


            }

google.maps.event.addDomListener(window, 'load', initialize);
</script>
 
@endsection