<div class="main_new news_list">
<?php if (!$hideFilter) { $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath('purchases.filter.php'),
	compact('cat1', 'cat1List', 'cat2', 'cat2List', 'isArchive'),
	Array("MODE"=>"html")
); } ?>
	<div class="m_news">
		<?php foreach ($items as $item) { ?>
			<div class="item<?=!$item['PROPERTY_SHOW_DATE_VALUE'] ? ' no_date' : ''?>">
				<?php if ($item['PROPERTY_SHOW_DATE_VALUE']) { ?><span><?=preg_replace('/(\d+)\.(\d+)\.(\d+).*$/i', '\\1.\\2<br/>\\3', $item['DATE_ACTIVE_FROM'])?></span><?php } ?>
				<a href="<?=$item['URL']?>"><?=$item['~NAME']?></a>
				<br/>
				<div class="purchases_txt"><?=$item['PREVIEW_TEXT']?></div>
			</div>
		<?php } ?>
		<?php if (!$items) { ?>Закупок не найдено.<?php } ?>
	</div>
</div>
<?=$pagination?>