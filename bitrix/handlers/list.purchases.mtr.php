<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$site = RhdHandler::getSite();
$lastSection = RhdHandler::getLastSection();

?><h1 class="header_doc"><?=$lastSection['NAME']?></h1>
<div class="clear"></div><?php

$APPLICATION->IncludeComponent(
	"rushydro:catalog.section.list", 
	"list_razdel", 
	array(
		"IBLOCK_ID" => (RhdHandler::isPurchases() ? RhdHandler::getPurchasesIBlockId() : $site['ID']),
		"SECTION_ID" => $lastSection ? $lastSection['ID'] : null,
		'TOP_DEPTH' => 1,
	)
);

echo parseText($lastSection['DESCRIPTION']); 

$cacheKey = 'section_'.$lastSection['ID'].'_'.$_GET['archive'].'_'.$_GET['cat1'].'_'.$_GET['cat2'];

if (!($cached = RhdMemcache::get($cacheKey))) {
	$cat1List = extractPropValues(RhdHandler::getPurchasesIBlockId(), 'PURCHASE_CATEGORY_MTR_1');
	$cat2List = extractPropValues(RhdHandler::getPurchasesIBlockId(), 'PURCHASE_CATEGORY_MTR_2');

	$isArchive = !empty($_GET['archive']);
	//$cat1 = !empty($_GET['cat1']) && isset($cat1List[$_GET['cat1']]) ? $_GET['cat1'] : null;
	//$cat2 = !empty($_GET['cat2']) && isset($cat2List[$_GET['cat2']]) ? $_GET['cat2'] : null;
	
	$filter = array('SECTION_ID' => $lastSection['ID']);
	if ($isArchive) {
		$filter['=PROPERTY_IS_ARCHIVE_VALUE'] = '1'; 
	}
	else {
		$filter['=PROPERTY_IS_ARCHIVE_VALUE'] = false; 
	}
	
	if ($cat1) $filter['=PROPERTY_PURCHASE_CATEGORY_MTR_1_VALUE'] = $cat1List[$cat1];
	if ($cat2) $filter['=PROPERTY_PURCHASE_CATEGORY_MTR_2_VALUE'] = $cat2List[$cat2];

	$itemsRs = 
		CIBlockElement::GetList(
	  		array('created' => 'desc'), 
	  		array_merge(
				$filter,
				array('ACTIVE' => 'Y')
			),
		 	false,
		 	false,
			array(
				'*',
				'PROPERTY_PURCHASE_CATEGORY_MTR_1',
				'PROPERTY_PURCHASE_CATEGORY_MTR_2',
				'PROPERTY_MTR_TITLE_FILE',
				'PROPERTY_MTR_ITOGI_FILE',
				'PROPERTY_MTR_COMMENTS_FILE',
				'PROPERTY_IS_ARCHIVE',
				'PROPERTY_SHOW_DATE',
			)
	  	);
	  	
	$items = array();
	while ($item = $itemsRs->GetNext()) {
		$items[$item['ID']] = $item;
	}
	
  RhdMemcache::set($cacheKey, compact('items', 'cat1', 'cat1List', 'cat2', 'cat2List', 'isArchive'));
}
else {
  extract($cached);
}

$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('list.purchases.mtr.php'),
	compact('items', 'cat1', 'cat1List', 'cat2', 'cat2List', 'isArchive'),
	Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");