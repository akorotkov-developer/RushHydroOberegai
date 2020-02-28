<div class="col_rht">
	<?php if (RhdHandler::isEnglish()) { ?>
		<?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath('right.banner.php'),
			Array(),
			Array("MODE"=>"html")
		);?>
		<?/*<p style="margin:-10px 0 10px 5px"><a href="/company_geography/" title="Company geography"><img src="<?=SITE_TEMPLATE_PATH?>/i/map-geography-eng.jpg" alt="Company geography" /></a></p>*/?>
	<?}else{?>
		<?$APPLICATION->IncludeFile(
			$APPLICATION->GetTemplatePath('right.banner.php'),
			Array(),
			Array("MODE"=>"html")
		);?>
	<?}?>
	
	<?if(!RhdHandler::isFilial()){?>
	<div class="h_indexes">
		<?php if (RhdHandler::isEnglish()) { ?>
			<a href="<?=RhdPath::createUrl(RhdHandler::getEnglishSiteCode(), 'investors/investor_tools/')?>" class="quotes">STOCK</a>
			<div class="item act_indx"><i></i><i class="r"></i><span>Shares / ADR</span></div>
			<div class="item"><i></i><i class="r"></i><span>Indexes</span></div>
			<div class="clear"></div>
			<div class="ind_cont">
				<i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
				<div class="ind_val active" id="b_stocks"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex2.aspx?lang=english" /></div>
				<div class="ind_val" id="b_indexes" style="display:none;"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex1.aspx?lang=english" /></div>
			</div>
		<?}else{?>
			<?php if (RhdHandler::isFilial()) { ?>
			<div class="main_new" style="margin-top:30px;">
				<div class="m_ttl"><span>АКЦИИ / АДР РУСГИДРО</span>&nbsp;&nbsp;&nbsp;</div>
				<div class="m_line" style="background-position: 0 -3px;"></div>
			<?php } ?>
			<a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'investors/utilitiesinvestor/')?>" class="quotes">КОТИРОВКИ</a>
			<div class="item act_indx"><i></i><i class="r"></i><span>Акции / АДР</span></div>
			<div class="item"><i></i><i class="r"></i><span>Индексы</span></div>
			<div class="clear"></div>
			<div class="ind_cont">
				<i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
				<div class="ind_val active" id="b_stocks"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex2.aspx?lang=russian" /></div>
				<div class="ind_val" id="b_indexes" style="display:none;"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex1.aspx?lang=russian" /></div>
			</div>
			<?php if (RhdHandler::isFilial()) { ?>
			</div>
			<?php } ?>
		<?}?>
	</div>
	<?}?>
	
	
	<?$APPLICATION->IncludeFile(
		$APPLICATION->GetTemplatePath('right.news.local.php'),
		Array(),
		Array("MODE"=>"html")
	);?>
	
	<?if($_GET['new_design']=='Y'){?>
	<!--
	<div class="rht_links_news">
		<a href="http://www.rushydro.ru/corporate/general-meeting/" style="background:url(/upload/iblock/513/ico_rht_2.gif) 4px center no-repeat;">Общее Собрание акционеров</a>
		<a href="/corporate/board/minutes/" style="background:url(/upload/iblock/7dd/ico_rht_1.gif) 4px center no-repeat;">Решения Совета директоров</a>		
		<a href="/activity/cmp/" style="background:url(/upload/iblock/3e3/pkm.png) 4px center no-repeat;">Программа комплексной модернизации</a>
		<a href="/activity/energetika-dalnego-vostoka/" style="background:url(<?=SITE_TEMPLATE_PATH?>/i/tmp/entw.gif) 4px center no-repeat;">РАЗВИТИЕ ЭНЕРГЕТИКИ ДАЛЬНЕГО<br>ВОСТОКА</a>
		<a href="/investors/disclosure/" style="background:url(<?=SITE_TEMPLATE_PATH?>/i/tmp/open_info.gif) 4px center no-repeat;">РАСКРЫТИЕ ИНФОРМАЦИИ</a>
		<a href="http://www.e-disclosure.ru/portal/company.aspx?id=8580" style="background:url(/upload/iblock/105/gsep.jpg) 4px center no-repeat;">РАСКРЫТИЕ ИНФОРМАЦИИ<br>НА E-DISCLOSURE.RU</a>
		<a href="http://www.ar2016.rushydro.ru" style="background:url(<?=SITE_TEMPLATE_PATH?>/i/tmp/give_order.png) 4px center no-repeat;">ПОДАТЬ ЗАЯВКУ В ПРОГРАММУ ИННОВАЦИОННОГО РАЗВИТИЯ</a>
		<a href="/activity/realizatsiya-neprofilnykh-aktivov/" style="background:url(/upload/iblock/793/aktivi.png) 4px center no-repeat;">Реализация непрофильных<br/> активов</a>		
	</div>		
	-->
	<?php } ?>
	
	<?php if (RhdHandler::isEnglish() && RhdHandler::isAtRoot()) { ?>
		<!--
		<div style="margin:-6px 0 30px;" class="main_new">
			<?$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('main.sitenews.php'),
				compact('importantText', 'siteNews'),
				Array("MODE"=>"html")
			);?>
		</div>
		-->
	<?php } ?>
	
	<?if(RhdHandler::isFilial()){?>
	<div class="h_indexes">
		<?php if (RhdHandler::isEnglish()) { ?>
			<a href="<?=RhdPath::createUrl(RhdHandler::getEnglishSiteCode(), 'investors/investor_tools/')?>" class="quotes">STOCK</a>
			<div class="item act_indx"><i></i><i class="r"></i><span>Shares / ADR</span></div>
			<div class="item"><i></i><i class="r"></i><span>Indexes</span></div>
			<div class="clear"></div>
			<div class="ind_cont">
				<i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
				<div class="ind_val active" id="b_stocks"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex2.aspx?lang=english" /></div>
				<div class="ind_val" id="b_indexes" style="display:none;"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex1.aspx?lang=english" /></div>
			</div>
		<?}else{?>
			<?php if (RhdHandler::isFilial()) { ?>
			<div class="main_new" style="margin-top:30px;">
				<div class="m_ttl"><span>АКЦИИ / АДР РУСГИДРО</span>&nbsp;&nbsp;&nbsp;</div>
				<div class="m_line" style="background-position: 0 -3px;"></div>
			<?php } ?>
			<a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'investors/utilitiesinvestor/')?>" class="quotes">КОТИРОВКИ</a>
			<div class="item act_indx"><i></i><i class="r"></i><span>Акции / АДР</span></div>
			<div class="item"><i></i><i class="r"></i><span>Индексы</span></div>
			<div class="clear"></div>
			<div class="ind_cont">
				<i class="r"></i><i class="l b_l"></i><i class="r b_r"></i>
				<div class="ind_val active" id="b_stocks"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex2.aspx?lang=russian" /></div>
				<div class="ind_val" id="b_indexes" style="display:none;"><img src="http://tools.euroland.com/investortools/ru-hydr/tickerindex1.aspx?lang=russian" /></div>
			</div>
			<?php if (RhdHandler::isFilial()) { ?>
			</div>
			<?php } ?>
		<?}?>
	</div>
	<?}?>
	
	<?php if (!RhdHandler::isEnglish()) {
		if (!RhdHandler::isFilial() || !RhdHandler::isAtRoot()) {
			$APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath('right.filials.php'),
				Array(),
				Array("MODE"=>"html")
			);
		}
		if (!RhdHandler::isMainSite() && RhdHandler::getSiteCode() !== 'mc') {
			if (RhdHandler::isZagaes2() && RhdHandler::isAtRoot()) { ?>
				<div style="margin:20px 0 30px;" class="main_new">
					<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath('main.sitenews.php'),
						compact('importantText', 'siteNews'),
						Array("MODE"=>"html")
					);?>
				</div>
			<?php }
			else {
				$APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath('right.news.global.php'),
					Array(),
					Array("MODE"=>"html")
				);
			}
		}
	}?>	
	
	<?php if(!RhdHandler::isEnglish()) { ?>
	<?if(!RhdHandler::isFilial()){?>
        <?
        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath('right.informer.php'),
            Array(),
            Array("MODE"=>"html")
        );
        ?>
	<?}?>	
	<?}?>	
	
</div>

<div class="clear"></div>