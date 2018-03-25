/*function initialize(){

var mapProp={

center: new google.maps.LatLng(32.225036,35.260968),
zoom: 15,
mapTypeId : google.maps.MapTypeId.ROADMAP,
 scrollwheel:true,
                draggable: true,
                panControl: true,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                overviewMapControl: true,
                rotateControl: true,
               
};

var map =new google.maps.Map(document.getElementById("MapDiv"),mapProp);

}




*/


function initAutocomplete() {
  
  var map = new google.maps.Map(document.getElementById('MapDiv'), {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    
  var latlng = searchBox.getPlaces();
  document.getElementById('lat_id').value = latlng[0].geometry.location.lat();
  document.getElementById('lng_id').value = latlng[0].geometry.location.lng();

    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
     
     places.forEach(function(place) {
      
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location,
        draggable:true,
      }
      )
      );

    google.maps.event.addListener(markers[0], 'dragend', function (event) {
    var lat = this.getPosition().lat();
    var lng = this.getPosition().lng();
    document.getElementById('lat_id').value = lat;
    document.getElementById('lng_id').value = lng;

    })

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}

google.maps.event.addDomListener(window,'load',initAutocomplete);






