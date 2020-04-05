<?php 
	require_once dirname(__FILE__).'/config.inc.php';
	define('JSON_FILE', dirname(__FILE__).'/data.json');
	$values = json_decode(file_get_contents(JSON_FILE), true);
	//var_dump($values);
	$i=0;
	foreach($values as $date => $content){
		foreach($content as $station=>$params){
			Data::saveData($date,$station,$params,true); //Раскомментируй для экспорта
			$i++;
		}
	}
	echo '<h1>'.'Было удачно импортировано '.$i.' записей';