<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Find a route using Geolocation and Google Maps API</title>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
	function calculateRoute(from, to) {
		// Center initialized to Naples, Italy
		var latitude;
		var longitude;
		alert ("from " + from + " TO " + to);
		var myOptions = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoom: 0,
		};
		
		// Draw the map
		var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
		var directionsService = new google.maps.DirectionsService();
		var directionsRequest = {
			origin: from ,
			destination: to ,
			travelMode: google.maps.DirectionsTravelMode.DRIVING,
			unitSystem: google.maps.UnitSystem.METRIC,
			provideRouteAlternatives: true
		};
		
		directionsService.route(directionsRequest,function(response, status){
			if (status == google.maps.DirectionsStatus.OK){
				new google.maps.DirectionsRenderer({
				map: mapObject,
				directions: response
				});
			}
			else
				$("#error").append("Unable to retrieve your route<br />");
		});
	}

	function mapRefersh(){
		calculateRoute(sour,des);
	}
	
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position){
				latitude = position.coords.latitude; 
				longitude = position.coords.longitude;	
				var geocoder = new google.maps.Geocoder();
				var location = new google.maps.LatLng(latitude,longitude);
				geocoder.geocode({'latLng': location},function(results, status) {
					if (status == google.maps.GeocoderStatus.OK){
						$("#from").val(results[0].formatted_address);
					} else{
						$("#error").append("Unable to retrieve your address<br />");
					}
				});
			},
			function(positionError){
				$("#error").append("Error: " + positionError.message + "<br />");
			},
			{
				enableHighAccuracy: true,
				timeout: 10 * 1000 // 10 seconds
			});
		} 
	}



	$(document).ready(function() {
		// If the browser supports the Geolocation API
		if (typeof navigator.geolocation == "undefined") {
			$("#error").text("Your browser doesn't support the Geolocation API");
			return;
		}
		

		$("#from-link, #to-link").click(function(event) {
			event.preventDefault();
			getLocation();
		});

		$("#calculate-route").submit(function(event) {
			event.preventDefault();
			alert("I am an alert box inside submit!");
			//mapRefersh();
			calculateRoute($("#from").val(), $("#to").val());
		});
	});
	//setInterval(mapRefersh, 3000);


	</script>
	<style type="text/css">
		#map {
			width: 100%;
			height: 800px;
			margin-top: 10px;
		}
	</style>
</head>

<body>
	<h1>Calculate your route</h1>
	<form id="calculate-route" name="calculate-route" action="#" method="POST">
		<label for="from">From:</label>
		<input type="text" id="from" name="from" placeholder="An address" size="30" />
		<a id="from-link" href="#">Get my position</a>
		<br />
		<label for="to">To:</label>
		<input type="text" id="to" name="to" placeholder="Another address" size="30" />
		<br />
		<input type="submit" />
		<input type="reset" />
	</form>
	<div id="map"></div>
	<p id="error"></p>
</body>
</html>