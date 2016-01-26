	var des;
	var sou;
	var oid = 1;
	
	function findLocation(oid) {
		$.ajax({type:'POST', url:'track.php',data: { order_id: oid}, dataType: 'json', success: function(data){
			for(var i=0;data[i]['user_lat']!='';i++) {
				user_lat = data[i]['user_lat'];
				user_lng = data[i]['user_lng'];
				order_lat = data[i]['order_lat'];
				order_lng = data[i]['order_lng'];
				destination = user_lat+","+user_lng;
				source = order_lat+","+order_lng;
				localStorage.setItem("des", destination);
				localStorage.setItem("sou", source);
			}
			}, async: false
		});
	}
	
	function calculateRoute() {
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

		var interval = setInterval(function() {
			findLocation(oid);
			oid+=1;
			var directionsRequest = {
				origin: localStorage.getItem("des") ,
				destination: localStorage.getItem("sou"),
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
				//alert("total distance" + route.legs[i].distance.text);
				//alert ("total duration" + route.legs[i].duration.text);
				}
				} else {
					$("#error").append("Unable to retrieve your route<br />");
				}
			});
			var directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
			var trafficLayer = new google.maps.TrafficLayer();
			trafficLayer.setMap(mapObject);
			var dv = $('#dvPanel').text();
			if(dv==''){
				directionsDisplay.setPanel(document.getElementById('dvPanel'));
			}		
		}, 3000);
	}
	

	$(document).ready(function() {
		// If the browser supports the Geolocation API
		if (typeof navigator.geolocation == "undefined") {
			$("#error").text("Your browser doesn't support the Geolocation API");
			return;
		}
		
		$("#calculate-route").click(function(event) {
			event.preventDefault();
			$('#buttons-above-map').removeClass('hidden');
			var height = $("#map").height();
			if(height<=100){
				$("#map").css("height","+=600");
			}
			calculateRoute();
		});
	});