<?define('USE_SALT', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотоконкурс оБЕРЕГАй-2019");
$APPLICATION->AddHeadScript('/bitrix/templates/oberegai/js/share.js',true);
?> 
 <p style="text-align: center;"><strong>Прими участие в фотоконкурсе оБЕРЕГАй-2019!</strong></p>
 
<p style="text-align: justify;">В рамках проведения благотворительной экологической акции оБЕРЕГАй РусГидро объявляет о проведении среди ее участников ежегодного фотоконкурса.</p>
 
<p style="text-align: justify;">Для того, чтобы принять в нём участие необходимо выложить в социальных сетях Инстаграм (Instagram), Фейсбук (Facebook), ВКонтакте фотоснимки с хештегом #oberegai или направить их на электронный адрес <a href="mailto:oberegai@rushydro.ru" >oberegai@rushydro.ru</a>.</p>
 
<p style="text-align: justify;"><strong>Фотоконкурс оБЕРЕГАй проводится в 3-х номинациях:</strong></p>
 
<ol style="text-align: justify;"> 
  <li>Лучшая команда.</li>
 
  <li>Самый красивый уголок природы.</li>
 
  <li>Selfie-оБЕРЕГАй.</li>
 </ol>
<br>
 
<p style="text-align: justify;">Обязательное условие конкурса - все фотографии должны быть сделаны участником конкурса только во время проведения акций 2019 года.</p>
 
<p style="text-align: justify;"><strong>Лучшая команда</strong> &ndash; фотография, на которой запечатлена работа всей команды.</p>
 
<p style="text-align: justify;"><strong>Самый красивый уголок природы</strong> – пейзажная фотография уголка природы, убранного в ходе экоакции. Допускается присутствие на фотографии одного или нескольких участников акции.</p>
 
<p style="text-align: justify;"><strong>Selfie-оБЕРЕГАй – </strong>фотография самого себя во время проведения акции. Обязательно присутствие логотипа акции на фотоснимке.</p>
 
<p style="text-align: justify;">Кураторы проекта отслеживают опубликованные в социальных сетях фотографии с хештэгом #oberegai, лучшие из них после завершения сезона акции будут выложены на сайте в раздел &laquo;Фотоконкурс оБЕРЕГАй&raquo;.</p>
 
<p style="text-align: justify;">Основное голосование будет идти на сайте <a href="http://www.oberegai.rushydro.ru" >oberegai.rushydro.ru</a>&nbsp; в течение 2-х недель после окончания сезона оБЕРЕГАй-2019 (октябрь-ноябрь).</p>
 
<p style="text-align: justify;"><strong>Призы</strong></p>
 
<p style="text-align: justify;">По итогам голосования РусГидро дарит поощрительные призы трём участникам в каждой номинации, которые наберут больше всего «лайков».</p>
 

 
<br />
 
 
<br />
 
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photokonkurs",
	Array(
		"IBLOCK_TYPE" => "oberegai",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "28",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"PROPERTY_CODE" => array(0=>"LIKES",1=>"CITY",2=>"NICK_INST",3=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "64",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_VOTING" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
<br />
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photokonkurs",
	Array(
		"IBLOCK_TYPE" => "oberegai",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "28",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"PROPERTY_CODE" => array(0=>"LIKES",1=>"CITY",2=>"NICK_INST",3=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "65",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_VOTING" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
<br />
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photokonkurs2",
	Array(
		"IBLOCK_TYPE" => "oberegai",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "28",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"",),
		"PROPERTY_CODE" => array(0=>"LIKES",1=>"CITY",2=>"NICK_INST",3=>"",),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "63",
		"PARENT_SECTION_CODE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_VOTING" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	),
false,
Array(
	'ACTIVE_COMPONENT' => 'Y'
)
);?> 

<?
 $APPLICATION->IncludeComponent("runetsoft:captcha.code", "modal", array(
	
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);
?> 
<br />
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
