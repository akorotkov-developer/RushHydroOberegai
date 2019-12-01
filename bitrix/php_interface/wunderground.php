<?php

class Wunderground {

	protected $key = null;
	protected $cache = null;

	public function __construct($key) {
		$this->key = $key;
		if (class_exists('Memcache')) {
			$this->cache = new Memcache;
			$this->cache->connect('127.0.0.1');
		}
	}

	protected function cacheGet($key) {
		if (!$this->cache) return;
		if ($value = $this->cache->get($key, MEMCACHE_COMPRESSED)) $value = json_decode($value, true);
		return $value;
	}

	protected function cacheSet($key, $value, $expires) {
		if (!$this->cache) return;
		$this->cache->set($key, is_string($value) ? $value : json_encode($value), MEMCACHE_COMPRESSED, $expires);
	}

	protected function call($url, $expires) {
		$key = 'w_'.$url.'_'.date('d.m.Y_H');
		if (!($value = $this->cacheGet($key))) {
			$value = file_get_contents('http://api.wunderground.com/api/'.$this->key.'/'.$url.'.json');
			$this->cacheSet($key, $value, $exipres);
			$value = json_decode($value, true);
		}

		return $value;
	}

	public function conditions($location, $expires = 3600) {
		return $this->call('conditions/q/'.$location, $expires);
	}

	public function conditionsSimplified($location, $expires = 3600) {
		if (!($value = $this->conditions($location, $expires)) || !isset($value['current_observation'])) {
			return null;
		}

		return array(
			'temp' => $value['current_observation']['temp_c'],
			'weather' => $value['current_observation']['weather'],
		);
	}

}
