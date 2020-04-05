<?php

define('BITRIX_UPLOAD_PATH', '/upload/');

$pathFound = false;
$paths = array(
	$_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'bitrix',
	dirname(__FILE__).DIRECTORY_SEPARATOR.'bitrix',
);
foreach ($paths as $path) {
	if (!file_exists($path)) continue;

	$pathFound = true;
	break;
}
if (!$pathFound) die('Bitrix folder not found. Put this script into bitrix root.');

$prolog = $path.DIRECTORY_SEPARATOR.'modules/main/include/prolog_before.php';
if (!file_exists($prolog)) die('Prolog is missing.');
require $prolog;



if (!empty($_GET['path'])) {
	$path = parse_url($_GET['path'], PHP_URL_PATH);
	if (strpos($path, BITRIX_UPLOAD_PATH) !== 0) die('Not a bitrix upload path.');
	$path = substr($path, strlen(BITRIX_UPLOAD_PATH));

	$parts = pathinfo($path);
	$rsFile = $DB->Query('SELECT * FROM b_file WHERE SUBDIR = \''.$DB->ForSql($parts['dirname']).'\' AND FILE_NAME = \''.$DB->ForSql($parts['basename']).'\'');
	if (!$rsFile || !($file = $rsFile->GetNext())) die('No file found in DB.');
	unset($rsFile);

	echo "<b>{$file['ORIGINAL_NAME']}</b> ({$file['ID']}) was uploaded at <b>{$file['TIMESTAMP_X']}</b> by <b>{$file['MODULE_ID']}</b> module.<br/>";
	if ($file['ORIGINAL_NAME'] !== $file['FILE_NAME']) {
		echo 'Renamed to <b>'.$file['FILE_NAME'].'</b>.<br/>';
	}

	switch ($file['MODULE_ID']) {
		case 'iblock':
			$sectionIds = array();
			$elementIds = array();

			$filePropIds = array();
			$rsProps = $DB->Query('SELECT ID FROM b_iblock_property WHERE PROPERTY_TYPE = \'F\'');
			while ($prop = $rsProps->GetNext()) {
				$filePropIds[] = intval($prop['ID']);
			}
			unset($rsProps);

			if ($filePropIds) {
				$rsPropValues = $DB->Query('SELECT DISTINCT(IBLOCK_ELEMENT_ID) FROM b_iblock_element_property WHERE IBLOCK_PROPERTY_ID IN ('.implode(',', $filePropIds).') AND VALUE = '.$DB->ForSql($file['ID']));
				while ($value = $rsPropValues->GetNext()) {
					$elementIds[] = intval($value['IBLOCK_ELEMENT_ID']);
				}
				unset($rsPropValues);
			}
			
			echo 'Elements: ';
			$elCnt = 0;
			$rsEls = $DB->Query('SELECT ID, CODE, NAME FROM b_iblock_element WHERE ID IN ('.implode(',', $elementIds ?: array(-1)).') OR PREVIEW_PICTURE = '.$DB->ForSql($file['ID']).' OR DETAIL_PICTURE = '.$DB->ForSql($file['ID']).' OR SEARCHABLE_CONTENT LIKE \'%'.$DB->ForSql($file['SUBDIR'].'/'.$file['FILE_NAME']).'%\'');
			while ($el = $rsEls->GetNext()) {
				$elCnt++;
				echo "<b>{$el['NAME']}</b> ({$el['CODE']}, {$el['ID']}) ";
			} 
			unset($rsEls);
			if (!$elCnt) echo '<i>none</i>';
			echo '<br/>';

			echo 'Sections: ';
			$sectionCnt = 0;
			$rsSections = $DB->Query('SELECT ID, CODE, NAME FROM b_iblock_section WHERE SEARCHABLE_CONTENT LIKE \'%'.$DB->ForSql($file['SUBDIR'].'/'.$file['FILE_NAME']).'%\'');
			while ($section = $rsSections->GetNext()) {
				$sectionCnt++;
				echo "<b>{$section['NAME']}</b> ({$section['CODE']}, {$section['ID']}) ";
			} 
			unset($rsSections);
			if (!$sectionCnt) echo '<i>none</i>';
			echo '<br/>';

			break;

		default:
			echo "No specific information for this module.";
			break;
	}
}