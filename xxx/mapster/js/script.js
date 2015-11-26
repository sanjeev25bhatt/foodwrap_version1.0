$(document).ready(function(window, google, mapster){
	
	var options = mapster.MAP_OPTIONS;
	element = document.getElementById('map-canvas');
	map = mapster.create(element, options);
	
	$.getJSON('markers.php', function(data) {
			for(var i=0;i<2;i++){
				var latitude = data[i]['latitude'];
				var longitude = data[i]['longitude'];
				var mycontent = data[i]['content'];
				var description = data[i]['description'];
				var latlng = new google.maps.LatLng(latitude, longitude);

				marker = new google.maps.Marker({
					position: latlng,
					map: map.gMap,
					event: {
						name: 'click',
						callback: function() {
							var infoWindow = new google.maps.InfoWindow({
								content: 'aman'
							});
							infoWindow.open(map.gMap, marker);
						}
					},
					icon: 'images/restaurant.png'
				});
			}
	});
}(window, google, window.Mapster || (window.Mapster = {})));