<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("ГЭС");
?> 			 
<div id="col-left"> 	<?$APPLICATION->IncludeComponent("bitrix:news.list", "banners", array(
	"IBLOCK_TYPE" => "banners",
	"IBLOCK_ID" => "2",
	"NEWS_COUNT" => "20",
	"SORT_BY1" => "SORT",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "ID",
	"SORT_ORDER2" => "DESC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
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
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "N",
	"DISPLAY_NAME" => "N",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?> 			 				 
  <ul class="bl-txt"> 					 
    <li class="bl-first"><a class="bl-name" href="/ges/teams/" >Голосуй за любимую команду!</a> 
      <div style="margin-top: 30px;"><a href="/ges/teams/" ><img src="/upload/medialibrary/1d9/img-like.gif" title="img-like.gif" border="0" alt="img-like.gif" width="91" height="43"  /></a></div>
     						 
      <div class="bl-desc"></div>
     					</li>
   					 
   					 
    <li> 						<a class="bl-name" href="/ges/teams/rating/" >По итогам зрительского голосования лидирует</a> 						 
      <div class="bl-desc"> <?$APPLICATION->IncludeComponent("bitrix:news.list", "team-leader", array(
	"IBLOCK_TYPE" => "teams",
	"IBLOCK_ID" => "32",
	"NEWS_COUNT" => "1",
	"SORT_BY1" => "PROPERTY_VOTES",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "RAND",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
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
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "Y",
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
);?> </div>
     					</li>
    <li> 						<a class="bl-name" href="/ges/letters/" >Народная <br/>журналистика</a> 						 
      <div class="bl-desc"><a class="bl-name" href="/ges/letters/" ><img src="/upload/medialibrary/d8c/img-newspaper.gif" title="img-newspaper.gif" border="0" alt="img-newspaper.gif" width="64" height="74"  /></a></div>
     					</li>
   				</ul>
				<div class="clear"></div>
				<div class="share-btn-main">
					<p>Поделиться:</p>
					<a title="Поделиться в Facebook" rel="nofollow" href="http://www.facebook.com/" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href),'facebook','width=600,height=600');return false;"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/fb-ico.png" alt="Facebook" /></a>
					<a title="Опубликовать в Twitter" onclick="window.open('http://twitter.com/home?status='+encodeURIComponent(document.title)+': '+encodeURIComponent(location.href),'twitter','width=600,height=600');return false;" rel="nofollow" href="http://twitter.com/"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/tw-ico.png" alt="Twitter" /></a>
					<a title="Поделиться ВКонтакте" onclick="window.open('http://vkontakte.ru/share.php?url='+encodeURIComponent(location.href),'vkontakte','width=600,height=600');return false;" rel="nofollow" href="http://vkontakte.ru/"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/vk-ico.png" alt="Vkontakte" /></a>
					<form target="_blank" method="post" action="http://www.livejournal.com/update.bml">
						<input type="hidden" value="Пятые Всероссийские соревнования оперативного персонала ГЭС. Поддержи любимую команду!" name="subject">
						<textarea style="display:none;" name="event">&lt;img src=&quot;http://sorevnovanie.rushydro.ru/bitrix/templates/rushydro/i/logo-rushydro.jpg&quot; align=&quot;left&quot; hspace=&quot;10&quot; /&gt;Всероссийские соревнования оперативного персонала ГЭС организуются и проводятся в целях совершенствования и оценки уровня профессиональной подготовки оперативного персонала гидроэлектростанций, распространения передовых и новых методов работы. &lt;a href=&quot;"http://sorevnovanie.rushydro.ru/&quot; target=&quot;_blank&quot;&gt;Перейти на сайт соревнований&lt;/a&gt;</textarea>
						<input type="image" src="<?=SITE_TEMPLATE_PATH?>/i/share/lj-ico.png">
					</form>
					<a rel="nofollow" onclick="window.open('http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl='+encodeURIComponent(location.href), 'odkl', 'width=600, height=600'); return false;" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl='+encodeURIComponent(location.href)" title="Поделиться с друзьями в Одноклассниках"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/odnkl-ico.png" alt="Odnoklassniki" /></a>
					<a title="Поделиться В Моем Мире" onclick="window.open('http://connect.mail.ru/share?share_url='+encodeURIComponent(location.href),'mail','width=600,height=600');return false;" rel="nofollow" href="http://connect.mail.ru/"><img src="<?=SITE_TEMPLATE_PATH?>/i/share/mail-ico.png" alt="Mail" /></a>
				</div>
 			</div>
 			 
<div id="col-right">
<?
	global $arFiter;
	$arFiter = array("PROPERTY_NEW_STAGE" => false);
?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "news", array(
	"IBLOCK_TYPE" => "news",
	"IBLOCK_ID" => "1",
	"NEWS_COUNT" => "3",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "arFiter",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "SELECT",
		1 => "LINK",
		2 => "NEW_STAGE",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
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
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<a href="/ges/news/rss/" class="rss-link" style="top:-2px;">Новости в формате RSS</a> 	<a href="/ges/news/" class="arr-link" >Все новости</a>
<div style="padding-top:20px; border-top:1px dotted #999; margin-top:20px;">
<?$APPLICATION->IncludeComponent("bitrix:news.list", "letters-main", array(
	"IBLOCK_TYPE" => "letters",
	"IBLOCK_ID" => "5",
	"NEWS_COUNT" => "3",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
		2 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
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
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "N",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
</div>
</div>
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>