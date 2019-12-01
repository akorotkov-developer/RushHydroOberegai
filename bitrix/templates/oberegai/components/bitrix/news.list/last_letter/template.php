<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="last-letter"> 
	<div class="head">Вместе мы &ndash; сила!</div>				 
	<div class="cont"> 					 
	<?foreach($arResult["ITEMS"] as $arItem):?>		
		<?if ($arItem["DISPLAY_PROPERTIES"]["AUTHOR"]){?><div class="letters-author">Автор: <span><?echo $arItem["DISPLAY_PROPERTIES"]["AUTHOR"]["VALUE"]?></span></div><?}?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<div class="m-desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
		<?endif;?>
	<?endforeach;?>
	<div style="text-align:right; padding-top:6px;"><a href="/letters/">все комментарии>></a></div>
	</div>
</div>
