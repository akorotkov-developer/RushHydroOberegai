<div class="zak_mtr">
	<div class="mtr_head"><?=RhdHandler::getLastSectionCode() === 'mtr' ? 'Тип продажи' : 'Вид закупки'?></div>
	<script type="text/javascript">
		$(document).ready(function(){
			var overSel = false;
			$("div.sel_purchases .inp, div.sel_values").hover(
				function(){
					overSel = true;
				},
				function(){
					overSel = false;
				}
			);
			$("div.sel_purchases .inp").click(function(){
				$("div.sel_purchases div.sel_values.open").fadeOut(300).removeClass("open").parent().css("z-index","1");
				$(this).next().fadeIn(300).addClass("open").parent().css("z-index","10");
				$('.fil_scroll').jScrollPane({showArrows:true, speed: 113});
			});
			
			$(document).click(function(){
				if (!overSel)
					$("div.sel_purchases div.sel_values").css("display","none");
			});
			
			$('.sel_values .item').click(function() { 
				location.href="<?=RhdHandler::getCurrentPath()?>?"+$(this).attr("value"); 
				$("div.sel_purchases div.sel_values.open").css("display","none");
				var txtSel = $(this).text();
				$(this).parents("div.sel_purchases").find("div.inp div").text(txtSel);
			});
		});
	</script>
	<div class="sel_purchases">
		<div class="inp"><span></span><i></i><div><?if (!empty($_GET['cat1'])){echo $cat1List[$_GET['cat1']];}else{?>Все типы<?}?></div></div>
		<div class="sel_values">
			<i></i><i class="rht"></i>
			<div class="cont">
				<div style="height:<?if (count($cat1List) > 7){?>200<?}else{?><?=count($cat1List)*40 + 20?><?}?>px" class="fil_scroll">
					<div class="item" value="<?='cat1=&cat2='.$cat2.($isArchive ? '&archive=1' : '')?>" style="margin-top:-15px;">Все типы</div>
					<?php foreach ($cat1List as $catCode => $catName) { ?>
						<div class="item<?=$cat1==$catCode ? ' act' : ''?>" value="<?='cat1='.$catCode.'&cat2='.$cat2.($isArchive ? '&archive=1' : '')?>"><?=$catName?></div>
					<?php } ?>
				</div>
			</div>
			<i class="btm"></i><i class="rht_btm rht"></i>
		</div>
	</div>
	<?/*<select class="cat_selector">
		<option value="<?='cat1=&cat2='.$cat2.(isset($isArchive) && $isArchive ? '&archive=1' : '')?>">Все типы</option>
		<?php foreach ($cat1List as $catCode => $catName) { ?>
			<option value="<?='cat1='.$catCode.'&cat2='.$cat2.(!isset($isArchive) || $isArchive ? '' : '&archive=1')?>" <?=$cat1==$catCode ? 'selected' : ''?>><?=$catName?></option>
		<?php } ?>
	</select>*/?>
	<div class="mtr_head">Организация</div>
	<div class="sel_purchases">
		<div class="inp"><span></span><i></i><div><?if (!empty($_GET['cat2'])){echo $cat2List[$_GET['cat2']];}else{?>Все организации<?}?></div></div>
		<div class="sel_values">
			<i></i><i class="rht"></i>
			<div class="cont">
				<div style="height:200px" class="fil_scroll">
					<div class="item" value="<?='cat1='.$cat1.'&cat2='.($isArchive ? '&archive=1' : '')?>" style="margin-top:-15px;">Все организации</div>
					<?php foreach ($cat2List as $catCode => $catName) { ?>
						<div class="item<?=$cat2==$catCode ? ' act' : ''?>" value="<?='cat1='.$cat1.'&cat2='.$catCode.($isArchive ? '&archive=1' : '')?>"><?=$catName?></div>
					<?php } ?>
				</div>
			</div>
			<i class="btm"></i><i class="rht_btm rht"></i>
		</div>
	</div>
	<?/*<select class="cat_selector">
		<option value="<?='cat1='.$cat1.'&cat2='.($isArchive ? '&archive=1' : '')?>">Все организации</option>
		<?php foreach ($cat2List as $catCode => $catName) { ?>
			<option value="<?='cat1='.$cat1.'&cat2='.$catCode.(isset($isArchive) && $isArchive ? '&archive=1' : '')?>" <?=$cat2==$catCode ? 'selected' : ''?>><?=$catName?></option>
		<?php } ?>
	</select>*/?>
</div>