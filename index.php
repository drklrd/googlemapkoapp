<!DOCTYPE html>

<html>
  <head>
    <style>
      #map_canvas {
        width: 100%;
        height: 400px;
		
		margin-left: auto ;
  margin-right: auto ;
      }
	  #enterer {
        text-align:center;
		
		margin-left: auto ;
  margin-right: auto ;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
var geocoder;
var name;
var map;
var mapOptions;
var myLatLng;
var beachMarker;
var x;
var markerpos;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(initialize);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
    function initialize(position) {
	geocoder = new google.maps.Geocoder();
   latitude=position.coords.latitude;
   longitude=position.coords.longitude;
   mapOptions = {
    zoom: 14,
    center: new google.maps.LatLng(latitude, longitude)
  }
   map = new google.maps.Map(document.getElementById('map_canvas'),
                                mapOptions);


   myLatLng = new google.maps.LatLng(latitude, longitude);
   beachMarker = new google.maps.Marker({
      position: myLatLng,
      title:"Hello !",
	draggable:true
  });
beachMarker.setMap(map);
 alert("Currently you are using your device from this location: "+beachMarker.getPosition() + ". We have found it out Magically ! ");
 google.maps.event.addListener(beachMarker, 'dragend', function() {
   
 x = document.getElementById("demo");
 markerpos=beachMarker.getPosition();
alert("Current Marker location : "+markerpos);
  });
}



    </script>
  </head>
  <body onLoad="getLocation()" >

<p id="demo" align=center> <b>A Simple Google Map Web application</b></p>
	
    <div id="map_canvas" ></div>
	<br>
	 
	<div id="enterer">
	Enter Name &nbsp &nbsp &nbsp:<input id="name" type="textbox" value=""> <br> <br>
	Enter Location :<input id="address" type="textbox" value=""> <br> <br>
    <input type="button" value="Pin this address" onclick="codeAddress()">
	</div>
  </body>
</html>


