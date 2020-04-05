<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if (!empty($_GET['tags'])) {
$APPLICATION->IncludeComponent(
	"rushydro:search.page", 
	"tag_search", 
	Array(
		"RESTART"	=>	"N",
		"CHECK_DATES"	=>	"Y",
		"arrWHERE"	=>	array(
			0	=>	"iblock_news",
			1	=>	"iblock_articles",
			2	=>	"iblock_books",
		),
		"arrFILTER"	=>	array(
			0	=>	"yes",
		),
		"SHOW_WHERE"	=>	"N",
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
		"PAGER_SHOW_ALWAYS" => "N"
	)
);
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");