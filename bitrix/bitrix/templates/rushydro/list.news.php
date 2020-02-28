<script>
	$(function() {
		$("#bar").draggable({containment:'parent', axis:'x'});
	});
</script>
<?php if ($hasMonths) { ?>
	<div id="archive">
		<div class="wrapScroll">
			<div id="yearL"></div>
			<div id="yearR"></div>
			<div class="shw"></div>
			<div class="items">
				<?php foreach ($dates as $year => $monthes) { ?>
					<a class="year <?=($currentDate['year'] === $year ? 'act' : '')?>"><?=$year?></a>
					<div class="month">
						<?php foreach ($monthes as $month) { ?>
							<a class="<?=($currentDate['year'] === $year && $currentDate['month'] === $month ? 'act' : '')?>" href="<?=RhdHandler::getCurrentPath().'?archive='.$year.'-'.$month?>"><?=$monthNames[$month]?></a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="barscroll">
			<div class="bar" id="bar"></div>
		</div>
		<div class="wrapBar">
			<div class="line"></div>
		</div>
	</div>
	<div class="archive_date_head"><?php echo $monthNames[$currentDate['month']].' '.$currentDate['year']; ?></div>
<?php } ?>
<div class="main_new news_list">
	<div class="m_news">
		<?php foreach ($items as $item) { ?>
			<div class="item<?=!$item['PROPERTY_SHOW_DATE_VALUE'] ? ' no_date' : ''?>">
				<?php if ($item['PROPERTY_SHOW_DATE_VALUE']) { ?><span><?=mb_substr($item['DATE_ACTIVE_FROM'], 0, 5)?></span><?php } ?>
				<a href="<?=$item['URL']?>"><?=parseTitle($item['~NAME'])?></a>
			</div>
		<?php } ?>
	</div>
</div>
