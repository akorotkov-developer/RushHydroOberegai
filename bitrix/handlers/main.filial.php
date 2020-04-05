<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$cacheKey = '__main____'.RhdHandler::getSiteCode();
if (!($mainCached = RhdMemcache::get($cacheKey))) {
	
	$newsSite = RhdHandler::getSite();
	$useGlobalNews = false;
	
	$newsSectionPath = in_array(RhdHandler::getSiteCode(), array('social-sayany')) ? 'news' : 'press/news';
	
	try {
		$newsSection = end(RhdPath::resolvePath($newsSite, $newsSectionPath));
	}
	catch (RhdNotFoundException $e) {
		$useGlobalNews = true;
		/*$newsSite = CIBlock::GetList(array(), array('CODE' => RhdHandler::getMainSiteCode()))->GetNext();
		$newsSectionPath = 'press/news';
		$newsSection = end(RhdPath::resolvePath($newsSite, $newsSectionPath));*/

		$newsSite = RhdHandler::getMainSite();
		$newsSectionPath = 'press/holding-news';
	}
	
	$newsSiteCode = RhdHandler::getSiteCode();//$newsSite['CODE'];

	if ($useGlobalNews) {
		$localNewsRs = 
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
				array('nTopCount' => 8)
			);
	}
	else {
		if (in_array(RhdHandler::getSiteCode(), array('pauzhet', 'vmgeopp'))) {
			$localNewsFilter = array(
				'ACTIVE' => 'Y',
				'SECTION_ID' => array($newsSection['ID'], 6408),
			);
		}
		else {
			$localNewsFilter = array('SECTION_ID' => $newsSection['ID'], 'ACTIVE' => 'Y');
		}

		$localNewsRs = CIBlocKElement::GetList(array('DATE_ACTIVE_FROM' => 'desc'), $localNewsFilter, false, array('nTopCount' => 8));
	}

	$localNews = array();
	while ($news = $localNewsRs->GetNext()) {
		$localNews[] = 
			array_merge(
				array(
					'URL' => grabLinkFromTitle($news['NAME']) ?: RhdPath::createUrl($newsSite, $newsSectionPath, $news['ID'])
				),
				$news
			);
	}
	unset($localNewsRs);
	
	$important = CIBlock::GetList(array(), array('TYPE' => 'content', 'CODE' => 'important', 'ACTIVE' => 'Y'))->GetNext();
	
	$importantText = 
		$important
			? $important['DESCRIPTION']
			: null;
			
	$siteNewsIBlock = CIBlock::GetList(array(), array('TYPE' => 'content', 'CODE' => 'sitenews'))->GetNext();
	
	$siteNewsRs = CIBlockElement::GetList(array('created' => 'desc'), array('PROPERTY_SITE' => RhdHandler::getSiteCode()), false, array('nTopCount' => 5), array('IBLOCK_ID', 'PROPERTY_icon', 'PROPERTY_icontext', 'PROPERTY_link', 'PROPERTY_linktext'));
	$siteNews = array();
	while ($news = $siteNewsRs->GetNext()) {
		$siteNews[] = $news;
	}
	
	RhdMemcache::set($cacheKey, compact('localNews', 'importantText', 'siteNews', 'newsSiteCode', 'useGlobalNews'));
}
else {
	extract($mainCached);
}

$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('main.filial.php'),
	compact('localNews', 'importantText', 'siteNews', 'newsSiteCode', 'useGlobalNews'),
	Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
