<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
	<div class="gallery teams-list">
		<?$i = 0; $magicIndexes = array(9, 11); ?>
		<?foreach($arResult["ITEMS"] as $index => $arItem): $isMagicIndex = in_array($index, $magicIndexes); if (!$isMagicIndex) { $i++; } else { $i += 3; }?>

			<div class="item<?if ($i == 1){?> first<?}?>"<?php if ($isMagicIndex):?> style="float: right;"<?php endif;?>>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" title="<?=$arItem["NAME"]?>">
					<?if ($arItem["PREVIEW_PICTURE"]["SRC"]){?>
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" />
					<?}else{?>
						<div class="no-photo">Нет фотографии</div>
					<?}?>
				</a>
				<span><?=$arItem["NAME"]?></span>
			</div>
			<?php if ($isMagicIndex):?><div class="clearfix"></div><?php endif;?>
		<?if ($i == 4) {echo '<div class="clearfix"></div>'; $i = 0;}?>
		<?endforeach;?>
		<?if ($i < 4) {echo '<div class="clearfix"></div>';}?>
	</div>
<?endif?>