<?php
/* error reporting object for php >= 5.3 */



// emulate REQUEST_TIME_FLOAT for php < 5.4
if (!isset($_SERVER['REQUEST_TIME_FLOAT'])) {
	$_SERVER['REQUEST_TIME_FLOAT'] = microtime(true);
}



final class ero {
	protected static $instance 	= null;
	
	protected $requestId		= null;
	
	protected $running 			= false;

	protected $limitsEnabled 	= false;
	protected $memoryLimit 		= null;
	protected $timeLimit 		= null;
	
	protected $xhprofEnabled	= false;
	protected $xhprofData		= array();

	protected $errorReporting 	= null;
	
	protected $logs				= array();
	
	/**
	 * @return ero
	 */
	public static function me() {
		if (self::$instance === null) {
			self::$instance = new self;
		}
		
		return self::$instance;
	}
	
	protected function __construct() {
	}

	/**
	 * Convert php.ini values to ints.
	 * See http://ca3.php.net/ini_get for details.
	 * @param string $val
	 * @return int
	 */
	protected function getBytes($val) {
	    $val = trim($val);
		$last = strtolower($val[strlen($val)-1]);
		switch($last) {
			case 'g':
				$val *= 1024;
			case 'm':
				$val *= 1024;
			case 'k':
				$val *= 1024;
		}

		return $val;
	}

	/**
	 * Check if given error is fatal (which means the script has been halted).
	 * @param int $type
	 * @return bool
	 */
	protected function isFatal($type) {
		return in_array($type, array(
			E_ERROR,
			E_USER_ERROR,
			E_CORE_ERROR,
			E_COMPILE_ERROR,
			E_PARSE,
		));
	}

	/**
	 * Get execution time.
	 * @return float
	 */
	protected function getExecutionTime() {
		return microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
	}

	/**
	 * Get peak memory usage.
	 * @return int
	 */
	protected function getPeakMemoryUsage() {
		return memory_get_peak_usage();
	}

	/**
	 * Convert assoc aray to string in format "key1: val1; key2: val2; ...".
	 * @param array $data
	 * @return string
	 */
	protected function stringifyData($data) {
		foreach ($data as $k => $v) {
			$data[$k] = $k.': '.$v;
		}

		return implode('; ', $data);
	}

	/**
	 * Log message.
	 * @param string $type
	 * @param array $data
	 * @return ero
	 */
	protected function log($type, $data) {
		$this->logs[] = compact('type', 'data');
		
		return $this;
	}
	
	/**
	 * Handle errors: put extended info in error log if logging for
	 * such errors is enabled.
	 * @param int $type
	 * @param string $msg
	 * @param string $file
	 * @param string $line
	 */
	public function handleError($type, $msg, $file, $line) {
		// don't log error types which is not allowed in error_reporting
		if ($type && !($this->errorReporting & $type)) return;

		$this->log('err', compact('msg', 'file', 'line'));
	}
	
	/**
	 * @return ero
	 */
	public function withLimits() {
		if ($this->running) return $this;
		
		$this->limitsEnabled = true;
		return $this;
	}

	/**
	 * @param int $limit
	 * @return ero
	 */
	public function setMemoryLimit($limit) {
		if ($this->running) return $this;
		
		$this->memoryLimit = $limit;
		return $this;
	}

	/**
	 * @param float $limit
	 * @return error
	 */
	public function setTimeLimit($limit) {
		if ($this->running) return $this;
		
		$this->timeLimit = $limit;
		return $this;
	}

	/**
	 * Check if script is getting close to memory or time limits.
	 */
	public function checkLimits() {
		$limits = array();

		if ($this->memoryLimit && ($this->getPeakMemoryUsage() > $this->memoryLimit)) {
			$limits[] = 'memory';
		}

		if ($this->timeLimit && ($this->getExecutionTime() > $this->timeLimit)) {
			$limits[] = 'time';
		}

		if (!$limits) return $this;

		$limits = implode(',', $limits);
		$this->log('lim', compact('limits'));
	}
	
