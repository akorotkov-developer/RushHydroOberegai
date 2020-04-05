<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$site = RhdHandler::getSite();

$arParams = 
	Array(
		"IBLOCK_TYPE" => "site",
		"IBLOCK_ID" => RhdHandler::getIBlockId(),
		"SECTION_ID" => RhdHandler::getLastSectionId(),
		"NUM_NEWS" => "20",
		"NUM_DAYS" => "30",
		"RSS_TTL" => "60",
		"YANDEX" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
	);

if (!$arParams["SECTION_ID"]) {
	$arParams['CONDITION'] = 
        array(
            'LOGIC' => 'OR',
            'SECTION_ID' => 4315,
			array(
				'LOGIC' => 'OR',
				'SECTION_ID' => RhdHandler::getFilialNewsSectionId(),
				'=PROPERTY_SHOW_IN_MAIN_NEWS_VALUE' => '1',
			)
        );
}

if (RhdHandler::isFilialNews()) {
	$arParams['CONDITION'] = 
		array(
			array(
				'LOGIC' => 'OR',
				'SECTION_ID' => RhdHandler::getFilialNewsSectionId(),
				'=PROPERTY_SHOW_IN_MAIN_NEWS_VALUE' => '1',
			)
		);
}

if (RhdHandler::isAtNews() && in_array(RhdHandler::getSiteCode(), array('pauzhet', 'vmgeopp'))) {
	$arParams['CONDITION'] = 
		array(
			array(
				'LOGIC' => 'AND',
				array('ACTIVE' => 'Y',
					'GLOBAL_ACTIVE' => 'Y',
					'INCLUDE_SUBSECTIONS' => 'N',
					'>=ACTIVE_FROM' => date($DB->DateFormatToPHP(CLang::GetDateFormat("FULL")), mktime(date("H"), date("i"), date("s"), date("m"), date("d")-30, date("Y"))),
				),
				array(
					'LOGIC' => 'OR',
					array(
						'IBLOCK_ID' => 91,
						'SECTION_ID' => 6408,
					),
					array(
						"IBLOCK_ID" => RhdHandler::getIBlockId(),
						"SECTION_ID" => RhdHandler::getLastSectionId(),
					),
				),
			),
		);
}
	
$APPLICATION->IncludeComponent(
	"rushydro:rss.out",
	"",
	$arParams,
	false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
