<?php
abstract class PositionStorageBase implements IPositionStorage {

	protected $file = null;
	protected $data = null;
	private $keys = array();
	private $changed = false;
	
	public function __construct($file) {
		$this->file = $file;
		$this->
			loadData()->
			checkData()->
			createKeys();
	}
	
	abstract protected function loadData();
	
	protected function createKeyForValue($value) {
		list($lat, $lng) = $value;
		$lat = round($lat, POS_PRESC);
		$lng = round($lng, POS_PRESC);
		return md5($lat.' '.$lng);
	}
	
	private function checkData() {
		if (!$this->data) {
			$this->data = array();
		}
			
		return $this;
	}
	
	private function createKeys() {
		$this->keys = array();
		foreach ($this->data as $value) {
			$this->keys[$this->createKeyForValue($value)] = true;
		}
		
		return $this;
	}
	
	private function hasValue($value) {
		return isset($this->keys[$this->createKeyForValue($value)]);
	}
	
	private function getCount() {
		return count($this->data);
	}
	
	public function append($value, $more = null) {
		$now = time();
		
		if (!$this->hasValue($value)) {
			if ($more) {
				$value[] = $more;
			}
			
			$this->data[] = $value;
			$this->changed = true;
			
			$this->
				createKeys();
		}
		return $this;
	}
	
	public function deleteLast() {
		$now = time();
		if ($this->getCount()) {
			$value = array_pop($this->data);
			
			$this->changed = true;
			
			$this->
				createKeys();
		}
		
		return $this;
	}
	
	public function getLastPosition() {
		if (!$this->getCount())
			return null;
			
		return $this->data[$this->getCount() - 1];
	}
	
	public function clear() {
		$now = time();
		if ($this->getCount()) {
			$this->data = array();
			
			$this->changed = true;
			
			$this->keys = array();
		}
		
		return $this;
	}
	
	abstract protected function saveData();
	
	public function save() {
		if ($this->changed) {
			$this->saveData();
		}
		return $this;
	}
	
	public function getData() {
		return $this->data;
	}

}