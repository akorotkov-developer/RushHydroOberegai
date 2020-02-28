<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вопросы акционеров к ГОСА по итогам 2017 года");
?> 
<h4>Уважаемый акционер!</h4>
 
<p align="justify">27 июня 2018 года состоится годовое Общее собрание акционеров ПАО &laquo;РусГидро&raquo; по итогам 2017 года. Вы можете задать вопрос по повестке дня собрания. Для этого заполните форму ниже, введите код с картинки и нажмите кнопку «Отправить». Ответ будет направлен в течение 20 календарных дней по электронной почте или почтовым отправлением. Также ответ на Ваш вопрос может быть озвучен в ходе собрания акционеров. </p>
 
<br />
 

<p><a href="/corporate/general-meeting/forthcoming/godovoe-obshchee-sobranie-aktsionerov-pao-rusgidro-gosa-27-iyunya-2018-goda/materialy-godovogo-obshchego-sobraniya-aktsionerov-pao-rusgidro-provodimogo-27-iyunya-2018-goda/" >Материалы ГОСА по итогам 2017 года</a></p>

<p align="justify">
  <br />
</p>
 <?$APPLICATION->IncludeComponent(
	"rushydro:form.result.new",
	"gosa_2017",
	Array(
		"SEF_MODE" => "N",
		"WEB_FORM_ID" => 5,
		"LIST_URL" => "/corporate/general-meeting/forthcoming/godovoe-obshchee-sobranie-aktsionerov-pao-rusgidro-gosa-27-iyunya-2018-goda/voprosy-aktsionerov-k-gosa-po-itogam-2017-goda",
		"EDIT_URL" => "/corporate/general-meeting/forthcoming/godovoe-obshchee-sobranie-aktsionerov-pao-rusgidro-gosa-27-iyunya-2018-goda/voprosy-aktsionerov-k-gosa-po-itogam-2017-goda",
		"SUCCESS_URL" => "/corporate/general-meeting/forthcoming/godovoe-obshchee-sobranie-aktsionerov-pao-rusgidro-gosa-27-iyunya-2018-goda/voprosy-aktsionerov-k-gosa-po-itogam-2017-goda",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"VARIABLE_ALIASES" => Array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID"
		)
	)
);?>
<p align="justify"><b><!--* - поля обязательные для заполнения--></b></p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