	/**
	 * @return ero
	 */
	public function withProfiling() {
		if ($this->running || !extension_loaded('xhprof')) return $this;
		
		$this->xhprofEnabled = true;
		return $this;
	}
	
	protected function startXhprof() {
		if (!$this->xhprofEnabled) return;
		
		xhprof_enable(XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
		$this->xhprofData = array(
			'xhprof_run' 	=> uniqid(),
			'xhprof_source'	=> 'ero',
		);
	}
	
	public function stopXhprof() {
		if (!$this->xhprofEnabled) return;
		
		if ($this->logs) {
			file_put_contents(
				(ini_get('xhprof.output_dir') ?: sys_get_temp_dir()).DIRECTORY_SEPARATOR.implode('.', $this->xhprofData),
				serialize(xhprof_disable())
			);
		}
		else {
			xhprof_disable();
		}
	}
	
	protected function appendRequestData() {
		if (!$this->logs) return;
		
		$time = $this->getExecutionTime();
		$peak = $this->getPeakMemoryUsage();
		
		if (isset($_SERVER['REQUEST_METHOD'])) {
			$type	= 'serv';
			$ip 	= $_SERVER['REMOTE_ADDR'];
			$req 	= $_SERVER['REQUEST_METHOD'];
			$url 	= 'http'.($_SERVER['HTTPS'] ? 's' : '').'://'
			.$_SERVER['HTTP_HOST']
			.$_SERVER['REQUEST_URI'];
		}
		else {
			$type	= 'cli';
			$ip 	= '?';
			$req 	= '?';
			$url	= '?';
		}
		
		$data = compact(
				'type',
		
				'time',
				'peak',
		
				'ip',
				'req',
				'url'
		);
		
		if ($this->xhprofData) {
			$data = array_merge($data, $this->xhprofData);
		}
		
		$this->log('req', $data);
	}
	
	public function pushLogs() {
		$this->appendRequestData();
		foreach ($this->logs as $log) {
			error_log('['.$this->requestId.'][ero:'.$log['type'].'] '.$this->stringifyData($log['data']));
		}
	}
	
	/**
	 * @return ero
	 */
	public function run() {
		if ($this->running) return $this;
		$this->running = true;
		
		$o = $this;
		
		$this->requestId = uniqid();
		
		// hide fatal errors output
		ini_set('display_errors', false);
		
		// memorize error reporting value and turn it off
		// to aviod duplicates in error log
		$this->errorReporting = error_reporting(0);
		
		// catch non-fatal errors
		set_error_handler(function($type, $message, $file, $line) use ($o) {
			$o->handleError(
				$type,
				$message,
				$file,
				$line
			);
		});
		
		// catch fatal errors
		register_shutdown_function(function() use ($o) {
			if (!($error = error_get_last())) return;
		
			$o->handleError(
				$error['type'],
				$error['message'],
				$error['file'],
				$error['line']
			);
		});
		
		// catch exceptions
		set_exception_handler(function($exception) use ($o) {
			$o->handleError(
				0,
				get_class($exception).': '.$exception->getMessage(),
				$exception->getFile(),
				$exception->getLine()
			);
		});
		
		// check limits
		if ($this->limitsEnabled) {
			$this->memoryLimit 	= $this->memoryLimit ?: floor($this->getBytes(ini_get('memory_limit')) * 0.7);
			$this->timeLimit 	= $this->timeLimit ?: floor($this->getBytes(ini_get('max_execution_time')) * 0.7);
			
			register_shutdown_function(array($this, 'checkLimits'));
		}
		
		// profiling
		if ($this->xhprofEnabled) {
			$this->startXhprof();
			register_shutdown_function(array($this, 'stopXhprof'));
		}
		
		// and finally save request data to log
		register_shutdown_function(array($this, 'pushLogs'));
		
		return $this;
	}

}