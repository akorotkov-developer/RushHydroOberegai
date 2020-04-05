function startApplication() {
	var lastPosition = null,
	lastMarker = null,

	gmap = null,
	overlays = [],

	firstRender = true,
	
	polyIndex = 0,
	polyPos = [],
	posAll = [],

	/**
	 * Удалить с карты все добавленные объекты.
	 */
	clear = function() {
		for (var i = 0 ; i < overlays.length; i++) {
			overlays[i].setMap(null);
		}

		lastModified = null;
		lastPosition = null;
		lastMarker = null;

		overlays = [];
		
		polyIndex = 0;
		polyPos = [];
		posAll = [];
	},

	/**
	 * Отцентровать карту по последней точке.
	 */
	centerToLastPosition = function() {
		if (firstRender) {
			//gmap.fitBounds(gm.bounds(posAll));
			gmap.setZoom(4);
			
			/*if (lastPosition)
				gmap.setCenter(lastPosition);
			*/
			firstRender = false;
		}
	},
	
	addMarker = function(markerType, position, noMarker, noPoly) {
		if (!noMarker) {
			var marker = gm.marker(position, markerType);
			marker.setMap(gmap);
			lastMarker = marker;
			overlays.push(marker);
		}
		
		posAll.push(position);

		if (!noPoly) {
			if (!polyPos[polyIndex]) polyPos[polyIndex] = [];
			
			polyPos[polyIndex].push(position);
		}
		
		return marker;
	},

	/**
	 * Обработчик для jXHR (координаты точек)
	 */
	onDataSuccess = function(data) {
		if (data) {
			var position = null,

			marker = null, 
			markerType = null, 
			
			isFirstPoint = null,
			isLastPoint = null,
			isBoundPoint = null,
			isKeyPoint = null,
			polyColor = 0,
			polyColors = [],
			
			keyPointCount = 0,
			
			poly = null;
			
			polyIndex = 0,
			
			passedPath = [],
			leftPath = [],
			boundCount = 0,
			firstPoint = null;
			passedPolyIndex = 0;
			
			for (var i = 0; i < data.length; i++) {
				isFirstPoint = (i === 0);
				isLastPoint = ((i + 1) === data.length);
				isBoundPoint = isFirstPoint || isLastPoint || (data[i].length > 2 && data[i][2] === 'bound');
				isKeyPoint = (data[i].length > 2) && (data[i][2] === 'bingo');
				
				if (isBoundPoint) {
					polyColor++;
				}
				
				position = gm.pos(data[i]);

				if (isFirstPoint) {
					firstPoint = position;
				}
				
				if (isKeyPoint) {
					addMarker('current', position, false, false);
					passedPolyIndex = polyIndex;
					polyIndex++;
					addMarker('bound', position, true, false);

					keyPointCount++;
					lastPosition = position;
				}
				else if (isBoundPoint) {
					if (isFirstPoint) {
						markerType = 'first';
					}
					else if (isLastPoint) {
						markerType = 'last';
					}
					else {
						boundCount++;
						markerType = 'bound'+boundCount;
					}
					
					addMarker(markerType, position, false, false);
					polyIndex++;
					addMarker('bound', position, true, false);
				}
				else {
					addMarker('bound', position, !isBoundPoint, false);
				}
				
				if (keyPointCount) {
					leftPath.push(position);
				}
				else {
					passedPath.push(position);
				}
				
				polyColors[polyIndex] = polyColor;
			}
			
			for (i = 0; i < polyPos.length; i++) {
				poly = gm.poly(polyPos[i], (keyPointCount ? i : 2), polyColors[i], passedPolyIndex);
				poly.setMap(gmap);
				overlays.push(poly);
			}
			
			if (!keyPointCount) {
				addMarker('current', firstPoint, false, true);//.setAnimation(google.maps.Animation.BOUNCE);
			}
			
			if (!keyPointCount) {
				leftPath = passedPath;
				passedPath = [];
			}
			
			leftDistance = Math.round(google.maps.geometry.spherical.computeLength(leftPath, 6378));
			passedDistance = passedPath ? Math.round(google.maps.geometry.spherical.computeLength(passedPath, 6378)) : 0;
			
			if (engVersion === 1)	
				$('#legend').html('Traversed distance: <b>' + passedDistance + 'km</b><br/> Distance remaining: <b>' + leftDistance + 'km</b>');
			else			
				$('#legend').html('Пройдено: <b>' + passedDistance + 'км</b><br/> Осталось&nbsp;: <b>' + leftDistance + 'км</b>');

			centerToLastPosition();
		}
	},

	/**
	 * Запросить с сервера массив маркеров и отрисовать его.
	 */
	drawMarkers = function() {
		$.ajax({
			url: CLIENT_PATH + 'data.php',
			type: 'POST',
			dataType: 'json',
			success: onDataSuccess
		});
	},

	/**
	 * Магия :)
	 */
	process = function() {
		gmap = gm.map($('#map')[0]);
		
		window.drawMarkers = drawMarkers;
		window.clearMarkers = clear;
		
		drawMarkers();
	};

	process();
}