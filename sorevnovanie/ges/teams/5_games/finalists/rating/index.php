<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рейтинг голосования");
?> <div class="tbl-stages-head">
	<table width="100%">
		<colgroup>
			<col width="398">
			<col width="90">
		</colgroup>
		<tr>
			<td style="text-align:left; background:none;">Название команды</td>
			<td>Голосов</td>
			<td>Рейтинг</td>
		</tr>
	</table>
	<i></i>
	<i class="arr-rght"></i>
</div>
<?php
	global $arFilterFinalist;
	$arFilterFinalist = array("PROPERTY_IS_FINALIST_VALUE" => 'да');
?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "rating.finalists", array(
	"IBLOCK_TYPE" => "teams",
	"IBLOCK_ID" => "3",
	"NEWS_COUNT" => "100",
	"SORT_BY1" => "PROPERTY_VOTES_FINAL",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "NAME",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "arFilterFinalist",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "VOTES_FINAL",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "0",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "",
	"ACTIVE_DATE_FORMAT" => "d.m.Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => null,
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "&Iacute;&icirc;&acirc;î&ntilde;&ograve;&egrave;",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>