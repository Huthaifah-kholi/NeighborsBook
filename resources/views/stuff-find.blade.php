@extends('layouts.preview-master')
@section('div-content')
<div style="width:700px;">
<div style="width:450px;height:550px;background-color:#f5f5f0;float:left;margin:0px;" id="MapDiv2"></div>
<div id="MapDiv3"><span style="color:red;font-size:20px;">Directions:</span></div>
</div>
<style type="text/css">
	
      #right-panel {
        height: 100%;
        float: left;
        width: 390px;
        border: solid black;
        overflow: auto;
      }
</style>
<script type="text/javascript">

	var directionDisplay;
	var directionsService = new google.maps.DirectionsService();
	var map;

    function initialize() {
    directionsDisplay = new google.maps.DirectionsRenderer();
    var myOptions = {
      mapTypeId: google.maps.MapTypeId.ROADMAP,
       zoom: 7
    }
    map = new google.maps.Map(document.getElementById("MapDiv2"), myOptions);
    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('MapDiv3'));


    var start = new google.maps.LatLng( {{ Auth::user()->lat }}, {{ Auth::user()->lng }});
    var end = new google.maps.LatLng( {{$info->lat}},{{$info->lng}} );
    var request = {
      origin:start, 
      destination:end,
      travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
        var myRoute = response.routes[0];
        var txtDir = '';
        for (var i=0; i<myRoute.legs[0].steps.length; i++) {
          txtDir += myRoute.legs[0].steps[i].instructions+"<br />";
        }
      }
    });
  }

google.maps.event.addDomListener(window, 'load', initialize);

</script>
 
@endsection