<div class="m_ttl"><a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), 'rss/press/news')?>" class="ico_rss"></a><span><?=RhdHandler::isEnglish() ? 'COMPANY NEWS' : 'НОВОСТИ КОМПАНИИ'?></span>&nbsp;&nbsp;&nbsp;<a href="<?=RhdPath::createUrl($newsSiteCode, 'press/news')?>"><?php echo RhdHandler::isEnglish() ? 'All news' : 'Все новости'; ?></a></div>
<div class="m_line"></div>
<div class="m_news" style="margin-bottom:38px;">
    <?php foreach ($localNews as $item) { ?>
        <div class="item">
            <span><?=mb_substr($item['DATE_ACTIVE_FROM'], 0, 5)?></span>
            <a href="<?=$item['URL']?>"><?=$item['~NAME']?></a>
        </div>
    <?php } ?>
</div>
