<?php
class RhdMemcache {
	
	/**
	 * @var Memcache
	 */
	protected static $mc = null;
	
	protected static function connect() {
		if (self::$mc !== null) {
			return;
		}
			
		self::$mc = new Memcache;
		self::$mc->pconnect(BX_MEMCACHE_HOST, 11211);
	}

	public static function get($key) {
		//return false;
		self::connect();

		global $USER;

		if ($USER && $USER->IsAuthorized() && !empty($_GET['clear_cache']) && $_GET['clear_cache'] === 'Y') {
			return null;
		}

		$val = self::$mc->get($key, MEMCACHE_COMPRESSED);
		if ($val) {
			$val = igbinary_unserialize($val);
		}
		
		return $val;
	}
	
	public static function set($key, $val, $expire = 600) {
		self::connect();
		$val = igbinary_serialize($val);
		self::$mc->set($key, $val, MEMCACHE_COMPRESSED, $expire);
	}

}
