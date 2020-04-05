<?php
require_once dirname(__FILE__).'/../config.php';

$position = 
	MarineTrafficParser::create(MT_ID)->
		getPosition();

$storageFull = 
	PositionStorageFactory::get(FILE_JSON);
		
$storageFull->
	append($position)->
	save();