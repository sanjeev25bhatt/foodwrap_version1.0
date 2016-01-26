$(document).ready(function(){
	if(typeof navigator.geolocation == "undefined") {
		$("#error").text("Your browser doesn't support the Geolocation API");
		return;
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
						var add = results[0].formatted_address;
						var add_arr = add.split(", ");
						var count = add_arr.length;
						var city = add_arr[count-3];
						$("#city").val(city);
						$("#from").val(add);
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
	
	
	var options = {
		center: {
			lat: 28.634691,
			lng: 77.290991
		},
		zoom: 15,
		disableDefaultUI: false,
		scrollwheel: true,
		draggable: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoomControlOptions: {
			position: google.maps.ControlPosition.BOTTOM_LEFT,
			style: google.maps.ZoomControlStyle.DEFAULT
		}
	};
	var geocoder = new google.maps.Geocoder();
	var mapDiv = document.getElementById('map-canvas');
	var map = new google.maps.Map(mapDiv, options);

	var marker_data = [{
		latitude: 28.641438,
		longitude: 77.295583,
		content: 'A place for chicken lovers, enjoy a bucket now at just Rs. 549',
		description: 'chicken',
		name: 'KFC'
	},{
		latitude: 28.639169,
		longitude: 77.295014,
		content: 'a place for pizza lover.. Home delievery is also available, call 6888-6888',
		description: 'pizza',
		name: 'Dominos Pizza'
	},{
		latitude: 28.634691,
		longitude: 77.290991,
		content: 'One and only chinese Restaurant of New Delhi, be with us and enjoy happy evening meals',
		description: 'chinese',
		name: 'Berco\'s Restaurant'
	},{
		latitude: 28.626306,
		longitude: 77.285744,
		content: 'A non veg venue, a place for chicken lovers',
		description: 'chicken',
		name: 'Nazeer\'s Food Corner'
	}];
	
	for(var i=0;i<=3;i++){
		var latitude = marker_data[i].latitude;
		var longitude = marker_data[i].longitude;
		var content = marker_data[i].content;
		var description = marker_data[i].description;
		var latlng = new google.maps.LatLng(latitude, longitude);
		var name = marker_data[i].name;	
		var marker = new google.maps.Marker({
			position: latlng,
			map: map,
			content: '<h5>'+name+'</h5><p>'+content+'</p>',
			icon: 'images/'+description+'.png'
		});
		google.maps.event.addListener(marker,"mouseover", function(e){	
			var infoWindow = new google.maps.InfoWindow({
				content: '<div id="info">'+this.content+'</div>'
			});
			infoWindow.open(map, this);
			google.maps.event.addListenerOnce(map, 'mousemove', function(){
				infoWindow.close();
			});
		});
	}
	
	
	function findResNearby(lat, lng, city){
		var options = {
			center: {
				lat: lat,
				lng: lng
			},
			zoom: 15,
			disableDefaultUI: false,
			scrollwheel: true,
			draggable: true,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoomControlOptions: {
				position: google.maps.ControlPosition.BOTTOM_LEFT,
				style: google.maps.ZoomControlStyle.DEFAULT
			}
		};
		var mapDiv = document.getElementById('map-canvas');
		var map = new google.maps.Map(mapDiv, options);
		var markers = [];
		var bounds = new google.maps.LatLngBounds();
		var directionsService = new google.maps.DirectionsService();
		var directionsDisplay = new google.maps.DirectionsRenderer;

		// user as a marker
		var latlng = new google.maps.LatLng(lat, lng);
		var mark = new google.maps.Marker({
			position: latlng,
			map: map,
			title: 'Your position'
		});
		markers.push(mark);
		bounds.extend(mark.position);
		
		$.ajax({type:'POST', url:'markers.php', data: { city: city}, dataType: 'json', success: function(data){
			for(var i=0;data[i]['latitude']!='';i++){
				var latitude = data[i]['latitude'];
				var longitude = data[i]['longitude'];
				var id = data[i]['id'];
				var content = data[i]['content'];
				var description = data[i]['description'];
				var latlng = new google.maps.LatLng(latitude, longitude);
				var name = data[i]['name'];	
				var marker = new google.maps.Marker({
					position: latlng,
					map: map,
					id: id,
					title: 'Click to place your order',
					content: '<h5>'+name+'</h5><p>'+content+'</p>',
					icon: 'images/'+description+'.png'
				});
				
				// extend the bounds to include each marker's position
				bounds.extend(marker.position);
				markers.push(marker);
				google.maps.event.addListener(marker,"mouseover", function(e){	
					var infoWindow = new google.maps.InfoWindow({
						content: '<div id="info">'+this.content+'</div>'
					});
					infoWindow.open(map, this);
					google.maps.event.addListenerOnce(map, 'mousemove', function(){
						infoWindow.close();
					});
				});
				google.maps.event.addListener(marker,"click", function(e){
					
				});
			}
			
		}, async: false
		});
		map.fitBounds(bounds);	
		var markerCluster = new MarkerClusterer(map, markers);
	}
	
		
	$("#from-link").click(function(event) {
		event.preventDefault();
		getLocation();
	});
	
	$("#find-res").click(function(event) {
		event.preventDefault();
		var add = document.getElementById("from").value;
		var city = document.getElementById("city").value;
		var address = add+", "+city;
		geocoder.geocode({ 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				lat = results[0].geometry.location.lat();
				lng = results[0].geometry.location.lng();
			}
			findResNearby(lat, lng, city);
		});
	});
});