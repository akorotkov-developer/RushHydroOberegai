<?$APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('main.banner.php'),
	Array(),
	Array("MODE"=>"html")
);?>
<div class="cont_wrap">
	<div class="bl_main main_new">
		<div class="lft_cont" <?if(RhdHandler::isEnglish()){?>style="float: left; width:322px"<?}?>>
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('main.news.global.php'),
				compact('globalNews'),
				Array("MODE"=>"html")
			);?>
		</div>
		
		<?if(RhdHandler::isFilial()){?>
		<div class="rht_cont">			
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('main.important.php'),
				Array("MODE"=>"html")
			);?>			
		</div>
		<?}?>
		
		<?php if (RhdHandler::isEnglish()) { ?>
		<div class="rht_cont">			
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('main.important_eng.php'),
				Array("MODE"=>"html")
			);?>			
		</div>
		<?}?>
		
		<div class="clear"></div>
		<?php if (!RhdHandler::isEnglish()) { ?>
			<div class="lft_cont">
				<?$APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath('main.news.filials.php'),
					compact('globalNews', 'filialNews'),
					Array("MODE"=>"html")
				);?>
			</div>
		<?php } ?>
		
		<?if(RhdHandler::isFilial()){?>
		<div class="rht_cont">
			<?php if (!RhdHandler::isEnglish()) { ?>
				<?$APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath('main.sitenews.php'),
					compact('importantText', 'siteNews'),
					Array("MODE"=>"html")
				);?>
			<?php } ?>
		</div>
		<?php } ?>
		
	</div>
</div>