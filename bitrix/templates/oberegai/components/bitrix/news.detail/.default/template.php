<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-detail list-material">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<div class="m-date"><?=mb_strtolower($arResult["DISPLAY_ACTIVE_FROM"])?></div>
	<?endif;?>
	<?echo $arResult["DETAIL_TEXT"];?>

	<div style="clear:both"	></div>

	<?if ($arResult["DISPLAY_PROPERTIES"]["PHOTO"]){?>
		<a name="gallery"></a>
		<div class="gallery">
		<?
		$arResult["PROPERTIES"]["PHOTO"]["VALUE"] = is_array($arResult["PROPERTIES"]["PHOTO"]["VALUE"]) ? $arResult["PROPERTIES"]["PHOTO"]["VALUE"] : array($arResult["PROPERTIES"]["PHOTO"]["VALUE"]);
		$i = 0;
		foreach($arResult["PROPERTIES"]["PHOTO"]["VALUE"] as $idPhoto){$i++;?>
		<div class="item<?if ($i == 1){?> first<?}?>">
		<?
			$rsFile = CFile::GetByID($idPhoto);
			$arFile = $rsFile->Fetch();
			$arrImages = $arFile;	
			$fileBig = CFile::ResizeImageGet($idPhoto, array('width'=>1200, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$file = CFile::ResizeImageGet($idPhoto, array('width'=>200, 'height'=>350), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			/*if ($arResult["ID"] == 2416)*/ $styleItem = 'style="height: auto;"';
			echo '<a href="'.$fileBig["src"].'" rel="prettyPhoto[gallery]" title="'.$arrImages["DESCRIPTION"].'" '.$styleItem.'><img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" /></a>';
			if (!empty($arrImages["DESCRIPTION"]))
				echo '<span>'.$arrImages["DESCRIPTION"].'</span>';
		?>
		</div>
		<?
			if ($i == 4) {echo '<div class="clearfix"></div>'; $i = 0;}
		}
		if ($i < 4) {echo '<div class="clearfix"></div>';}
		?>
		</div>
	<?}?>
	<?if ($arResult["DISPLAY_PROPERTIES"]["VIDEO"]){?>
		<br/>
		<br/>
		<?
		$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"] = isset($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"][0]) ? $arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"] : array($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"]);
		$i = 0;
		foreach($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"] as $idVideo){$i++;?>
			<h3><?=$idVideo["DESCRIPTION"]?></h3>
			<div style="height:350px;"><div id="videoplayer-<?=$i?>"></div></div>
			<script type="text/javascript">
				var flashvars = {
					"uid":"videoplayer-<?=$i?>",
					"st":"/player/styles.txt",
					"file":"<?=$idVideo["SRC"]?>"
				};
				var params = {
					wmode:"transparent", 
					allowFullScreen:"true", 
					allowScriptAccess:"always",
					id:"videoplayer-<?=$i?>"
				}; 
				new swfobject.embedSWF(
					"/player/uppod.swf",
					"videoplayer-<?=$i?>",
					"620",
					"350",
					"9.0.115.0",
					false,
					flashvars,
					params
				);
			</script>	
			<noscript>		
				<object width="620" height="350">
					<param name="allowFullScreen" value="true" />
					<param name="allowScriptAccess" value="always" />
					<param name="wmode" value="transparent" />
					<param name="movie" value="/player/uppod.swf" />
					<param name="flashvars" value="st=/player/styles.txt&amp;file=<?=$idVideo["SRC"]?>" />
					<embed src="/player/uppod.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" flashvars="st=/player/styles.txt&amp;file=<?=$idVideo["SRC"]?>" width="620" height="350"></embed>
				</object>
			</noscript>
			<br/>
			<br/>
			<br/>
		<?}?>
	<?}?>
</div>
