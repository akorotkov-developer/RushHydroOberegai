<?php
function getPostVar($name) {
	if (empty($_POST[$name]))
		throw new Exception('empty data');
		
	$value = $_POST[$name];
	$value = preg_replace('/[^\d\.,]+/', '', $value);
	$value = str_replace(',', '.', $value);
	
	if (!is_numeric($value))
		throw new Exception('bad data');
		
	return floatval($value);
}

require_once '../config.php';

$returnObject = array(
	'hasErrors' => false,
	'error' => '',
);

try {
	$position = array(getPostVar('lat'), getPostVar('lng'));
	
	$storageFull = 
		PositionStorageFactory::get(FILE_JSON);
		
	$storageFull->
		append($position)->
		save();
}
catch (Exception $e) {
	$returnObject['hasErrors'] = true;
	$returnObject['error'] = $e->getMessage();
}

echo json_encode($returnObject);