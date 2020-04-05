<?php
require_once '../config.php';

$returnObject = array(
	'hasErrors' => false,
	'error' => '',
);

try {
	$storageFull = 
		PositionStorageFactory::get(FILE_JSON);
		
	$storageFull->
		deleteLast()->
		save();
}
catch (Exception $e) {
	$returnObject['hasErrors'] = true;
	$returnObject['error'] = $e->getMessage();
}

echo json_encode($returnObject);