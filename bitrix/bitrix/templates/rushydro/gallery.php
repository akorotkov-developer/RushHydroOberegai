<?php if ($gallery) { ?>
	<?php if (RhdHandler::isAtNews()) {?>
		<div id="gallery">
			<ul>
				<?php foreach ($gallery as $image) { ?>
					<li><?=$image['HTML']?></li>
				<?php } ?>
			</ul>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#gallery img").each(function(){
					$(this).css({marginLeft: (133 - $(this).attr("width"))/2 + 'px'});
					$(this).css({marginTop: (98 - $(this).attr("height"))/2 + 'px'});
				});
			});
		</script>
	<?}else{?>
		<div class="gallery_blocks">
			<?$i=0;?>
			<?php foreach ($gallery as $image) { $i++;?>
				<div class="item<?if($i==3){?> last<?}?>">
					<div class="gal_bl_img"><?=$image['HTML']?></div>
					<?if (!empty($image['DESCRIPTION'])){?>
						<div class="gal_bl_desc"><?=$image['DESCRIPTION']?></div>
					<?}?>
					<?if($image['ORIGINAL_LINK']):?>
						<a href="<?=$image['ORIGINAL_LINK'];?>" class="download" target="_blank">Скачать оригинал</a>
					<?endif;?>
				</div>
				<?if($i==3){?><div class="clear"></div><?$i=0;}?>
			<?php } ?>
			<?if($i<3){?><div class="clear"></div><?}?>
		</div>
	<?}?>
<?php } ?>