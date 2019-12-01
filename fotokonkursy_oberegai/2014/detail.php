<?php
//Сделать проверку для входа mail.ru агента
define('USE_SALT', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
if (in_array($_SERVER['HTTP_USER_AGENT'], array(
  'facebookexternalhit/1.1 (+https://www.facebook.com/externalhit_uatext.php)',
  'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
  'OdklBot/1.0 (klass@odnoklassniki.ru)'
)) || !$_SERVER['HTTP_USER_AGENT']) {
	$APPLICATION->SetTitle("Фотоконкурсы #оберегай");
	$APPLICATION->IncludeComponent(
		"bitrix:news.detail",
		"photokonkurs",
		Array(
			"AJAX_MODE" => "N",
			"IBLOCK_TYPE" => "oberegai",
			"IBLOCK_ID" => "18",
			"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
			"ELEMENT_CODE" => "",
			"CHECK_DATES" => "N",
			"FIELD_CODE" => array(),
			"PROPERTY_CODE" => array("LIKES"),
			"IBLOCK_URL" => "",
			"META_KEYWORDS" => "-",
			"META_DESCRIPTION" => "-",
			"BROWSER_TITLE" => "-",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"USE_PERMISSIONS" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_NOTES" => "",
			"CACHE_GROUPS" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "Страница",
			"PAGER_TEMPLATE" => "",
			"PAGER_SHOW_ALL" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_ADDITIONAL" => ""
		)
	);
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
}
else {
	LocalRedirect('/fotokonkursy_oberegai/');
}