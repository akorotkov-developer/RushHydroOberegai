<div id="footer">
            <div class="b-footer_wrap<?php if (RhdHandler::isEnglish()) { ?> b-footer_eng<?}?>">
                <div class="b-footer_info">
                    <?php /*if (RhdHandler::isEnglish() && RhdHandler::getSiteCode() == RhdHandler::getEnglishSiteCode()) { ?>
                        <a href="http://www.international.rushydro.ru/" style="float:right; position: relative; top: -5px"><img src="<?=SITE_TEMPLATE_PATH?>/i/logos/international.png" alt=""></a>
                    <?php }*/ ?>
                    <?php if (!RhdHandler::isEnglish()) { ?>
                    <div class="b-footer_orphus">
                        Если вы заметили опечатку или неточность,<br/>
                        выделите ошибочный текст и нажмите Ctrl Enter
                        <a href="https://my.rushydro.ru/" class="b-footer_enterlink" target="_blank">Вход для сотрудников РусГидро</a>
                    </div>
                    <?}?>
					
					<?if(!RhdHandler::isFilial()){?>					 
						<?=RhdHandler::getSiteFooter();?>
					<?}?>
					
					<?if(RhdHandler::isFilial()){?>
						<?=RhdHandler::getSiteFooter();?>
                    
						<a href="<?=RhdPath::createUrl(RhdHandler::isEnglish() ? RhdHandler::getEnglishSiteCode() : RhdHandler::getMainSiteCode(), 'legal-notice')?>" style="font-size:0.9em;"><?=RhdHandler::isEnglish() ? 'Legal notice' : 'Уведомление об ответственности и праве интеллектуальной собственности'?></a>
					<?}?>
					
                    <?php if (IS_MOBILE && !RhdHandler::isEnglish()): ?><a href="http://m.rushydro.ru/?force=mobile" class="b-footer_mobile">Мобильная версия</a><?php endif; ?>
                </div>
            </div>
            <?php if (!RhdHandler::isEnglish()) { ?>
            <div class="b-footer_logos">
				<?$APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("logos_footer.php"),
					Array(),
					Array("MODE"=>"text")
				);?>                
            </div>
			<?}?>
			
			<?if(!RhdHandler::isFilial()){?>
			<div class="footer-add-link">
				<script>
				  (function (i,s,o,g,r,a,m) {i['GoogleAnalyticsObject']=r;i[r]=i[r]||function () {
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				  ga('create', 'UA-23121463-1', 'auto');
				  ga('send', 'pageview');

				</script>
				<?php if (RhdHandler::isMainSite() && !RhdHandler::isEnglish() && RhdHandler::getLastSectionId() != 9303) { ?>
					<!--LiveInternet counter-->
					<script type="text/javascript"><!--
						document.write("<a href='http://www.liveinternet.ru/click' "+
						"target=_blank><img src='http://counter.yadro.ru/hit?t45.1;r"+
						escape(document.referrer)+((typeof(screen)=="undefined")?"":
						";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
						screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
						";h"+escape(document.title.substring(0,80))+";"+Math.random()+
						"' alt='' title='LiveInternet' "+
						"border=0 width=31 height=31><\/a>")//--></script>
					<!--/LiveInternet-->
				<?php } ?>
				<?require(__DIR__."/counter-logic.php");?>
				<a class="footer-add-href" href="<?=RhdPath::createUrl(RhdHandler::isEnglish() ? RhdHandler::getEnglishSiteCode() : RhdHandler::getMainSiteCode(), 'legal-notice')?>" style="font-size:0.9em;"><?=RhdHandler::isEnglish() ? 'Legal notice' : 'Уведомление об ответственности и праве интеллектуальной собственности'?></a>
			</div>			
			
        <?}?>
</div>
</div>
    <?php if (!RhdHandler::isEnglish()) { ?>
    <script type="text/javascript" src="/orphus/orphus.js"></script>
    <div id="orphus"></div>
    <?php } ?>
<div class="b-popup" id="popup1">
    <div class="b-popup-content">
<?php if (RhdHandler::isEnglish()): ?>
Your application has been accepted. The answer will be prepared and sent within 20 calendar days.
<?php else: ?>
Ваше обращение принято. Ответ будет подготовлен и отправлен в течение 20 календарных дней.
<? endif; ?>
    <a class="close_popup btn_sbmt" href="/corporate/general-meeting/forthcoming/godovoe-obshchee-sobranie-aktsionerov-pao-rusgidro-gosa-27-iyunya-2018-goda/voprosy-aktsionerov-k-gosa-po-itogam-2017-goda">ok</a>
    </div>
</div>
<script> $(document).ready(function(){    
       // PopUpHide();
    });
    function PopUpShow(){
        $("#popup1").show();
    }
    function PopUpHide(){
        $("#popup1").hide();
    }</script>
</body>
</html>