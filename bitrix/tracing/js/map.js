window.gm = {
	pos: function(position) {
		return new google.maps.LatLng(position[0], position[1]);
	},
	
	markerIcon: function(type) {
		var img = null;
		
		switch (type) {
		case 'current':
			img = 
				new google.maps.MarkerImage(
					gm.markerType(type), 
					new google.maps.Size(61, 38), 
					new google.maps.Point(0, 0), 
					new google.maps.Point(22, 38)
				);
			break;
			
		case 'first':
		case 'last':
			img = 
				new google.maps.MarkerImage(
					gm.markerType(type), 
					new google.maps.Size(46, 52), 
					new google.maps.Point(0, 0), 
					new google.maps.Point(46, 4)
				);
			break;
			
		default:
			img =
				new google.maps.MarkerImage(
					gm.markerType(type), 
					new google.maps.Size(13, 13), 
					new google.maps.Point(0, 0), 
					new google.maps.Point(6.5, 6.5),
					new google.maps.Size(13, 13)
				);
			break;
		
		}
		
		return img;
	},

	marker: function(position, type) {
		return new google.maps.Marker({
			position: position,
			clickable: false,
			icon: gm.markerIcon(type),
			optimized: false,
			zIndex: (type === 'first' || type === 'last' ? 2 : (type === 'current' ? 3 : 1))
		});
	},
	
	markerType: function(type) {
		return CLIENT_PATH+'markers/marker-' + type + '.png';
	},

	poly: function(polyPos, index, color, passedPolyIndex) {
		var colors = {
				1: 'rgb(153, 153, 214)',
				2: 'rgb(163, 232, 255)',
				3: 'rgb(140, 209, 140)',
				4: 'rgb(255, 186, 140)'
		};
		
		return new google.maps.Polyline({
			clickable: false,
			path: polyPos,
			strokeColor: (index > passedPolyIndex ? colors[color] : '#0066ff'), 
			strokeWeight: 4,
			strokeOpacity: (index > 1 ? 0.7 : 0.9)
		});
	},
	
	map: function(element) {
		return new google.maps.Map(
			element, 
			{
				center: gm.pos([65.5, 60.0]),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoom: 4,

				disableDefaultUI: true,
				disableDoubleClickZoom: true,
				draggable: true,
				mapTypeControl: false,
				overviewMapControl: false,
				panControl: false,
				rotateControl: false,
				scaleControl: true,
				scrollwheel: true,
				zoomControl: true,
				streetViewControl: false
			}
		);
	},
	
	bounds: function(posArray) {
		var max = [null, null];
		min = [null, null],
		posType = ['lat', 'lng'],
		posFunc = null,
		bounds = null,
		i = 0, j = 0;

		for (i = 0; i < posArray.length; i++) {
			for (j = 0; j < posType.length; j++) {
				posFunc = posType[j];
				if (max[j] === null || max[j] < posArray[i][posFunc]()) max[j] = posArray[i][posFunc]();
				if (min[j] === null || min[j] > posArray[i][posFunc]()) min[j] = posArray[i][posFunc]();
			}
		}
		
		bounds = new google.maps.LatLngBounds(gm.pos(min), gm.pos(max));

		return bounds;
	}
};