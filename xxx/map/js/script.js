
	function calculateRoute(from, to) {
		var latitude;
		var longitude;
		alert ("from " + from + " TO " + to);
		var myOptions = {
			zoom: 10,
			disableDefaultUI: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
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
			else {
				$("#error").append("Unable to retrieve your route<br />");
			}
		});
		
		var trafficLayer = new google.maps.TrafficLayer();
		trafficLayer.setMap(mapObject);
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
				timeout: 10 * 1000 
			});
		} 
	}



	$(document).ready(function() {
		// If the browser supports the Geolocation API
		if (typeof navigator.geolocation == "undefined") {
			$("#error").text("Your browser doesn't support the Geolocation API");
			return;
		}
		

		$("#from-link").click(function(event) {
			event.preventDefault();
			getLocation();
		});

		$("#calculate-route").submit(function(event) {
			event.preventDefault();
			alert("I am an alert box inside submit!");
			calculateRoute($("#from").val(), $("#to").val());
		});
	});