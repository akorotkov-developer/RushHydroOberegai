<?php
function __autoload($className) {
	require_once dirname(__FILE__).'/classes/'.$className.'.class.php';
}

define('MT_ID', 273397100);
define('GMAPS_ID', '209472384266229988770.0004a5214ee2bac825031');

define('FILE_JSON', dirname(__FILE__).'/data/coords.json');
define('FILE_FULL_JSON', dirname(__FILE__).'/data/coords_full.json');
define('FILE_ROUTE_JSON', dirname(__FILE__).'/data/coords_route.json');
define('COUNT_SUBSTEP', 30);
define('POS_PRESC', 5);

$startPosition = array(59.92, 30.25);
$endPosition = array(56.01, 92.92);