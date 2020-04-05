<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$site = RhdHandler::getSite();

$APPLICATION->SetTitle(RhdHandler::isEnglish() ? 'Site map' : 'Карта сайта');

$cacheKey = 'sitemap_'.RhdHandler::getSiteCode();
if (!($cached = RhdMemcache::get($cacheKey))) {
	$rs = 
		CIBlockSection::getList(
			array('SORT' => 'desc', 'created' => 'asc'),
			array('IBLOCK_ID' => RhdHandler::getIBlockId(), '=UF_PUBLISHED' => true),
            array('TIMESTAMP_X', 'DATE_CREATE')
		);
		
	$sections = array();
	$byParent = array();
	
    function applytimeRecursive(&$sections, $parent, $time) {
        if (isset($sections[$parent]) && $time > strtotime($sections[$parent]['TIMESTAMP_X'])) {
            $sections[$parent]['TIMESTAMP_X'] = date('d.m.Y H:i:s', $time);
            applytimeRecursive($sections, $sections[$parent]['IBLOCK_SECTION_ID'], $time);
        } elseif(!isset($sections[$parent])) {
            $sections[$parent] = array('FIX' => true, 'TIMESTAMP_X' => date('d.m.Y H:i:s', $time));
        }
    }
    
	while ($section = $rs->GetNext()) {
		$parent = 
			$section['IBLOCK_SECTION_ID'] ?: 0;
        //$els = CIBlockElement::GetList(array('timestamp_x' => 'DESC'), array('SECTION_ID' => $section['ID']), false, array('nPageSize' => '1'), array('TIMESTAMP_X'));
        /*while ($el = $els->GetNext()) {
            if (strtotime($el['TIMESTAMP_X']) > strtotime($section['TIMESTAMP_X']))
                $section['TIMESTAMP_X'] = $el['TIMESTAMP_X'];
        }
        if (isset($sections[$section['ID']]) && $sections[$section['ID']]['FIX']) {
            $section['TIMESTAMP_X'] = $sections[$section['ID']]['TIMESTAMP_X'];
        }*/
		$sectionData = array('IBLOCK_SECTION_ID' => $parent, 'NAME' => $section['NAME'], 'CODE' => $section['CODE'], 'TIMESTAMP_X' => $section['TIMESTAMP_X'],);
        //applytimeRecursive($sections, $parent, strtotime($section['TIMESTAMP_X']));
		
		if (!isset($byParent[$parent])) {
			$byParent[$parent] = array();
		}
			
		$sections[$section['ID']] = $sectionData;
		$byParent[$parent][$section['ID']] = $sectionData;
	}
	unset($rs);
	
	RhdMemcache::set($cacheKey, compact('sections', 'byParent'));
}
else {
	extract($cached);
}

$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('sitemap.php'),
	compact('sections', 'byParent'),
	Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");