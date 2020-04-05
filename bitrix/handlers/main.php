<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$cacheKey = 'main____+'.RhdHandler::getSiteCode();
if (!($mainCached = RhdMemcache::get($cacheKey))) {
	$newsSection = end(RhdPath::resolvePath(RhdHandler::getSite(), 'press/news'));

	$globalNewsRs = CIBlocKElement::GetList(array('SORT' => 'desc', 'DATE_ACTIVE_FROM' => 'desc'), array('SECTION_ID' => $newsSection['ID'], 'ACTIVE' => 'Y'), false, array("nTopCount"=>9));
	$globalNews = array();
	while ($news = $globalNewsRs->GetNext()) {
		$globalNews[] = 
			array_merge(
				array(
					'URL' => grabLinkFromTitle($news['NAME']) ?: RhdPath::createUrl(RhdHandler::getSite(), 'press/news', $news['ID'])
				),
				$news
			);
	}
	unset($globalNewsRs);
	
	$filialNewsRs = 
		CIBlocKElement::GetList(
			array('DATE_ACTIVE_FROM' => 'desc'), 
			array(
				'ACTIVE' => 'Y',
				array(
					'LOGIC' => 'OR',
					'SECTION_ID' => RhdHandler::getFilialNewsSectionId(),
					'=PROPERTY_SHOW_IN_MAIN_NEWS_VALUE' => '1',
				)
			), 
			false,
			array('nTopCount' => 6)
		);
	$filialNews = array();
	while ($news = $filialNewsRs->GetNext()) {
		//$iblock = CIBlock::GetByID($news['IBLOCK_ID'])->GetNext();
		$filialNews[] = 
			array_merge(
				array(
					'URL' => grabLinkFromTitle($news['NAME']) ?: RhdPath::createUrl(RhdHandler::getSiteCode(), 'press/holding-news/', $news['ID'])
				),
				$news
			);
	}
	unset($filialNewsRs);
	
	$important = CIBlock::GetList(array(), array('TYPE' => 'content', 'CODE' => 'important', 'ACTIVE' => 'Y'))->GetNext();
	
	$importantText = 
		$important
			? $important['DESCRIPTION']
			: null;
			
	$siteNewsIBlock = CIBlock::GetList(array(), array('TYPE' => 'content', 'CODE' => 'sitenews'))->GetNext();
	
	$siteNewsRs = CIBlockElement::GetList(array('created' => 'desc'), array('ACTIVE' => 'Y', 'PROPERTY_SITE' => RhdHandler::getSiteCode()), false, array('nTopCount' => 5), array('IBLOCK_ID', 'PROPERTY_icon', 'PROPERTY_icontext', 'PROPERTY_link', 'PROPERTY_linktext'));
	$siteNews = array();
	while ($news = $siteNewsRs->GetNext()) {
		$siteNews[] = $news;
	}
	
	RhdMemcache::set($cacheKey, compact('globalNews', 'filialNews', 'importantText', 'siteNews'));
}
else {
	extract($mainCached);
}

$GLOBALS['importantText'] = $importantText;
$GLOBALS['siteNews'] = $siteNews;

$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('main.global.php'),
	compact('globalNews', 'filialNews', 'importantText', 'siteNews'),
	Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
