<?php
class MarineTrafficParser {
	
	const MT_URL = 'http://marinetraffic.com/ais/getvesselxml.aspx?mmsi=';

	protected $id = null;
	protected $position = null;
	
	/**
	 * @param string $id
	 * @return MarineTrafficParser
	 */
	public static function create($id) {
		return new self($id);
	}
	
	protected function __construct($id) {
		$this->id = $id;
	}
	
	protected function xmlElementStart($parser, $name, $attribs) {
		if ($name !== 'V_POS')
			return;
			
		$this->position = array(
			floatval($attribs['LAT']),
			floatval($attribs['LON']),
			/*floatval($attribs['SPEED']),
			$attribs['TIMESTAMP'],*/
		);
	}
	
	public function getPosition() {
		if ($this->position === null) {
			$data = file_get_contents(self::MT_URL.$this->id);
			
			$parser = xml_parser_create();
			xml_set_element_handler(
				$parser, 
				array($this, 'xmlElementStart'), 
				false
			);
			xml_parse($parser, $data);
			xml_parser_free($parser);
		}

		if ($this->position === null)
			throw new Exception('BLACK OVERLORD HAS COME!!!');
			
		return $this->position;
	}
	
	/**
	 * @return MarineTrafficParser
	 */
	public function dropPosition() {
		$this->position = null;
		return $this;
	}
	
}