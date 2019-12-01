<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?echo $arResult["DETAIL_TEXT"];?>

<?if ($arResult["DISPLAY_PROPERTIES"]["PHOTO"]){?>
	<div class="gallery gallery-det-team">
	<h3>Фотогалерея</h3>
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
		$file = CFile::ResizeImageGet($idPhoto, array('width'=>220, 'height'=>150), BX_RESIZE_IMAGE_PROPORTIONAL, true); 
		echo '<a href="'.$fileBig["src"].'" rel="prettyPhoto[gallery]" title="'.$arrImages["DESCRIPTION"].'"><img src="'.$file['src'].'" width="'.$file['width'].'" height="'.$file['height'].'" /></a>';
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
	<?
	$arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"] = isset($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"][0]) ? $arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"] : array($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"]);
	$i = 0;
	foreach($arResult["DISPLAY_PROPERTIES"]["VIDEO"]["FILE_VALUE"] as $idVideo){$i++;?>
		<?if ($i>1) {?>
		<br/>
		<br/>
		<br/>
		<?}?>
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
				"/player/uppod.swf?1",
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
	<?}?>
<?}?>

<?if ($arResult["DISPLAY_PROPERTIES"]["LOGO"]){?>
	<br/>
	<h3>Сайт региона</h3>
	<a href="<?=$arResult["DISPLAY_PROPERTIES"]["LOGO"]["DESCRIPTION"]?>" target="_blank"><img src="<?=$arResult["DISPLAY_PROPERTIES"]["LOGO"]["FILE_VALUE"]["SRC"]?>" /></a>
<?}?>
<?if ($arResult["DISPLAY_PROPERTIES"]["SITE"]){?>
	<br/>
	<h3>Сайт региона</h3>
	<a class="logo-region" href="<?=$arResult["PROPERTIES"]["SITE"]["VALUE"]?>" target="_blank"><div><?=$arResult["NAME"]?></div></a>
<?}?>