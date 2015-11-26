$(document).ready(function(window, google, mapster){
	
	mapster.MAP_OPTIONS = {
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
}(window, google, window.Mapster || (window.Mapster = {})));