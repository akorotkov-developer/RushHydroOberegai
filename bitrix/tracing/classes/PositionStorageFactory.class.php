<?php
class PositionStorageFactory {

	/**
	 * 
	 * @param string $file
	 * @param string $type
	 * @return IPositionStorage
	 */
	public static function get($file, $type = 'json') {
		$storage = null;
		switch ($type) {
			case 'json':
				$storage = 'PositionStorageJson';
				break;
				
			default:
				throw new Exception('unsupported storage "'.$type.'"');
		}
		
		return new $storage($file);
	}

}