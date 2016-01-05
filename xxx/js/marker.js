$(document).ready(function(){
	
	var options = {
		center: {
			lat: 29.872906,
			lng: 77.898138
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
	
	$.getJSON('markers.php', function(data) {
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
				content: '<h2>'+name+'</h2><h4>'+content+'</h4>',
				icon: 'images/'+description+'.png'
			});
			google.maps.event.addListener(marker,"click", function(e){	
				var infoWindow = new google.maps.InfoWindow({
					content: '<div id="info">'+this.content+'</div>'
				});
				infoWindow.open(map, this);
			});
		}
	});
	
});