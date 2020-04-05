<?
set_time_limit(0);

global $dirPath;
global $startTime;
clearstatcache();
$startTime = time();
$dirPath = $_SERVER['DOCUMENT_ROOT'];
$folders['upload'] = '/upload';
//$folders['mblock'] = '/upload/iblock';
//$folders['medialibrary'] = '/upload/medialibrary';

function scandirectory($path, $result = ''){
	global $dirPath;
	global $startTime;
	$defaulFolder = scandir($dirPath.$path);	

	/*if(time() - $startTime > 1){
		return $result;
		exit;
	}*/
	
	foreach($defaulFolder AS $val){
		if($val == '.' || $val == '..') continue;
		
		if(!is_file($dirPath.$path.'/'.$val)){			
		$result = scandirectory($path.'/'.$val, $result);
		}else{

			$file = explode('.',$val);
			$fileExtension = array_pop($file);
			clearstatcache(true, $dirPath.$path.'/'.$val);
			$filesize = filesize($dirPath.$path.'/'.$val);
			$mime_type = mime_content_type($dirPath.$path.'/'.$val);

			$result[$mime_type]['filesize'] += $filesize;
			$result[$mime_type]['fileExtension'] = $fileExtension;
			$result[$mime_type]['count'] += 1;
		}

	}
	return $result;
}

foreach($folders AS $val){
	$res = scandirectory($val);
	$text .= "В директории ". strtoupper($val) ."<br /><br />";
	foreach($res AS $key=>$val){
		$text .= "Файлов ". $val['fileExtension'] .": ". $val['count']. " шт, общим размером: ".round($val['filesize']/1024/1024, 2) ." Мб\n\r<br />";	
		$totalSize += $val['filesize'];
		$totalCount += $val['count'];
	}
	$text .= "Суммарный объем: ". round($totalSize/1024/1024, 2) ." Mб; <br /> Общее количество: ".$totalCount ."<br /><br /><br />";
	$totalSize = '';
	$totalCount = '';
	echo $text;

}
die();


?>