<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="gallery gallery-like">
	<?php $i = 0; foreach($arResult["SECTIONS"] as $arSection): $i++;?>
		<div class="item<?php echo ($i == 1) ? ' first' : ''; ?>">
			<a href="<?php echo $arSection["SECTION_PAGE_URL"]; ?>">
				<img src="<?php echo $arSection["PICTURE"]["SRC"]; ?>" />
				<span class="gallery-social btn-gal-sm">
					<div class="btn-no-like ajax-like in-bl" data-id="<?php echo $arSection['ID']; ?>"><div class="btn-like-wrap in-bl"><div class="btn-like-ico in-bl"></div></div><div class="like-count in-bl"></div></div><div class="btn-comment in-bl"><div class="btn-like-wrap in-bl"><div class="btn-like-ico in-bl"></div></div><div class="like-count in-bl"><?php echo $arSection['ELEMENT_CNT']; ?></div></div>
				</span>
			</a>
			<span><?php echo $arSection['NAME']; ?></span>
		</div>
	<?php if ($i == 4) {echo '<div class="clearfix"></div>'; $i = 0;} endforeach; ?>
	<?php if ($i < 4) {echo '<div class="clearfix"></div>';} ?>
</div>
