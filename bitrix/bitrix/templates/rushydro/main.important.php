<?//php if (!RhdHandler::isEnglish() && $importantText) { ?>
<div class="m_ttl"><span>ВАЖНО</span></div>
<div class="m_line" style="background-position:0 -6px;"></div>
<div class="m_news m_imporant" style="margin-bottom:38px;">
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "important", array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => 112,
			"NEWS_COUNT" => "",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_BY2" => "DATE_CREATE",
			"SORT_ORDER2" => "ASC",
			"FILTER_NAME" => "",
			"FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "LINK",
				1 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_SHADOW" => "Y",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "d.m.Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
			"ADD_SECTIONS_CHAIN" => "Y",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"DISPLAY_DATE" => "N",
			"DISPLAY_NAME" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"AJAX_OPTION_ADDITIONAL" => ""
			),
			false
		);
	?>
	<!--<a class="link_bg" href="http://oberegai.rushydro.ru/" target="_blank">Акция <img src="<?=SITE_TEMPLATE_PATH?>/i/logo-oberegai.png" style="margin:-17px -4px -6px 5px;" /></a>-->
	<?/*<a class="link_bg" href="http://sorevnovanie.rushydro.ru/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/i/logo_sorevnov.png" style="float:right; margin:-4px -4px -60px 0;" />Пятые всероссийские<br/> соревнования оперативного<br/> персонала гидроэлектростанций</a>*/?>
</div>
<?php// } ?>