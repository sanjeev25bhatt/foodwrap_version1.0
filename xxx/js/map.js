
	function calculateRoute(from, to) {
		var latitude;
		var longitude;
		var myOptions = {
			zoom: 10,
			disableDefaultUI: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
		};
		
		// Draw the map
		var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
		var directionsService = new google.maps.DirectionsService();
		  var directionsDisplay = new google.maps.DirectionsRenderer;
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
				directionsDisplay.setDirections(response);
				var route = response.routes[0];
				 // For each route, display summary information.
			for (var i = 0; i < route.legs.length; i++) {
				var routeSegment = i + 1;
			alert("total distance" + route.legs[i].distance.text)
			alert ("total duration" + route.legs[i].duration.text);
			}
			}
			else {
				$("#error").append("Unable to retrieve your route<br />");
			}
		});
		var directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
		var trafficLayer = new google.maps.TrafficLayer();
		trafficLayer.setMap(mapObject);
		directionsDisplay.setPanel(document.getElementById('dvPanel'));
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
			$('#buttons-above-map').removeClass('hidden');
			$("#map").css("height","+=600");
			calculateRoute($("#from").val(), $("#to").val());
		});
	});