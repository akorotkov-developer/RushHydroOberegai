<?define('USE_SALT', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотоконкурсы #оберегай ");
$APPLICATION->AddHeadScript('/bitrix/templates/oberegai/js/share.js',true);
?> <a href="mailto:oberegai@rushydro.ru" ><img src="/upload/medialibrary/8b7/pobqva-kymqnsfkkd-4.png" border="0" align="right" width="108" height="136" style="margin-left:20px; margin-right:-10px;"  /></a> <img src="/upload/medialibrary/264/paxvuh-pbqnkllzam-6.png" border="0" align="right" width="108" height="136"  />
<p><b>Фотоконкурсы оБЕРЕГАй проводятся в 3-х номинациях:</b></p>
 
<ol type="1" start="1">
  <li>Селфи-оберегай.</li>

  <li>Лучшая команда.</li>

  <li>Лучшая находка.</li>
</ol>
 
<p>
  <br />
</p>

<p>Обязательное условие конкурса - все фотографии участниками конкурсов должны быть сделаны только во время проведения акций. </p>
 
<p> </p>
 
<p>Селфи-оберегай &ndash; фотография самого себя на фоне акции. </p>
 
<p>Лучшая команда &ndash; фотография, на которой запечатлена работа всей команды.</p>
 
<p>Лучшая находка &ndash; самый оригинальный предмет, найденный во время уборки мусора. </p>
 
<p> </p>
 
<p><b>Фотографии с акции с хештэгом </b><b>#</b><b>oberegai</b><b>выкладываются участниками акции в социальных сетях </b>Инстаграм (Instagram), Фейсбук (Facebook), ВКонтакте, а также высылаются на эл. адрес <a href="mailto:oberegai@rushydro.ru">oberegai@rushydro.ru</a> для размещения на сайте акции <a href="http://oberegai.rushydro.ru/">http://oberegai.rushydro.ru/</a> .</p>
 
<p>Кураторы проекта отслеживают фотографии с хештэгом акции и выкладывают лучшие из них на сайте в раздел &laquo;Фотоконкурсы оБЕРЕГАй&raquo;.</p>
 
<p> </p>
 
<p>Основное голосование будет идти в течение месяца после окончания всех акций &ndash; (октябрь).</p>
 
<p><b>Призы</b></p>
 
<p>За победу в каждой из трёх номинаций по итогам голосования будет вручен приз от РусГидро. </p>
 

 
<br />
 
 
<br />
 
<h2 class="gallery_konkurs_head-red"><span class="in-bl">Победители конкурса-2014</span></h2>
 
<div class="gallery gallery_konkurs"> 	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photokonkurs-best",
	Array(
		"IBLOCK_TYPE" => "oberegai",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "1",
		"SORT_BY1" => "PROPERTY_LIKES",
		"SORT_ORDER1" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"SECTION_ID",2=>"ID"),
		"PROPERTY_CODE" => array(0=>"LIKES",1=>""),
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
		"PARENT_SECTION" => "13",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photokonkurs-best",
	Array(
		"IBLOCK_TYPE" => "oberegai",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "1",
		"SORT_BY1" => "PROPERTY_LIKES",
		"SORT_ORDER1" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"SECTION_ID",2=>"ID",),
		"PROPERTY_CODE" => array(0=>"LIKES",1=>"",),
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
		"PARENT_SECTION" => "14",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photokonkurs-best",
	Array(
		"IBLOCK_TYPE" => "oberegai",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "1",
		"SORT_BY1" => "PROPERTY_LIKES",
		"SORT_ORDER1" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"SECTION_ID",2=>"ID",),
		"PROPERTY_CODE" => array(0=>"LIKES",1=>"",),
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
		"PARENT_SECTION" => "15",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 	<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"photokonkurs-best",
	Array(
		"IBLOCK_TYPE" => "oberegai",
		"IBLOCK_ID" => "18",
		"NEWS_COUNT" => "1",
		"SORT_BY1" => "PROPERTY_LIKES",
		"SORT_ORDER1" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(0=>"DETAIL_PICTURE",1=>"SECTION_ID",2=>"ID",),
		"PROPERTY_CODE" => array(0=>"LIKES",1=>"",),
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
		"PARENT_SECTION" => "16",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?>
  <div class="clearfix"></div>
 </div>
<br />
 
<br />
 <? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
