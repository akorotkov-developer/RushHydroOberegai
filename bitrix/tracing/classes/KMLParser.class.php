<?php
class KMLParser {
	
	const KML_URL = 'http://maps.google.ru/maps/ms?hl=ru&ie=UTF8&authuser=0&oe=UTF8&msa=0&output=kml&msid=';

	protected $id = null;
	protected $placemarks = null;
	protected $currentPlacemark = null;
	protected $currentData = null;
	
	protected $nullCoords = array();
	
	/**
	 * @param string $id
	 * @return KMLParser
	 */
	public static function create($id) {
		return new self($id);
	}
	
	protected function __construct($id) {
		$this->id = $id;
	}
	
	protected function parseCoord(&$coord, $key) {
		$coord = explode(',', $coord);
		foreach ($coord as $k => $v) {
			$coord[$k] = floatval(trim($v));
		}
		
		if (count($coord) !== 3) $this->nullCoords[] = $key;
	}
	
	protected function parseCoordsString($data) {
		$data = explode("\n", $data);
		
		array_walk($data, array($this, 'parseCoord'));
		foreach ($this->nullCoords as $idx) {
			unset($data[$idx]);
		}
		$this->nullCoords = array();
		
		
		return $data;
	}
	
	protected function xmlElementStart($parser, $name, $attribs) {
		switch ($name) {
			case 'PLACEMARK':
				if ($this->placemarks === null) {
					$this->placemarks = array();
				}
				
				$this->placemarks[] = array();
				$this->currentPlacemark = count($this->placemarks) - 1;
				break;
				
			case 'NAME':
			case 'DESCRIPTION':
			case 'STYLEURL':
			case 'COORDINATES':
				if ($this->currentPlacemark !== null) {
					$this->currentData = strtolower($name);
				}
				break;
				
			case 'POINT':
			case 'LINESTRING':
				if ($this->currentPlacemark !== null) {
					$this->placemarks[$this->currentPlacemark]['type'] = strtolower($name);
				}
				break;
		}
	}
	
	protected function xmlElementEnd($parser, $name) {
		$this->currentData = null;
		switch ($name) {
			case 'PLACEMARK':
				$this->currentPlacemark = null;
				break;
		}
	}
	
	protected function xmlCData($parser, $data) {
		if ($this->currentPlacemark === null || $this->currentData === null) {
			return;
		}
		
		switch ($this->currentData) {
			case 'coordinates':
				$data = $this->parseCoordsString($data);
				break;
		}
		
		$this->placemarks[$this->currentPlacemark][$this->currentData] = $data;
	}
	
	public function getPlacemarks() {
		if ($this->placemarks === null) {
			$data = file_get_contents(self::KML_URL.$this->id);
			
			$parser = xml_parser_create();
			xml_set_element_handler(
				$parser, 
				array($this, 'xmlElementStart'), 
				array($this, 'xmlElementEnd') 
			);
			xml_set_character_data_handler(
				$parser,
				array($this, 'xmlCData')
			);
			xml_parse($parser, $data);
			xml_parser_free($parser);
		}

		return $this->placemarks;
	}
	
}