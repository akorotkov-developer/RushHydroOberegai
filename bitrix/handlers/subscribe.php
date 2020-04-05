<?/*
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Подписка на новости");
$APPLICATION->IncludeComponent(
	"rushydro:subscribe.index", 
	"", 
	array(
		//'PAGE' => RhdPath::createUrl(RhdHandler::getSiteCode(), 'subscribe/edit'),
	)
);
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");*/?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Подписка на новости");
$APPLICATION->IncludeComponent(
	"rushydro:subscribe.edit",
	"",
	array(
		'ALLOW_ANONYMOUS' => 'Y',
		'SHOW_AUTH_LINKS' => 'Y',
		'PAGE' => RhdPath::createUrl(RhdHandler::getSiteCode(), 'subscribe/edit'),
	)
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");