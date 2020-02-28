<div class="m_ttl"><span><?=RhdHandler::isEnglish() ? 'SITE UPDATES' : 'НОВОЕ НА САЙТЕ'?></span></div>
<div class="m_line" style="background-position:0 <?=RhdHandler::isEnglish() ? '-3px' : '-9px'?>;"></div>
<div class="m_update">
	<?php foreach ($siteNews as $news) { ?>
		<div class="item">
		<i class="<?=$news['PROPERTY_ICON_VALUE']?>"></i>
			<?=$news['PROPERTY_ICONTEXT_VALUE']?> <a href="<?=$news['PROPERTY_LINK_VALUE']?>">&laquo;<?=$news['PROPERTY_LINKTEXT_VALUE']?>&raquo;</a>
		</div>
	<?php } ?>	
	
</div>