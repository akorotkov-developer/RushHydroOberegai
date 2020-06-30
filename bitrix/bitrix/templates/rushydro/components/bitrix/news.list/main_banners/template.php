<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php
/*Показываем только пять баннеров*/
$bannerCount = 1;
foreach ($arResult["NEWS_SLIDER"] as $key => $item) {
    if ($bannerCount > 5) {
        unset($arResult["NEWS_SLIDER"][$key]);
    }

    $bannerCount++;
}
?>

<? if ($_REQUEST["test"] != "Y"): ?>
		
        <div id="banners" class="newdesign newdesign1">

            <i></i>
            <? $i = 0; ?>
            <div id="b_nav">

                <? foreach ($arResult["NEWS_SLIDER"] as $arItem): $i++; ?>
                    <a href="" <? if ($i == 1){ ?>class="act"<? } ?>><?= $i; ?></a>
                <? endforeach; ?>

                <? foreach ($arResult["ITEMS"] as $arItem): $i++; ?>
                    <a href="" <? if ($i == 1){ ?>class="act"<? } ?>><?= $i; ?></a>
                <? endforeach; ?>
            </div>
            <? $j = 0; ?>            
            <? foreach ($arResult["NEWS_SLIDER"] as $arItem): $j++; ?>
                <? if ($arItem["PROPERTY_SLIDER_TEXT_VALUE"]): ?>
                    <div id="slide<?=$arItem['ID']?>" class="slide<? if ($j == 1){ ?> act<? } ?>" style="background-image: url(<?= $arItem["SLIDE_PATH"] ?>); <? if ($j == 1){ ?><? } ?>">                        
                        <? if(isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html" class="notextlink"></a>
                        <? endif; ?>						
                        <? if(!isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <div class="text">
                                <div class="date"><span><?=FormatDate("j F Y",MakeTimeStamp($arItem["ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS")); ?></span></div>
                                <div class="title">
                                    <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html">
                                    <?= $arItem["PROPERTY_SLIDER_TEXT_VALUE"] ?>
                                    </a>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
					
                <? else: ?>
                    <div id="slide<?=$arItem['ID']?>" class="slide<? if ($j == 1){ ?> act<? } ?>" style="background-image: url(<?= $arItem["SLIDE_PATH"] ?>); <? if ($j == 1){ ?><? } ?>">
                        <? if(isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html" class="notextlink"></a>
                        <? endif; ?>
                        <? if(!isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <div class="text">
                                <div class="date"><span><?=FormatDate("j F Y",MakeTimeStamp($arItem["ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS"));?></span></div>
                                <div class="title">
                                    <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html">
                                    <?= $arItem["NAME"] ?>
                                    </a>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            <? endforeach; ?>

            <? foreach ($arResult["ITEMS"] as $arItem): $j++; ?>
                <? if ($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                    <img class="slide" <? if ($j == 1){ ?>style="display:block;"<? } ?> src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                         width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                         alt="<?= $arItem["NAME"] ?>" title="<?= $arItem["NAME"] ?>"/>
                <? endif ?>
            <? endforeach; ?>

            
        </div>

		<?php if (RhdHandler::isEnglish()) { ?>
		<div id="banners_eng_btns">
			<a href="/press/photo/"><i></i><span class="ico_photo">PHOTO</span></a><a href="/press/video/"><i></i><span	class="ico_video">VIDEO</span></a>
		</div>
        <?php } ?>   
		
<? endif; ?>	
	
<? if ($_REQUEST["test"] == "Y"): ?>
    <?
    /*echo "<pre>";
    print_r($arResult);
    echo "</pre>";*/
    ?>
        <div id="banners" class="newdesign newdesign2">

            <i></i>
            <? $i = 0; ?>
            <div id="b_nav">

                <? foreach ($arResult["NEWS_SLIDER"] as $arItem): $i++; ?>
                    <a href="" <? if ($i == 1){ ?>class="act"<? } ?>><?= $i; ?></a>
                <? endforeach; ?>

                <? foreach ($arResult["ITEMS"] as $arItem): $i++; ?>
                    <a href="" <? if ($i == 1){ ?>class="act"<? } ?>><?= $i; ?></a>
                <? endforeach; ?>
            </div>
            <? $j = 0; ?>            
            <? foreach ($arResult["NEWS_SLIDER"] as $arItem): $j++; ?>
                <? if ($arItem["PROPERTY_SLIDER_TEXT_VALUE"]): ?>
                    <div id="slide<?=$arItem['ID']?>" class="slide<? if ($j == 1){ ?> act<? } ?>" style="background-image: url(<?= $arItem["SLIDE_PATH"] ?>); <? if ($j == 1){ ?><? } ?>">                        
                        <? if(isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html" class="notextlink"></a>
                        <? endif; ?>						
                        <? if(!isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <div class="text">
                                <div class="date"><span><?=FormatDate("j F Y",MakeTimeStamp($arItem["ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS")); ?></span></div>
                                <div class="title">
                                    <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html">
                                    <?= $arItem["PROPERTY_SLIDER_TEXT_VALUE"] ?>
                                    </a>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
					
                <? else: ?>
                    <div id="slide<?=$arItem['ID']?>" class="slide<? if ($j == 1){ ?> act<? } ?>" style="background-image: url(<?= $arItem["SLIDE_PATH"] ?>); <? if ($j == 1){ ?><? } ?>">
                        <? if(isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html" class="notextlink"></a>
                        <? endif; ?>
                        <? if(!isset($arItem["PROPERTY_IS_PHOTO_VALUE"])) :?>
                            <div class="text">
                                <div class="date"><span><?=FormatDate("j F Y",MakeTimeStamp($arItem["ACTIVE_FROM"], "DD.MM.YYYY HH:MI:SS"));?></span></div>
                                <div class="title">
                                    <a href="http://www.<?if (RhdHandler::isEnglish()) echo "eng."; ?>rushydro.ru/press/news/<?=$arItem["ID"]; ?>.html">
                                    <?= $arItem["NAME"] ?>
                                    </a>
                                </div>
                            </div>
                        <? endif; ?>
                    </div>
                <? endif; ?>
            <? endforeach; ?>

            <? foreach ($arResult["ITEMS"] as $arItem): $j++; ?>
                <? if ($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                    <img class="slide" <? if ($j == 1){ ?>style="display:block;"<? } ?> src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                         width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                         alt="<?= $arItem["NAME"] ?>" title="<?= $arItem["NAME"] ?>"/>
                <? endif ?>
            <? endforeach; ?>

            
        </div>

		<?php if (RhdHandler::isEnglish()) { ?>
		<div id="banners_eng_btns">
			<a href="/press/photo/"><i></i><span class="ico_photo">PHOTO</span></a><a href="/press/video/"><i></i><span	class="ico_video">VIDEO</span></a>
		</div>
        <?php } ?>    
	
<? endif; ?>
