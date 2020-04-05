<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");

$site = RhdHandler::getSite();
$lastSection = RhdHandler::getLastSection();
$element = RhdHandler::getElement();

if ($element['PROPERTY_EXCLUDE_FROM_SEARCH_VALUE'] == '1') {
	$APPLICATION->SetPageProperty('robots', 'noindex, nofollow');
}

/*if ($element['ID'] === '97421' || $element['ID'] === '97418' || $element['ID'] === '97441' || $element['ID'] === '97442') {
	$passwords = array('rushydro' => 'RusHydroRestricted_2015');
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];

	if (!isset($passwords[$user]) || $passwords[$user] !== $pass) {
		header('WWW-Authenticate: Basic realm="RusHydro"');
  		header('HTTP/1.0 401 Unauthorized');
  		die();
	}
}*/
if($element['IBLOCK_ID'] == 140){
    header("Location: http://".$_SERVER["SERVER_NAME"]);
}
$prevElement = null;
$nextElement = null;

$siteId = $site['ID'];

RhdHandler::$ogDesc = 'test';

if (RhdHandler::isAtNews()) {
    
    $cacheKey = 'near_elements__'.RhdHandler::getSiteCode().'_'.$element['ID'];

    if (!($cached = RhdMemcache::get($cacheKey))) {
        if (RhdHandler::isFilialNews()) {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_SHOW_IN_MAIN_NEWS_VALUE' => 1,
                )
            );
        } elseif (RhdHandler::isIrNews()) {
            /*$filter = array(
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => RhdHandler::getIBlockId(),
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_IN_IR_NEWS_VALUE' => 1,
                )
            );*/

            if (RhdHandler::isEnglish()) {
                $filter = array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => RhdHandler::getIBlockId(),
                    array(
                        'LOGIC' => 'OR',
                        'SECTION_ID' => array($lastSection['ID'], 7471),
                        '=PROPERTY_IN_IR_NEWS_VALUE' => '1',
                    )
                );
            } else {
                $filter = array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => RhdHandler::getIBlockId(),
                    array(
                        'LOGIC' => 'OR',
                        'SECTION_ID' => $lastSection['ID'],
                        '=PROPERTY_IN_IR_NEWS_VALUE' => '1',
                    )
                );
            }
        } elseif (in_array(RhdHandler::getSiteCode(), array('pauzhet', 'vmgeopp'))) {
            $filter = array(
                'ACTIVE' => 'Y',
                'SECTION_ID' => array($lastSection['ID'], 6408),
            );

            $siteId = 91;
        } elseif ($lastSection['ID'] == '7726') {
            $filter = array(
                'ACTIVE' => 'Y',
                'SECTION_ID' => array($lastSection['ID'], 5064),
            );
        } elseif ($lastSection['UF_TAGS']) {
            $tags = explode(',', $lastSection['UF_TAGS']);
            foreach ($tags as $index => $tag) {
                $tags[$index] = '%'.trim($tag).'%';
            }
            $filter = array(
                'ACTIVE' 		=> 'Y',
                //'IBLOCK_ID' 	=> RhdHandler::getIBlockId(),
                'TAGS' 			=> $tags,
            );
        }
        /*elseif ($lastSection['ID'] == '8869') {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_SHOW_IN_HYDROLOGY_VALUE' => 1,
                )
            );
        }*/
        else {
            $filter = array('SECTION_ID' => $lastSection['ID']);
        }

        $prevElement =
            CIBlockElement::GetList(
                array('DATE_ACTIVE_FROM' => 'desc'),
                array_merge(
                    $filter,
                    array('<DATE_ACTIVE_FROM' => $element['DATE_ACTIVE_FROM'], '!NAME' => $element['NAME'])
                ),
                false,
                array('nTopCount' => 1),
                array(
                    '*',
                    'ID',
                    'IBLOCK_ID',
                    'PROPERTY_SHOW_DATE',
                    'PROPERTY_SHOW_IN_HYDROLOGY',
                    'PROPERTY_SHOW_IN_MAIN_NEWS',
                )
            )->GetNext();

        $nextElement =
            CIBlockElement::GetList(
                array('DATE_ACTIVE_FROM' => 'asc'),
                array_merge(
                    $filter,
                    array('>DATE_ACTIVE_FROM' => $element['DATE_ACTIVE_FROM'], '!NAME' => $element['NAME'])
                ),
                false,
                array('nTopCount' => 1),
                array(
                    '*',
                    'ID',
                    'IBLOCK_ID',
                    'PROPERTY_SHOW_DATE',
                    'PROPERTY_SHOW_IN_HYDROLOGY',
                    'PROPERTY_SHOW_IN_MAIN_NEWS',
                )
            )->GetNext();

        RhdMemcache::set($cacheKey, compact('prevElement', 'nextElement', 'siteId'));
    } else {
        extract($cached);
    }
}

