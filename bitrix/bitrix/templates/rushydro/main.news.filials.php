<div class="m_ttl"><a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'rss/'.RhdHandler::getFilialNewsPath())?>" class="ico_rss"></a>
	<?if(RhdHandler::isFilial()){?><span>НОВОСТИ ФИЛИАЛОВ И ДО</span><?php } ?>
	<?if(!RhdHandler::isFilial()){?><span>НОВОСТИ ФИЛИАЛОВ И ДОЧЕРНИХ ОБЩЕСТВ</span><?php } ?>
	&nbsp;&nbsp;&nbsp;<a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), RhdHandler::getFilialNewsPath())?>">Все новости</a></div>
<div class="m_line" style="background-position: 0pt -3px;"></div>
<div class="m_news" <?if(RhdHandler::isFilial()){?>style="margin-bottom:38px;"<?php } ?>>
	<?php foreach ($filialNews as $item) { ?>
		<div class="item">
			<span><?=mb_substr($item['DATE_ACTIVE_FROM'], 0, 5)?></span>
			<a href="<?=$item['URL']?>"><?=$item['~NAME']?></a>
		</div>
	<?php } ?>
	
</div>