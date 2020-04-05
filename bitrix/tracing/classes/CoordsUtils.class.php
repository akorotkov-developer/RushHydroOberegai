<?php

class CoordsUtils {

	const EARTH_RADIUS = 6378.1370;
	
	protected $coords = null;
	
	public static function toRad($degree) {
		return $degree * (pi() / 180);
	}

	public static function getDistance($c1, $c2) {
		$c1 = array(self::toRad($c1[0]), self::toRad($c1[1]));
		$c2 = array(self::toRad($c2[0]), self::toRad($c2[1]));

		return 2 * pi() * self::EARTH_RADIUS * acos(sin($c1[0]) * sin($c2[0]) + cos($c1[0]) * cos($c2[0]) * cos($c1[1] - $c2[1]));
	}
	
	public static function getPointBetween($c1, $c2, $part = 0.5) {
		return array(
			$c1[0] + ($c2[0] - $c1[0]) * $part,
			$c1[1] + ($c2[1] - $c1[1]) * $part 
		);
	}
	
	/**
	 * @param array $coords
	 * @return CoordsUtils
	 */
	public static function create($coords) {
		return new self($coords);
	}
	
	protected function __construct($coords) {
		$this->coords = $coords;
	}
	
	public function getByIndex($index) {
		return isset($this->coords[$index]) ? $this->coords[$index] : null;
	}
	
	public function getNearest($c, $gt = 0) {
		return $this->getByIndex($this->getNearestIndex($c, $gt));
	}
	
	public function getNearestIndex($c, $gt = 0) {
		$distance = null;
		$testDistance = null;
		$nearest = null;
		$found = false;
		
		foreach ($this->coords as $index => $coord) {
			$testDistance = self::getDistance($c, $coord);
			if (
				$distance === null
				|| (($testDistance !== 0) && ($testDistance < $distance) && ($testDistance > $gt))
			) {
				$nearest = $index;
				$distance = $testDistance;
				$found = true;
			}
		}
		
		return $found ? $nearest : null;
	}
	
	public static function perpend($c1, $c2, $cSource) {
		/*$kat1 = abs(($c1[1] - $c2[1]) * $cSource[0] + ($c2[0] - $c1[0]) * $cSource[1] + ($c1[0] * $c2[1] - $c2[0] * $c1[1])) / sqrt(pow($c2[0] - $c1[0], 2) + pow($c2[1] - $c1[1], 2));
		$gip = self::getDistance($c1, $cSource);
		
		$kat2 = sqrt(pow($gip, 2) - pow($kat1, 2));
		$whole = self::getDistance($c1, $c2);
		
		$part = $kat2 / $whole;
		return self::getPointBetween($c1, $c2, $part);*/
		
    	// ЙОГА - КОД
		
		$distance = null;
		$point = null;
		for ($i = 0; $i < 10000; $i++) {
			$c = self::getPointBetween($c1, $c2, $i * 0.0001);
			$testDistance = self::getDistance($c, $cSource);
			if ($distance === null || $testDistance < $distance) {
				$point = $c;
				$distance = $testDistance;
			}
		}
		
		return $point;
	}
	
}