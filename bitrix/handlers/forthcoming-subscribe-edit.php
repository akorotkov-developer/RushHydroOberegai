<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Подписка на новости");
$APPLICATION->IncludeComponent("rushydro:subscribe.edit", "shareholder", array(
	"RUBRIC_ID" => "439",
	"SHOW_HIDDEN" => "Y",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_SHADOW" => "Y",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"ALLOW_ANONYMOUS" => "Y",
	"SHOW_AUTH_LINKS" => "Y",
	"SET_TITLE" => "Y",
	"AJAX_OPTION_ADDITIONAL" => "",
    "USE_CAPTCHA"=>"Y"
	),
	false
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");