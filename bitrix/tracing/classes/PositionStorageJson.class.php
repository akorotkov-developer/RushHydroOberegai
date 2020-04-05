<?php
class PositionStorageJson extends PositionStorageBase {

	protected function loadData() {
		$this->data = 
			file_exists($this->file)
				? json_decode(file_get_contents($this->file), true)
				: array();
				
		return $this;
	}
	
	protected function saveData() {
		if (!file_put_contents($this->file, json_encode($this->data)))
			throw new Exception('saving to '.$this->file.' failed');
		return $this;
	}

}