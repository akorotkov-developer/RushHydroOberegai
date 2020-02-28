<div class="m_ttl"><a href="<?=!$useGlobalNews ? RhdPath::createUrl(RhdHandler::getSiteCode(), 'rss/press/news') : RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'rss/press/holding-news')?>" class="ico_rss"></a><span><?=$useGlobalNews ? 'НОВОСТИ ФИЛИАЛОВ И ДЗО' : (RhdHandler::isDZO() ? 'НОВОСТИ КОМПАНИИ' : 'НОВОСТИ КОМПАНИИ')?></span>&nbsp;&nbsp;&nbsp;<a href="<?=$useGlobalNews ? RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'press/holding-news') : RhdPath::createUrl($newsSiteCode, 'press/news')?>">Все новости</a></div>
<div class="m_line"></div>
<div class="m_news" style="margin-bottom:38px;">
	<?php foreach ($localNews as $item) { ?>
		<div class="item">
			<span><?=mb_substr($item['DATE_ACTIVE_FROM'], 0, 5)?></span>
			<a href="<?=$item['URL']?>"><?=$item['~NAME']?></a>
		</div>
	<?php } ?>
</div>