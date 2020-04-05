<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

header('Content-Type: text/javascript; charset=UTF-8');

$ids = explode(',', $_REQUEST['ids']);

$rsItems = CIBlockElement::GetList(
	array(), 
	array('ID' => $ids),
	false,
	false,
	array(
		'*',
		'PROPERTY_GALLERY',
	)
);
$data = array();

while ($item = $rsItems->GetNext()) {
	$props = getElementProps($item['IBLOCK_ID'], $item['ID']);
	$data[$item['ID']] = createMobileGallery($props);

	$itemAppend = array(
		'created' => $item['DATE_CREATE'],
		'name' => $item['NAME'],
	);

	foreach ($data[$item['ID']] as $k => $v) {
		$data[$item['ID']][$k] = array_merge($v, $itemAppend);
	}
}

outputJson($data, $_GET['callback']);