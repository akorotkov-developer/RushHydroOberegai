<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$cacheKey = '__main____'.RhdHandler::getSiteCode();
if (!($mainCached = RhdMemcache::get($cacheKey))) {
    
    $newsSite = RhdHandler::getSite();
    
    $newsSectionPath = in_array(RhdHandler::getSiteCode(), array('social-sayany')) ? 'news' : 'press/news';
    $newsSection = end(RhdPath::resolvePath($newsSite, $newsSectionPath));
    $newsSiteCode = RhdHandler::getSiteCode();//$newsSite['CODE'];
    $localNewsFilter = array('SECTION_ID' => $newsSection['ID'], 'ACTIVE' => 'Y');

    $localNewsRs = 
        CIBlocKElement::GetList(
            array('DATE_ACTIVE_FROM' => 'desc'), 
            $localNewsFilter, 
            false, 
            array('nTopCount' => 8)
        );
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
            
    
    RhdMemcache::set($cacheKey, compact('localNews', 'newsSiteCode'));
}
else {
    extract($mainCached);
}

$APPLICATION->IncludeFile(
    $APPLICATION->GetTemplatePath('main_international.php'),
    compact('localNews', 'newsSiteCode'),
    Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
