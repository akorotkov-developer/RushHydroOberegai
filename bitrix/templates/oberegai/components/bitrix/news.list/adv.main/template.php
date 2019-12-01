<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<?$i=0;foreach($arResult["ITEMS"] as $arItem):$i++;?>
		<div class="main-adv__item main-adv__item-<?=$i;?>">
			<?if ($arItem["DISPLAY_PROPERTIES"]["LINK"]) {?>
			<a href="<?=$arItem["DISPLAY_PROPERTIES"]["LINK"]["VALUE"]?>" class="main-adv__link">
			<?}?>
			<i class="ico ico-<?=$i;?>_1"></i>
			<i class="ico ico-<?=$i;?>_2"></i>
			<div class="main-adv__date"><?=$arItem["DISPLAY_PROPERTIES"]["DATE"]["VALUE"]?></div>
			<div class="main-adv__date"><?=$arItem["DISPLAY_PROPERTIES"]["TIME"]["VALUE"]?></div>
			<?=$arItem["PREVIEW_TEXT"]?>
			<?if ($arItem["DISPLAY_PROPERTIES"]["LINK"]) {?>
			</a>
			<?}?>
		</div>
	<?endforeach;?>
<?endif?>