<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><!DOCTYPE html>
<?php require_once __DIR__.'/header_common.php'; ?>
<body class="<?php echo $versionClient;?><?php if (RhdHandler::isEnglish()) { ?> version_eng<?php } ?>">
    <?$APPLICATION->ShowPanel();?>

    <div id="wrap">
        <div id="header" style="height:182px">
            <?php if (RhdHandler::isAtRoot()) { ?>
                <div class="logo_flash">
                    <div id="logo-f"></div>
                    <script type="text/javascript">
                        var params = {wmode:"transparent", allowFullScreen:"false", allowScriptAccess:"sameDomain", id:"logo-f", quality:"high", scale:"scale"};
                        new swfobject.embedSWF("/flash/logo-new.swf", "logo-f", "100", "100", "9.0.115.0", false, false, params);
                    </script>
                </div>
            <?php } ?>
            <?/*<a href="<?=RhdHandler::getSiteRoot()?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/logos/<?=RhdHandler::isSpecialFilial() ? RhdHandler::getTopSectionCode() : RhdHandler::getSiteCode()?>.jpg" class="logo" /></a>*/?>
            <?php if (RhdHandler::isEnglish()) { ?>
                <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode())?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/rushydro_l.png" class="logo" /></a>
            <?php } else {?>
                <a href="<?=RhdPath::createUrl(RhdHandler::getMainSiteCode())?>"><img src="<?=SITE_TEMPLATE_PATH?>/i/289x89_filials.png" class="logo" /></a>
            <?php } ?>

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

            <div class="lang">
                <?php if (RhdHandler::isEnglish()) { ?>
                    <a href="<?=RhdPath::createUrl('international-rus');?>">РУС</a><span>ENG</span>
                <?php } else { ?>
                    <span>РУС</span><a href="<?=RhdPath::createUrl('international-eng');?>">ENG</a>
                <?php } ?>
            </div>

            <div class="info" style="top:55px;">
                <?php if (!RhdHandler::isEnglish()) { ?>
                  <p class="i_txt">Многоканальный телефон</p>
                  <p style="margin-bottom: -7px;" class="i_phone">+7 (800) 333 80 00</p>
                  <p class="i_phone">+7 (495) 122-05-55</p>
                  <p class="i_txt">&laquo;Горячая линия&raquo; для акционеров</p>
                  <p class="i_phone">+7 (800) 555 99 97</p>
                <?php } else { ?>
                  <p class="i_txt">Phone number</p>
                  <p style="margin-bottom: -7px;" class="i_phone">+7 (800) 333 80 00</p>
                  <p class="i_phone">+7 (495) 122-05-55</p>
                  <a href="/form/" class="header-btn-feedback" style="margin-left:0;">Trust line</a>
                <?php } ?>
            </div>
            <div style="clear:right"></div>
            <div class="name_filials">
                <div><a href="<?=RhdHandler::getSiteRoot()?>"><?php if (RhdHandler::isEnglish()) { ?>International<?php } else {?>Интернэшнл<?php } ?></a></div>
            </div>
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
