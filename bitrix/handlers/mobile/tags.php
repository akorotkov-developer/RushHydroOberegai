<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

CModule::IncludeModule('search');

$data = array();
if (empty($_REQUEST['tag'])) {
	$tags = new CSearchTags;

	$limit = !empty($_REQUEST['limit']) && is_numeric($_REQUEST['limit']) ? intval($_REQUEST['limit']) : 20;
	$limit = $limit < 0 || $limit > 1000 ? 20 : $limit;

	$rsTags = 
		$tags->GetList(
			array('NAME', 'CNT'),
			array(
				'MODULE_ID' => 'iblock', 
				'SITE_ID' => SITE_ID,
				'PARAM1' => 'site', 
				'PARAM2' => RhdHandler::getMainSiteId(),
			), 
			array(
				'CNT' => 'DESC',
			),
			$limit
		);

	while ($item = $rsTags->GetNext()) {
		$data[] = array(
			'tag' => $item['NAME'],
			'weight' => intval($item['CNT']),
		);
	}
	unset($rsTags);
}
else {
	$search = new CSearch;
	$search->Search(array(
		'TAGS' => $_REQUEST['tag'], 
		'MODULE_ID' => 'iblock', 
		'PARAM1' => 'site', 
		'PARAM2' => RhdHandler::getMainSiteId()
	), array(
		'TITLE_RANK' => 'DESC',
		'RANK' => 'DESC',
	));

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
}



header('Content-Type: text/javascript; charset=UTF-8');
outputJson($data, $_GET['callback']);