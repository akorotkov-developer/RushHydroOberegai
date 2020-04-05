<?php
require_once 'config.php';

$parserRoute = PositionStorageFactory::get(FILE_ROUTE_JSON);
$parserCurrent = PositionStorageFactory::get(FILE_JSON);

$coords = $parserRoute->getData();

if ($realPosition = $parserCurrent->getLastPosition()) {
	$utils =
		CoordsUtils::create($coords);
	
	$index1 = 
		$utils->
			getNearestIndex(
				$realPosition
			);
		
	$index2 = 
		$utils->
			getNearestIndex(
				$realPosition,
				CoordsUtils::getDistance(
					$utils->getByIndex($index1),
					$realPosition
				)
			);
		
	/*if ($index1 === 0) {
		$index2 = 1;
	}
	elseif ($index1 === count($coords) - 1) {
		$index2 = $index1 - 1;
	}
	else {
		$dist1 = $utils->getDistance($realPosition, $utils->getByIndex($index1 + 1));
		$dist2 = $utils->getDistance($realPosition, $utils->getByIndex($index1 - 1));
		
		$index2 =
			$dist1 < $dist2
				? $index1 - 1
				: $index1 + 1;
	}*/
	
	if ($index1 > $index2) {
		list($index2, $index1) = array($index1, $index2);
	}
		
	$projection =
		$utils->perpend(
			$utils->getByIndex($index1), 
			$utils->getByIndex($index2), 
			$realPosition
		);
		
	$projection[] = 'bingo';
		
	$coords = 
		array_merge(
			array_slice($coords, 0, $index1 + 1),
			array($projection),
			array_slice($coords, $index2)
		);
	
}
//var_dump(array($index1, $index2, count($coords)));
echo json_encode($coords);