<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle(RhdHandler::isEnglish() ? 'Search results' : "Результаты поиска");

$arDeleteSection = array(
	0 => 'S9303', 
	/* ПКМ */
	1 => 'S9034', 
	2 => 'S9086', 
	3 => 'S9035', 
	4 => 'S9036', 
	5 => 'S9037',
	6 => 'S9136',
	7 => 'S9137',
	8 => 'S9138',
	9 => 'S9087',
	10 => 'S9088',
	11 => 'S9089',
	12 => 'S9100',
	13 => 'S9101',
	14 => 'S9102',
	15 => 'S9070',
	16 => 'S9071',
	17 => 'S9072',
	18 => 'S9067',
	19 => 'S9069',
	20 => 'S9070',
	21 => 'S9104',
	22 => 'S9105',
	23 => 'S9106',
	24 => 'S9228',
	25 => 'S9229',
	26 => 'S9230',
	27 => 'S9190',
	28 => 'S9191',
	29 => 'S9192',
	30 => 'S9193',
	31 => 'S9194',
	32 => 'S9195',
	33 => 'S9074',
	34 => 'S9075',
	35 => 'S9076',
	36 => 'S9198',
	37 => 'S9199',
	38 => 'S9200',
	39 => 'S9065',
	40 => 'S9066',
	41 => 'S9067',
	42 => 'S9079',
	43 => 'S9080',
	44 => 'S9081',
	45 => 'S9082',
	46 => 'S9083',
	47 => 'S9139',
	48 => 'S9140',
	49 => 'S9141',
	50 => 'S9048',
	51 => 'S9050',
	52 => 'S9051',
	53 => 'S9217',
	54 => 'S9218',
	55 => 'S9219',
	56 => 'S9196',
	57 => 'S9197',
	58 => 'S9093',
	59 => 'S9094',
	60 => 'S9095',
	61 => 'S9222',
	62 => 'S9223',
	63 => 'S9176',
	64 => 'S9177',
	65 => 'S9178',
	66 => 'S9068',
	67 => 'S9069',
	68 => 'S9070',
	/* ПКМ */

	/* Отозванные сертификаты */
	68 => 'S8415'
	/* Отозванные сертификаты */
);

function findExcludedIDsFromSearch($iblockIDs) {
	if ( ! CModule::IncludeModule('iblock') ) {
		return false;
	}

	$ibIDs = array();
	if ( ! is_array($iblockIDs) ) {
		$ibIDs[] = $iblockIDs;
	} else {
		$ibIDs = $iblockIDs;
	}

	$excludeIDs = array();
	foreach ( $ibIDs as $ibID ) {
		$res        = CIBlock::GetProperties(
			$ibID,
			array(),
			array(
				"CODE" => "EXCLUDE_FROM_SEARCH"
			)
		);
		$propExists = $res->SelectedRowsCount() == 1 ? true : false;
		if ( $propExists ) {
			$el_list = CIBlockElement::GetList(
				array(),
				array(
					'IBLOCK_ID'                          => $ibID,
					'ACTIVE'                             => 'Y',
					'PROPERTY_EXCLUDE_FROM_SEARCH_VALUE' => 1
				)
			);
			if ( $el_list->SelectedRowsCount() > 0 ) {
				while ( $ar_el = $el_list->Fetch() ) {
					$excludeIDs[] = $ar_el['ID'];
				}
			}
		}
	}

	return $excludeIDs;
}

global $arSectionFilter;
if (!$_GET['scope']) {
	$_GET['scope'] = RhdHandler::isEnglish() ? 'current' : 'all';
}
switch ($_GET['scope']) {
	case 'news':
		$excludeIDs = findExcludedIDsFromSearch(RhdHandler::getIBlockId());
		if ( count($excludeIDs) > 0 ) {
			$arDeleteSection = array_merge($arDeleteSection, $excludeIDs);
		}
		$arSectionFilter = array('!ITEM_ID' => $arDeleteSection, "PARAMS" => array("iblock_section" => RhdHandler::isEnglish() ? 7471 : 4315), '=PARAM2' => RhdHandler::getIBlockId());
		break;

	case 'protocols':
		$excludeIDs = findExcludedIDsFromSearch(RhdHandler::getIBlockId());
		if ( count($excludeIDs) > 0 ) {
			$arDeleteSection = array_merge($arDeleteSection, $excludeIDs);
		}
		$arSectionFilter = array('!ITEM_ID' => $arDeleteSection, "PARAMS" => array("iblock_section" => 4167), '=PARAM2' => RhdHandler::getIBlockId());
		break;

	case 'current':
		$excludeIDs = findExcludedIDsFromSearch(RhdHandler::getIBlockId());
		if ( count($excludeIDs) > 0 ) {
			$arDeleteSection = array_merge($arDeleteSection, $excludeIDs);
		}
		$arSectionFilter = array('!ITEM_ID' => $arDeleteSection, '=PARAM2' => RhdHandler::getIBlockId());
		break;

	default:
		$filialIds = array_merge(RhdHandler::getFilialIds(), array(RhdHandler::getMainSiteId()));
		if (in_array(RhdHandler::getIBlockId(), $filialIds)) {
			$iblockIds = $filialIds;
		}
		else {
			$iblockIds = RhdHandler::getIBlockId();
		}
		$excludeIDs = findExcludedIDsFromSearch($iblockIds);
		if ( count($excludeIDs) > 0 ) {
			$arDeleteSection = array_merge($arDeleteSection, $excludeIDs);
		}
		$arSectionFilter = array('!ITEM_ID' => $arDeleteSection, '=PARAM2' => $iblockIds);
		break;
}


$APPLICATION->IncludeComponent("rushydro:search.page", "", Array(
	"RESTART"	=>	"N",
	"CHECK_DATES"	=>	"Y",
	"FILTER_NAME" => "arSectionFilter",
	"arrWHERE"	=>	array(
		0	=>	"iblock_news",
		1	=>	"iblock_articles",
		2	=>	"iblock_books",
	),
	"arrFILTER"	=>	array(
		"yes",
	),
	"SHOW_WHERE"	=>	"N",
	"USE_TITLE_RANK" => "Y",
	"PAGE_RESULT_COUNT"	=>	"10",
	"CACHE_TYPE"	=>	"A",
	"CACHE_TIME"	=>	"3600",
	"TAGS_SORT"	=>	"NAME",
	"TAGS_PAGE_ELEMENTS"	=>	"20",
	"TAGS_PERIOD"	=>	"",
	"TAGS_URL_SEARCH"	=>	"",
	"TAGS_INHERIT"	=>	"Y",
	"FONT_MAX"	=>	"50",
	"FONT_MIN"	=>	"10",
	"COLOR_NEW"	=>	"000000",
	"COLOR_OLD"	=>	"C8C8C8",
	"PERIOD_NEW_TAGS"	=>	"",
	"SHOW_CHAIN"	=>	"Y",
	"COLOR_TYPE"	=>	"Y",
	"WIDTH"	=>	"100%",
	"PAGER_SHOW_ALWAYS" => "N",
	"USE_LANGUAGE_GUESS" => 'N',
	)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
