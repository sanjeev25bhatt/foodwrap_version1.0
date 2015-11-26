$(document).ready(function(window, google){
	
	//module: just like class
	var Mapster = (function() {
		//constructor function
		function Mapster(element, opts) {
			this.gMap = new google.maps.Map(element, opts);
		}
		Mapster.prototype = {
			zoom: function(level) {
				if(level){
					this.gMap.setZoom(level);
				} else {
					return this.gMap.getZoom();
				}
			},
			_on: function(opts){
				var self = this;
				google.maps.event.addListener(opts.obj, opts.event, function(e){
					opts.callback.call(self, e);
				});
			},
			addMarker: function(opts) {
				var marker;
				opts.position = {
					lat: opts.lat,
					lng: opts.lng
				}
				marker = this._createMarker(opts);
				if(opts.event){
					this._on({
						obj: marker,
						event: opts.event.name,
						callback: opts.event.callback
					});
				}
				if(opts.content){
					this._on({
						obj: marker,
						event: 'click',
						callback: function() {
							var infoWindow = new google.maps.InfoWindow({
								content: opts.content
							});
							infoWindow.open(this.gMap, marker);
						}
					})
				}
				return marker;
			},
			
			_createMarker: function(opts) {
				opts.map = this.gMap;
				return new google.maps.Marker(opts);
			}
		};
		return Mapster;
	}());
	
	Mapster.create = function(element,opts){
		return new Mapster(element, opts);
	};
	
	//Attaching Mapster to the window
	window.Mapster = Mapster;
	
}(window, google));