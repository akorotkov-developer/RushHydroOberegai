<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#">
<head>
	<title><?$APPLICATION->ShowTitle().PAGE_TITLE?></title>
	<script>document.documentElement.id = "js"</script>
	<?$APPLICATION->ShowHead()?>
	<?php if(!strpos($APPLICATION->GetCurPage(),'fotokonkursy_oberegai/detail')):?>
	<meta property="og:title" content="<?$APPLICATION->ShowTitle() . PAGE_TITLE?>" />
	<meta property="og:image" content="http://oberegai.rushydro.ru/bitrix/templates/oberegai/i/logo-social.jpg" />
	<?php endif;?>
	<meta property="og:description" content="<?=PAGE_DESCRIPTION?>" />
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/prettyPhoto.css?1" />
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.7.2.min.js"></script>
	<!--[if lte IE 8]>
		<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/excanvas.js"></script>
	<![endif]-->

	<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-ui-dialog.js"></script>
	<link href="<?=SITE_TEMPLATE_PATH?>/css/jquery-ui.css" type="text/css" rel="stylesheet" />

	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/clock.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scripts.js?2"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.prettyPhoto.js?1"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/swfobject.js?1"></script>
	<!--[if lte IE 6]>
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/ie6.css" />
		<script src="<?=SITE_TEMPLATE_PATH?>/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				DD_belatedPNG.fix('#wrapper, #menu i, .footer-icons .logo, .news-main, .banner-main span, #menu-wrap, i.grad-btm, #n-m-prev, #n-m-next, .trash, .map-main .heroes, .footer-icons a, .map-main img, .banner-main img, .banner-main a, #map-region .arr, #map-region .map-dot a, .heroes');
			});
		</script>
	<![endif]-->
	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/ie7.css" />
	<![endif]-->
	<!--[if lte IE 8]>
		<style>
			#map-region .ico-dot_blue, .header-informer span {display:inline;}
		</style>
	<![endif]-->
	<?$dir = $APPLICATION->GetCurDir();?>
	<script type="text/javascript">
		$(function(){
			$('a[rel="prettyPhoto[gallery]"]').prettyPhoto({
				social_tools: false,
				theme: 'dark_rounded',
				deeplinking: false
			});
		})
	</script>
</head>

<body<?if ($dir != "/" && ERROR_404 == "Y"){?> class="inner-page"<?}?>>
	<?$APPLICATION->ShowPanel();?>
	<div id="dialog1">
		<div style="text-align: center; padding: 20px 0 0 0">
			<h2>Спасибо, ваш голос учтен!</h2>
		</div>
	</div>

	<div id="dialog2">
		<div style="text-align: center; padding: 20px 0 0 0">
			<h2>Вы уже проголосовали</h2>
		</div>
	</div>
	<div id="bg-main"></div>
	<div id="wrapper">
		<div id="header-wrap">
			<div id="header">
				<a href="http://www.rushydro.ru/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/i/logo-rushydro.png" class="logo-rus" /></a>
				<a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/i/logo.gif" width="531" class="logo" /></a>
				<div class="h-contacts">
					<a href="/letters/" class="h-link_letters">Вместе мы - сила!</a>
					+7 (800) 333 80 00<br/>
					
					<a href="mailto:OFFICE@RUSHYDRO.RU">OFFICE@RUSHYDRO.RU</a><br/>
				</div>
				<div class="h-search">
					<?$APPLICATION->IncludeComponent(
						"bitrix:search.form",
						"",
						Array(),
						false
					);?>
				</div>
				<?if ($dir == "/" && ERROR_404 != "Y"){?><div class="anim-switch">
					Анимация: <span id="onAnimation">вкл</span> / <span class="act" id="offAnimation">выкл</span>
				</div><?}?>

				<?$APPLICATION->IncludeComponent("bitrix:news.detail", "counters", array(
					"IBLOCK_TYPE" => "oberegai",
					"IBLOCK_ID" => "13",
					"ELEMENT_ID" => 277,
					"ELEMENT_CODE" => "",
					"CHECK_DATES" => "Y",
					"FIELD_CODE" => array(
					),
					"PROPERTY_CODE" => array(
						'BAG_COUNT',
						'PEOPLE_COUNT',
					),
					"IBLOCK_URL" => "",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "N",
					"META_KEYWORDS" => "-",
					"META_DESCRIPTION" => "-",
					"BROWSER_TITLE" => "-",
					"SET_TITLE" => "N",
					"SET_STATUS_404" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "Y",
					"ACTIVE_DATE_FORMAT" => "j F Y",
					"USE_PERMISSIONS" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "Страница",
					"PAGER_TEMPLATE" => "",
					"PAGER_SHOW_ALL" => "Y",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "N",
					"DISPLAY_PICTURE" => "N",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"USE_SHARE" => "N",
					"AJAX_OPTION_ADDITIONAL" => ""
					),
					false
				);?>
			</div>
		</div>
		<?$APPLICATION->IncludeComponent(
		"bitrix:menu",
		"top",
		Array(
			"ROOT_MENU_TYPE" => "top",
			"MAX_LEVEL" => "1",
			"CHILD_MENU_TYPE" => "left",
			"USE_EXT" => "N",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N",
			"MENU_CACHE_TYPE" => "Y",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "Y",
			"MENU_CACHE_GET_VARS" => array()
		),
		false
		);?>
		<div class="content-wrap">
			<div class="b-content">
				<?if ($dir != "/" || ERROR_404 == "Y"){?>
					<?if (ERROR_404 != "Y"){?>
						<div class="breadcrumb">
							<?$APPLICATION->IncludeComponent(
							"bitrix:breadcrumb",
							"",
							Array(),
							false
							);?>
						</div>
					<?}?>
					<h1><?$APPLICATION->ShowTitle(false)?></h1>
				<?}?>