<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

CModule::IncludeModule('search');

$search = new CSearch;
$search->Search(array(
	'QUERY' => $_REQUEST['q'], 
	'MODULE_ID' => 'iblock', 
	'PARAM1' => 'site', 
	'PARAM2' => RhdHandler::getMainSiteId()
), array(
	'TITLE_RANK' => 'DESC',
	'RANK' => 'DESC',
));

$data = array();
$limit = !empty($_REQUEST['limit']) && is_numeric($_REQUEST['limit']) ? intval($_REQUEST['limit']) : 100;
$limit = $limit <= 0 || $limit > 1000 ? 100 : $limit;

while ($item = $search->GetNext()) {
	$url = null;
	if (strpos($item['ITEM_ID'], 'S') !== false) {
		$url = RhdPath::createUrl($site, RhdPath::build(substr($ar['ITEM_ID'], 1)));
	}
	else {
		$elem = CIBlockElement::GetByID($item['ITEM_ID'])->GetNext();
		$url = RhdPath::createRelativeUrl(RhdPath::build($elem['IBLOCK_SECTION_ID']), $elem);
	}
	$data[] = array(
		'name' => $item['TITLE'],
		'url'  => $url,
	);

	if (count($data) >= $limit) break;
}

unset($search);


header('Content-Type: text/javascript; charset=UTF-8');
outputJson($data, $_GET['callback']);