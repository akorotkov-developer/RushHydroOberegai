<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Подписка на новости");
$APPLICATION->IncludeComponent(
	"rushydro:subscribe.edit",
	"",
	array(
		'ALLOW_ANONYMOUS' => 'Y',
		'SHOW_AUTH_LINKS' => 'Y',
	)
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");