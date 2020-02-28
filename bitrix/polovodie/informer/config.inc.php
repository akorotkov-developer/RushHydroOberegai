<?php
define('DB_HOST', 			'localhost');
define('DB_NAME', 			'hydrology');
define('DB_USER', 			'hydrology_user');
define('DB_PASSWORD', 		'h12345');
define('BASE_PATH',			dirname(__FILE__).'/');
require_once BASE_PATH.'lib/idiorm.php';
require_once BASE_PATH.'lib/paris.php';
require_once BASE_PATH.'mvc/models/Station.class.php';
require_once BASE_PATH.'mvc/models/Data.class.php';

ORM::configure('connection_string', 	'mysql:dbname='.DB_NAME.';host='.DB_HOST);
ORM::configure('username', 				DB_USER);
ORM::configure('password', 				DB_PASSWORD);
ORM::configure('driver_options',		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',));
ORM::configure('logging', true);
