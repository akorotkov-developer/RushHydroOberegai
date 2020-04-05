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

$cacheKey = 'section_'.$lastSection['ID'].'_'.$_GET['PAGEN_1'].'_'.$_GET['cat1'].'_'.$_GET['cat2'];

if (!($cached = RhdMemcache::get($cacheKey))) {
	
	if (!in_array($lastSection['CODE'], array('info', 'archive'))) {
		$filter = array('SECTION_ID' => $lastSection['ID']);
	}
	else {
		if ($lastSection['CODE'] === 'info') {
			$filter = array('SECTION_ID' => $lastSection['ID'], '>DATE_ACTIVE_TO' => date('d.m.Y H:i:s'));
		}
		else {
			$section = CIBlockSection::GetList(array(), array('CODE' => 'info', 'IBLOCK_ID' => RhdHandler::getPurchasesIBlockId()))->GetNext();
			$filter = array('SECTION_ID' => $section['ID'], '<DATE_ACTIVE_TO' => date('d.m.Y H:i:s'));
		}
	}

	$cat1List = extractPropValues(RhdHandler::getPurchasesIBlockId(), 'PURCHASE_CATEGORY_1');
	$cat2List = extractPropValues(RhdHandler::getPurchasesIBlockId(), 'PURCHASE_CATEGORY_2');

	$cat1IdList = extractPropIds(RhdHandler::getPurchasesIBlockId(), 'PURCHASE_CATEGORY_1');
	
	$cat1 = !empty($_GET['cat1']) && isset($cat1List[$_GET['cat1']]) ? $_GET['cat1'] : null;
	$cat2 = !empty($_GET['cat2']) && isset($cat2List[$_GET['cat2']]) ? $_GET['cat2'] : null;

	if ($cat1) $filter['PROPERTY_PURCHASE_CATEGORY_1_VALUE'] = html_entity_decode($cat1List[$cat1]);
	if ($cat2) $filter['PROPERTY_PURCHASE_CATEGORY_2_VALUE'] = html_entity_decode($cat2List[$cat2]);

	// упрощаем выборку: если определены фильтры, фильтр по ID секции нам уже не нужен
	if ($cat1 || $cat2) unset($filter['SECTION_ID']);

	asort($cat1List);
	asort($cat2List);

  $itemsRs = 
  	CIBlockElement::GetList(
  		array('DATE_ACTIVE_FROM' => 'desc'), 
		array_merge(
			$filter,
			array('ACTIVE' => 'Y')
		),
	 	false,
		array(
			'bShowAll' => false,
		  	'nPageSize' => 25,
		  	//'iNumPage' => 1,
		),
		array(
			'ID',
			'NAME',
			'DATE_ACTIVE_FROM',
			'PREVIEW_TEXT',
			'PROPERTY_PURCHASE_CATEGORY_1',
			'PROPERTY_PURCHASE_CATEGORY_2',
			'PROPERTY_SHOW_DATE',
			/*'PROPERTY_PURCHASE_CATEGORY_MTR_1',
			'PROPERTY_PURCHASE_CATEGORY_MTR_2',
			'PROPERTY_MTR_TITLE_FILE_VALUE',
			'PROPERTY_MTR_ITOGI_FILE',
			'PROPERTY_MTR_COMMENTS_FILE',*/
		)
  	);

  $items = array();
  while ($item = $itemsRs->GetNext()) {
		$items[] =
		  array_merge(
			  $item, 
			  array(
				  'URL' => RhdPath::createUrl($site, RhdHandler::getJustPath(), $item['ID'])
			  )
		  );
  }
  
  ob_start();
  $APPLICATION->IncludeComponent(
	"bitrix:system.pagenavigation", 
	"", 
	array(
		"NAV_RESULT" => $itemsRs,
	)
  );
  $pagination = ob_get_clean();

  RhdMemcache::set($cacheKey, compact('items', 'pagination', 'cat1', 'cat1List', 'cat2', 'cat2List'));
}
else {
  extract($cached);
}

$tpl = 'list.purchases.php';
$hideFilter = false;
if (RhdHandler::isPurchases()) {
	switch (RhdHandler::getLastSectionCode()) {
		case 'results':
		case 'announce':
			$hideFilter = true;
			break;

		case 'management':
			$tpl = 'list.items.php';
			break;
	}
}

if (RhdHandler::getLastSectionCode() !== 'purchases') {
$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath($tpl),
	compact('items', 'pagination', 'cat1', 'cat1List', 'cat2', 'cat2List', 'hideFilter'),
	Array("MODE"=>"html")
);
}
else { ?>
<P><B>К сведению поставщиков и подрядчиков!</B> </P>
<P style="TEXT-ALIGN: justify" mce_style="TEXT-ALIGN: justify">Советами директоров ДЗО и ВЗО ОАО «РусГидро» принято решение об одобрении использования для проведения закупок в качестве виртуальной электронной торговой площадки информационно-аналитической и торгово-операционной системы «Рынок продукции, услуг и технологий для электроэнергетики» (b2b-energo). Не менее 60% всех конкурентных закупок для нужд ДЗО и ВЗО ОАО «РусГидро» проводится на электронной площадке (адрес в международной компьютерной сети Интернет <A href="http://www.b2b-energo.ru/" mce_href="http://www.b2b-energo.ru">www.b2b-energo.ru</A>). По вопросам подключения и работы просим обращаться в единую справочную службу площадки - тел. (495) 970-18-66. <BR><BR></P>
<?php }

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");