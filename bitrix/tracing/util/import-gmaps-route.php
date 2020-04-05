<?php

require_once 'config.php';
$placemarks = KMLParser::create(GMAPS_ID)->getPlacemarks();

$storage = PositionStorageFactory::get(FILE_ROUTE_JSON);

$storage->clear();
foreach ($placemarks as $placemark) {
	if ($placemark['type'] !== 'linestring')
		continue;
		
	for ($i = 0; $i < count($placemark['coordinates']); $i++) {
		if (!$placemark['coordinates'][$i])
			continue;
		
		list($lng, $lat) = $placemark['coordinates'][$i];
		$pos = array($lat, $lng);
		
		if ($i + 1 === count($placemark['coordinates'])) {
			$pos[] = 'bound';
		}
		$storage->append($pos);
	}
}
$storage->save();