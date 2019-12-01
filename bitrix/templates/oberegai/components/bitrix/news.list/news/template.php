<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="list-material"> 					 
	<?foreach($arResult["ITEMS"] as $arItem):?>					 
		<div class="item"> 	
			<div class="m-date"><?echo mb_strtolower($arItem["DISPLAY_ACTIVE_FROM"])?></div>
			<div class="m-name"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo html_entity_decode($arItem["NAME"])?></a></div>
			<?if($arItem["PREVIEW_PICTURE"]["SRC"]){?>
				<img src="<?echo $arItem["PREVIEW_PICTURE"]["SRC"];?>" class="img" />
			<?}?>
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<div class="m-desc"><?echo $arItem["PREVIEW_TEXT"];?></div>
			<?endif;?>
			<div class="clearfix"></div>
		</div>
	<?endforeach;?>

	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
