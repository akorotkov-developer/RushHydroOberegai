<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<?foreach($arResult["ITEMS"] as $arItem):$i++;?>
		<div class="map-dot" style="left:<?=$arItem["DISPLAY_PROPERTIES"]["CORRD_LEFT"]["VALUE"]?>px; top:<?=$arItem["DISPLAY_PROPERTIES"]["CORRD_TOP"]["VALUE"]?>px;">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>"></a>
			<div class="map-dot-popup">
				<?if ($arItem["PREVIEW_PICTURE"]["SRC"]){?>
					<div class="popup-img"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" /></div>
				<?}else{?>
					<div class="no-photo">Нет фотографии</div>
				<?}?>
				<span><?=$arItem["NAME"]?></span>
				<div class="arr"></div>
			</div>
		</div>
	<?endforeach;?>
<?endif?>