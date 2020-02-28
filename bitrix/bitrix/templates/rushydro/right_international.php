<div class="col_rht">
    <div class="main_new" style="height:328px;">
        <div class="m_ttl" style="text-transform:uppercase;"><span><?php echo RhdHandler::isEnglish() ? 'Worldwide activities and markets' : 'География RusHydro International'; ?></span>&nbsp;&nbsp;&nbsp;</div>
        <div class="m_line" style="background-position: 100% -3px;"></div>
        <a href="<?php echo RhdHandler::isEnglish() ? '/our-company/worldwide-activities-and-markets/' : '/rus/deyatelnost/geografiya-rusgidro-interneshnl-ag/'; ?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/map-mini-int-<?php echo RhdHandler::isEnglish() ? 'en' : 'ru'; ?>.jpg" alt=""></a>
    </div>
    <div class="h_indexes">
        <?php if (RhdHandler::isEnglish()) { ?>
            <div class="main_new">
                <div class="m_ttl"><span>RUSHYDRO SHARES / ADR</span>&nbsp;&nbsp;&nbsp;</div>
                <div class="m_line" style="background-position: 0 -3px;"></div>

                <a href="<?=RhdPath::createUrl(RhdHandler::getEnglishSiteCode(), 'investors/investor_tools/')?>" class="quotes">STOCK</a>
                <div class="item act_indx"><i></i><i class="r"></i><span>Shares / ADR</span></div>
                <div class="item"><i></i><i class="r"></i><span>Indexes</span></div>
                <div class="clear"></div>
                <div class="ind_cont">
                    <i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
                    <div class="ind_val active" id="b_stocks"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex2.aspx?lang=english" /></div>
                    <div class="ind_val" id="b_indexes" style="display:none;"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex1.aspx?lang=english" /></div>
                </div>
            </div>
            <div class="rht_links_news" style="min-height:1px; margin:15px 0 0 0;">
                <a style="background:url(/upload/icons/ico_rht_4.gif) 4px center no-repeat;" href="http://www.eng.rushydro.ru/investors/reports/">Reports</a>
            </div>
        <?} else {?>
            <div class="main_new">
                <div class="m_ttl"><span>АКЦИИ / АДР РУСГИДРО</span>&nbsp;&nbsp;&nbsp;</div>
                <div class="m_line" style="background-position: 0 -3px;"></div>

                <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'investors/utilitiesinvestor/')?>" class="quotes">КОТИРОВКИ</a>
                <div class="item act_indx"><i></i><i class="r"></i><span>Акции / АДР</span></div>
                <div class="item"><i></i><i class="r"></i><span>Индексы</span></div>
                <div class="clear"></div>
                <div class="ind_cont">
                    <i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
                    <div class="ind_val active" id="b_stocks"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex2.aspx?lang=russian" /></div>
                    <div class="ind_val" id="b_indexes" style="display:none;"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex1.aspx?lang=russian" /></div>
                </div>
            </div>
            <div class="rht_links_news" style="min-height:1px; margin:15px 0 0 0;">
                <a style="background:url(/upload/icons/ico_rht_4.gif) 4px center no-repeat;" href="http://www.ar2014.rushydro.ru">Интерактивный годовой отчет <br>за 2014 год</a>
            </div>
        <?}?>
    </div>
</div>
<div class="clear"></div>
