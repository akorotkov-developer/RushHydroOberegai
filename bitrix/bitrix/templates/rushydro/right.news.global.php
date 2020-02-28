<?php
    $newsRssUrl =
        RhdPath::createUrl(
            RhdHandler::isEnglish() ? RhdHandler::getEnglishSiteCode() : RhdHandler::getMainSiteCode(),
            'rss/press/news'
        );

    $newsUrl =
        RhdPath::createUrl(
            RhdHandler::isEnglish() ? RhdHandler::getEnglishSiteCode() : RhdHandler::getMainSiteCode(),
            'press/news'
        );

    $newsLabel = RhdHandler::isEnglish() ? 'RUSHYDRO NEWS' : 'НОВОСТИ РУСГИДРО';
    $allNewsLabel = RhdHandler::isEnglish() ? 'All news' : 'Все новости';
?>
<div class="main_new" style="margin-top:30px;">
    <div class="m_ttl"><a href="<?=$newsRssUrl?>" class="ico_rss"></a><span><?=$newsLabel?></span>&nbsp;&nbsp;&nbsp;<a href="<?=$newsUrl?>"><?=$allNewsLabel?></a></div>
    <div class="m_line" style="background-position:0 -3px;"></div>
    <div class="m_news">
        <?php foreach ($GLOBALS['mainNews']as $item) { ?>
            <div class="item">
                <span><?=mb_substr($item['DATE_ACTIVE_FROM'], 0, 5)?></span>
                <a href="<?=$item['URL']?>"><?=$item['~NAME']?></a>
            </div>
        <?php } ?>
    </div>
</div>
