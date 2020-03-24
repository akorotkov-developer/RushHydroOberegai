<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><!DOCTYPE html>
<?php require_once __DIR__.'/header_common.php'; ?>
<body class="
	<?php echo $versionClient;?>
	<?php if (RhdHandler::isEnglish()) { ?><?php } ?>
    <?php echo $grayClass; ?>
	"
	>
	<!--version_eng-->
    <?$APPLICATION->ShowPanel();?>

    <div id="wrap">
        <div id="header"<?php if (RhdHandler::isFilial()) { ?> style="height:182px"<?}?>>

            <?php if (!RhdHandler::isFilial() && RhdHandler::isAtRoot()) { ?>
				<!--
                <div class="logo_flash">
                    <div id="logo-f"></div>
                    <script type="text/javascript">
                        var params = {wmode:"transparent", allowFullScreen:"false", allowScriptAccess:"sameDomain", id:"logo-f", quality:"high", scale:"scale"};
                        new swfobject.embedSWF("/flash/logo-new.swf", "logo-f", "100", "100", "9.0.115.0", false, false, params);
                    </script>
                </div>
				-->
            <?php } ?>

            <?/*<a href="<?=RhdHandler::getSiteRoot()?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/logos/<?=RhdHandler::isSpecialFilial() ? RhdHandler::getTopSectionCode() : RhdHandler::getSiteCode()?>.jpg" class="logo" /></a>*/?>
            <?php if (RhdHandler::isEnglish()) { ?>
                <a href="<?=RhdPath::createUrl(RhdHandler::getEnglishSiteCode())?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/rushydro_l.png" class="logo" /></a>
            <?php } else if(RhdHandler::isDZO()){?>
                <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode())?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/289x89_filials.png" class="logo" /></a>
            <?php } else if(RhdHandler::isFilial()){?>
                <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode())?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/289x89.png" class="logo" width="289" height="89" /></a>
            <?php } else {?>
                <?if ($_GET["tst"] == "tst") {?>
                    <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode())?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/logo-main_new.png" class="logo" width="224" height="71" /></a>
                <?} else {?>
                    <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode())?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/logo-main_new.png" class="logo logo-new" width="224" height="71" /></a>
                <?}?>
            <?php }?>

            <div class="icons">
                <a href="<?=RhdHandler::getSiteRoot()?>"></a>
                <a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), 'sitemap')?>" class="i_2"></a>
                <?php

                        $feedbackUrls = array('company/feedback', 'company/general/', 'branch/general/');
                        $feedbackFound = false;

                        foreach ($feedbackUrls as $url) {
                            try {
                                RhdPath::resolvePath(RhdHandler::getSite(), $url);
                                $feedbackFound = true;
                                break;
                            } catch (RhdNotFoundException $e) {}
                        }

                        if ($feedbackFound) { ?><a href="<?=RhdPath::createUrl(RhdHandler::getSiteCode(), $url)?>" class="i_3"></a><?php }
                ?>

            </div>
            <?php if (RhdHandler::isEnglish() || RhdHandler::isMainSite()) { ?>
                <?php
                    if ($linkedSection = RhdHandler::getSectionLink()) {
                        $url =
                            RhdPath::createUrl(
                                RhdHandler::isEnglish()
                                    ? RhdHandler::getMainSiteCode()
                                    : RhdHandler::getEnglishSiteCode(),
                                RhdPath::build($linkedSection)
                            );
                    } else {
                        $url =
                            RhdHandler::isEnglish()
                                ? RhdPath::createUrl(RhdHandler::getMainSiteCode())
                                : RhdPath::createUrl(RhdHandler::getEnglishSiteCode());
                    }

                    /*$url =
                            RhdHandler::isEnglish()
                                ? RhdPath::createUrl(RhdHandler::getMainSiteCode())
                                : RhdPath::createUrl(RhdHandler::getEnglishSiteCode());*/
                if ($APPLICATION->GetCurPage() == "/corporate/general-meeting/forthcoming/subscribe/") {
                    $url .= "corporate/general-meeting/forthcoming/subscribe";
                } elseif ($APPLICATION->GetCurPage() == "/corporate/general-meeting/forthcoming/subscribe") {
                    $url .= "corporate/general-meeting/forthcoming/subscribe/";
                }
                ?>
                <?if ($_GET["tst"] == "tst") {?>
                    <div class="lang">
                <?} else {?>
                    <div class="lang lang-new">
                <?}?>
                    <?php if (RhdHandler::isEnglish()) { ?>
                        <a href="<?=$url?>">РУС</a><span>ENG</span>
                    <?php } else { ?>
                        <span>РУС</span><a href="<?=$url?>">ENG</a>
                    <?php } ?>
                </div>
            <?}?>

			<?if(!RhdHandler::isFilial()){?>
                <?if ($_GET["tst"] == "tst") {?>
                    <div class="header-sitemap "><a href="/sitemap"></a></div>
			    <?} else {?>
                    <div class="header-sitemap header-sitemap-new"><a href="/sitemap"></a></div>
                <?}?>
			<?}?>

            <?php if (!RhdHandler::isEnglish()) { ?>
                <?if ($_GET["tst"] == "tst") {?>
                    <div id="buttons_link">
                <?} else {?>
                    <div id="buttons_link" class="buttons_link-new">
                <?}?>
                    <!--<a href="http://zakupki.rushydro.ru/" target="_blank" class="header-btn-purchases">Закупки</a>-->
                    <!--<a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'form')?>" class="header-btn-feedback">Линия доверия</a>-->
                   <div class="header-social">
		                <?
		                $fb = 'https://www.facebook.com/rushydro/';
		                $in = 'https://instagram.com/rushydro/';
		                $vk = 'https://vk.com/paorushydro';
		                switch ( RhdHandler::getSiteCode() ) {
			                case 'burges':
				                $fb = 'https://www.facebook.com/burges.rushydro/';
				                $in = 'https://www.instagram.com/burges.rushydro/';
				                break;
			                case 'zges':
				                $fb = 'https://www.facebook.com/zeyskayages/';
				                $in = 'https://www.instagram.com/zeyskayages/';
				                break;
			                case 'volges':
				                $fb = 'https://www.facebook.com/Волжская-ГЭСпаводок2018-1580889888625266/';
				                break;
			                case 'votges':
				                $fb = 'https://www.facebook.com/VotGES/';
				                $in = 'https://www.instagram.com/votkinskajages/';
				                break;
			                case 'dagestan':
				                $fb = 'https://www.facebook.com/%D0%94%D0%B0%D0%B3%D0%B5%D1%81%D1%82%D0%B0%D0%BD%D1%81%D0%BA%D0%B8%D0%B9-%D0%A4%D0%B8%D0%BB%D0%B8%D0%B0%D0%BB-%D0%A0%D1%83%D1%81%D0%93%D0%B8%D0%B4%D1%80%D0%BE-194907167818775/';
				                $in = 'https://www.instagram.com/rushydro_dagestan';
				                break;
			                case 'zhiges':
				                $fb = 'https://www.facebook.com/zhigespavodok2018/';
				                $vk = 'https://vk.com/zhigespavodok2018';
				                break;
			                case 'zagaes':
				                $in = 'https://www.instagram.com/zagorskayagaes';
				                $vk = 'https://vk.com/zagorskayagaes';
				                break;
			                case 'kbf':
				                $in = 'https://www.instagram.com/rushydrokbr/';
				                break;
			                case 'kchf':
				                $in = 'https://www.instagram.com/karachaevo_cherkesia_rushydro/';
				                break;
			                case 'kamges':
				                $vk = 'https://vk.com/kamskayages';
				                break;
			                case 'kvvges':
				                $fb = 'https://www.facebook.com/KVVGES.pavodok2018/';
				                break;
			                case 'korung':
				                $in = 'https://www.instagram.com/korung.rushydro/';
				                break;
			                case 'nizhges':
				                $vk = 'https://vk.com/public163536251';
				                break;
			                case 'nges':
				                $fb = 'https://www.facebook.com/Новосибирская-ГЭС-паводок2018-948561725307719/';
				                break;
			                case 'sarges':
				                $fb = 'https://www.facebook.com/SaratovGES.pavodok2018/';
				                $vk = 'https://vk.com/sarges.pavodok2018';
				                break;
			                case 'sshges':
				                $in = 'https://www.instagram.com/sayanoshushenskayages/';
				                break;
			                case 'osetia':
				                $in = 'https://www.instagram.com/rushydro_ossetia/';
				                break;
			                case 'cheges':
				                $fb = 'https://www.facebook.com/cheboksarskaiaGES/';
				                $in = 'https://www.instagram.com/cheboksarskaiages/';
				                break;
			                case 'geotherm':
				                $fb = 'https://www.facebook.com/Geotherm1/';
				                break;
			                case 'kolymaenergo':
				                $fb = 'https://www.facebook.com/Kolymaenergo/';
				                $in = 'https://www.instagram.com/kolymaenergo/';
				                break;
			                case 'vniig':
				                $fb = 'https://www.facebook.com/VNIIG/';
				                $vk = 'https://vk.com/vniig';
				                break;
		                }
		                ?>
                        <a href="<?= $fb ?>" target="_blank" class="header-social-ico"></a>
                        <a href="<?= $in ?>" target="_blank" class="header-social-ico header-social-ico__insta"></a>
                        <a href="<?= $vk ?>" target="_blank" class="header-social-ico header-social-ico__vk"></a>
                    </div>
                </div>
            <?php } ?>


            <?if ($_GET["tst"] == "tst") {?>
                <div class="info" style="<?php if(RhdHandler::isFilial()){?>top:25px;<?}?><?php if(RhdHandler::isEnglish()){?>top:10px;<?}?> ">
            <?} else {?>
                <?if (RhdHandler::isMainSite()) {?>
                    <div class="info new-info new-info2" style="<?php if(RhdHandler::isFilial()){?>top:25px;<?}?><?php if(RhdHandler::isEnglish()){?>top:10px;<?}?> ">
                <?} else {?>
                    <div class="info new-info" style="<?php if(RhdHandler::isFilial()){?>top:25px;<?}?><?php if(RhdHandler::isEnglish()){?>top:10px;<?}?> ">
                <?}?>
            <?}?>
                <?php if (!RhdHandler::isEnglish()) { ?>
                  <?if ($_GET["tst"] == "tst") {?>
                        <p class="i_txt">Многоканальный телефон</p>
                        <p style="margin-bottom: -7px;" class="i_phone">+7 (800) 333 80 00</p>
                        <p class="i_phone ">+7 (495) 122-05-55</p>
                        <div class="info-left">
                            <p class="i_txt">&laquo;Горячая линия&raquo; для акционеров</p>
                            <p class="i_phone">8 (800) 200 61 12</p>
                            <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'form')?>" class="header-btn-feedback">Линия доверия</a>
                        </div>
                        <div class="info-left">
                            <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'form')?>" class="header-btn-feedback">Линия доверия</a>
                        </div>
				  <?} else {?>
                        <p class="i_txt">Многоканальный телефон</p>
                        <p style="margin-bottom: -7px;" class="i_phone i_phone-new">+7 800 333 80 00</p>
                        <p class="i_phone i_phone-new">+7 495 122-05-55</p>
                        <p class="i_txt">&laquo;Горячая линия&raquo; для акционеров</p>
                        <p class="i_phone i_phone-new">+7 800 200 61 12</p>
                        <?if(!RhdHandler::isFilial()) {?>
                            <div class="info-left new-info-left">
                                <p class="i_txt">&laquo;Горячая линия&raquo; для работников РусГидро по<br> вопросам противодействия распространению<br> коронавируса</p>
                                <p class="i_phone i_phone-new">+7 800 333 80 00</p>
                                <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'form')?>" class="header-btn-feedback">Линия доверия</a>
                            </div>
                        <?}?>
				  <?}?>
                <?php } else { ?>

                  <p class="i_txt">Phone number</p>
                  <p style="margin-bottom: -7px;" class="i_phone">+7 (800) 333 80 00</p>
                  <p class="i_phone">+7 (495) 122-05-55</p>
				  <a href="/form/" class="header-btn-feedback">Trust line</a>
                  <div class="info-left">
					<!--
					<p class="i_txt">&laquo;Hot line&raquo; for shareholders</p>
					<p class="i_phone">8 (800) 200 61 12</p>
					-->

				  </div>

                <?php } ?>
            </div>
            <?php if (RhdHandler::isFilial()) { ?>
                <div style="clear:right"></div>
                <div class="name_filials">
                    <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode())?>" class="link_main">www.rushydro.ru</a>
                    <div><a href="<?=RhdHandler::getSiteRoot()?>"><?=RhdHandler::getSiteName()?></a></div>
                </div>
                <?if(in_array(RhdHandler::getSiteCode(), array('geotherm'))):?>
                <a href="http://cabinet.<?=RhdHandler::getSiteCode()?>.rushydro.ru/" class="header-btn-lk">Личный кабинет</a>
                <?endif;?>
            <?php } ?>
            <?$APPLICATION->IncludeComponent("rushydro:search.form", "", Array(
                    "PAGE"  =>  RhdHandler::getSiteRoot().'search/',
                )
            );?>
        </div>

        <div id="menu">
            <?$APPLICATION->IncludeFile(
                $APPLICATION->GetTemplatePath("menu.php"),
                Array(),
                Array("MODE"=>"html")
            );?>
        </div>

        <div id="content">
            <table cellspacing="0" cellpadding="0" width="100%">
                <tr>
                    <td style="vertical-align:top; width:100%;">
                        <div class="col_lft<?if (!RhdHandler::isAtRoot()) {?> cont_wrap_det<?}?>">
                        <?if (!RhdHandler::isAtRoot()) {?>
                            <?$APPLICATION->IncludeFile(
                                $APPLICATION->GetTemplatePath("breadcrumbs.php"),
                                Array(),
                                Array("MODE"=>"html")
                            );?>
                        <?}?>

                            <?
                            $arGroups = CUser::GetUserGroup($USER->GetID());
                            $isGroup = in_array(14, $arGroups);
                            if (!$isGroup) $isGroup = in_array(1, $arGroups);
                            if (!$isGroup) {
                            ?>
                                <!--<script>
                                    $( document ).ready(function() {
                                        $( ".menu_lvl_last_wrap a" ).each(function( index ) {
                                            console.log( index + ": " + $( this ).text() );
                                            if ($(this).text() == "Благотворительность и волонтерство") {
                                                $(this).hide();
                                            }
                                        });
                                    });
                                </script>-->
                            <?}?>