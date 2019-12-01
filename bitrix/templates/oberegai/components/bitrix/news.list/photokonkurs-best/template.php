<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult["ITEMS"])) {
			$url = strtok('http://' . SITE_SERVER_NAME.$APPLICATION->GetCurUri(), '?');
			foreach($arResult["ITEMS"] as $arItem):
			if($curSectionId == $arItem['IBLOCK_SECTION_ID']) continue;
			$pic = normalize_picture_url($arItem["DETAIL_PICTURE"]['SRC']);?>
			<div class="item_wrap<?if ($arItem['IBLOCK_SECTION_ID'] == 13){?> first<?}?>">
				<div class="item">
					<a href="<?php echo $arItem["DETAIL_PICTURE"]["SRC"];?>" rel="prettyPhoto[gallery]">
						<img src="<?php echo $arItem["PREVIEW_PICTURE"]["SRC"];?>" class="img" />
					</a>
				</div>
				<div style="display:none;">
				<?var_dump($arItem['DISPLAY_PROPERTIES']['LIKES']['VALUE']);?>
				</div>
				<?//if(!isBlackOut()):?>
				<div class="item_btns_wrap">
					<div class="item_btn__like btn-like ajax-like" data-deactive data-closed="false" data-id="<?=!isBlackOut() ? $arItem['ID'] : ''; ?>"><div class="like-count in-bl"><?=$arItem['DISPLAY_PROPERTIES']['LIKES']['VALUE']?></div></div>
					<div class="item_btn_share-wrap">
						<div class="item_btn_share"><div class="b-ico"></div>Голосуй за меня!</div>
						<div class="item_btn_share-btns">
					    	<p>Проголосуй за меня в фотоконкурсе «оБЕРЕГАй!»</p>
					    	<div class="social_share vk in-bl" data-type="vk" data-title="<?=$arItem['DETAIL_PICTURE']['DESCRIPTION'] ? : $APPLICATION->GetTitle();?>" data-text="<?=PAGE_DESCRIPTION?>" data-image="<?=$pic?>"></div><!--
					     --><div class="social_share fb in-bl" data-type="fb" data-url="<?=$url . 'detail/'. $arItem["ID"];?>" data-image="<?=$pic?>"></div><!--
					     --><div class="social_share tw in-bl" data-type="tw" data-title="<?=$arItem['DETAIL_PICTURE']['DESCRIPTION'] ? : $APPLICATION->GetTitle();?>"></div><!--
					     --><div class="social_share mr in-bl" data-type="mr" data-title="<?=$arItem['DETAIL_PICTURE']['DESCRIPTION'] ? : $APPLICATION->GetTitle();?>"" data-text="<?=PAGE_DESCRIPTION?>" data-url="<?=$url . 'detail/'. $arItem["ID"];?>" data-image="<?=$pic?>"></div><!--
					     --><div class="social_share ok in-bl" data-type="ok" data-title="<?=$arItem['DETAIL_PICTURE']['DESCRIPTION'] ? : $APPLICATION->GetTitle();?>"" data-text="<?=PAGE_DESCRIPTION?>" data-url="<?=$url . 'detail/'. $arItem["ID"];?>" data-image="<?=$pic?>"></div>
					    </div>
					</div>
				</div>
				<?//endif;?>
				<?php
					if (!empty($arItem["DETAIL_PICTURE"]["DESCRIPTION"]))
						echo '<span class="item_name">'.$arItem["DETAIL_PICTURE"]["DESCRIPTION"].'</span>';
				?>
			</div>
		<?endforeach;?>
<?}?>