$GLOBALS['APPLICATION']->SetTitle($element['NAME']);

$props = getElementProps($element['IBLOCK_ID'] ?: $siteId, $element['ID']);

$gallery = createGallery($props);
$files = getFileArray($props);

foreach ($files as $file) {
    if ($file['PASSWORD_PROTECTED']) {
        $element['DETAIL_TEXT'] =
            preg_replace('/"([^\"]+'.$file['ORIGINAL_NAME'].')"/i', '"/download.php?id='.$file['ID'].'"', $element['DETAIL_TEXT']);

        $element['DETAIL_TEXT'] =
            preg_replace('/"([^\"]+'.$file['FILE_NAME'].')"/i', '"/download.php?id='.$file['ID'].'"', $element['DETAIL_TEXT']);
    }
}

//var_dump($files);

/*$patterns = array('<font color="#888888">Информация', 		'<font color="#888888"><i>Информация', 	'<i><font color="#999999">', 	'<font color="#999999"><i>Информация', 	'<font color="#888888"><i>The information', '<i><font color="#888888">The information', '<font color="#999999"><i>The information');
$closing = array('</i></p>', 								'</p>',									'</p>', 						'</p>',									'</p>',										'</p>',										'</p>');

$showDisclaimer = false;
$showDisclaimer = false;
$disclaimerPos = false;
$index = -1;

while ($disclaimerPos === false) {
    $index++;
    if ($index >= count($patterns)) break;
    $disclaimerPos = mb_strpos($element['DETAIL_TEXT'], $patterns[$index]);
}

if ($disclaimerPos !== false) {
    $element['DETAIL_TEXT'] = mb_substr($element['DETAIL_TEXT'], 0, $disclaimerPos).$closing[$index];
    $showDisclaimer = true;
}*/

$disclaimerType = (int) end(explode(' ', $element['PROPERTY_DISCLAIMER_VALUE']));
if ($disclaimerType) $disclaimerType = 'type'.$disclaimerType;

$disclaimerType = in_array($element['PROPERTY_DISCLAIMER_ENUM_ID'], array(23224, 23221)) ? 'type2' : 'type1';

if (!RhdMemcache::get('parsed_el______'.$element['ID']) && $element['ID']) {
    global $DB;
    $element['DETAIL_TEXT'] = parseText($element['DETAIL_TEXT']);
    //$DB->Query('UPDATE b_iblock_element SET DETAIL_TEXT=\''.$DB->ForSql($element['DETAIL_TEXT']).'\' WHERE ID = \''.$DB->ForSql($element['ID']).'\'');
    /*$ib = new CIBlockElement;
    $ib->Update($element['ID'], array('DETAIL_TEXT' => $element['DETAIL_TEXT']));*/
    RhdMemcache::set('sparsed_el_'.$element['ID'], true);
}

$element['DETAIL_TEXT'] = addMediaplayer($element['DETAIL_TEXT']);

if (strpos($element['DETAIL_TEXT'], 'videoplayer') === false) {
    RhdHandler::$ogDesc = su::cutOnSpace(strip_tags($element['DETAIL_TEXT']), 150);
}

//$element['DETAIL_TEXT'] = parseText($element['DETAIL_TEXT']);
$APPLICATION->IncludeFile(
    $APPLICATION->GetTemplatePath('detail.php'),
    compact('element', 'prevElement', 'nextElement', 'gallery', 'showDisclaimer', 'disclaimerType'),
    Array("MODE"=>"html")
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");