<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult)):?>
<div id="menu-wrap">
	<div id="menu">
		<table width="100%" height="62">
			<tr>
				<?
				$i=0;
				foreach($arResult as $arItem):
					$i++;
					if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
						continue;
				?>
						<td<?if($i==1):?> class="first"<?endif?>>
							<a href="<?=$arItem["LINK"]?>" class="<?if($arItem["PARAMS"]["class"]):?><?=$arItem["PARAMS"]["class"]?> <?endif?><?if($arItem["SELECTED"]):?>act<?endif?>">
							<span><?=$arItem["TEXT"]?></span>
								<i class="r"></i><i class="l"></i>
							</a>
						</td>
				<?endforeach?>
			</tr>
		</table>
	</div>
</div>
<?endif?>