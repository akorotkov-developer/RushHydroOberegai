<?
require_once $_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/bitrix/php_interface/client-init.php';

$site_dir = 'polovodie';
$news_url = '/' . $site_dir . '/news/';

if ((int)$_REQUEST['element']) {

    $site = RhdHandler::getSite();
    $lastSection = RhdHandler::getLastSection();
    $element = RhdHandler::getElement();
    $siteId = $site['ID'];
    $props = getElementProps($element['IBLOCK_ID'] ?: $siteId, $element['ID']);
    $gallery = createGallery($props);
    ?>
    <section class="news">
        <h3><?=$element['NAME']?></h3>
        <p class="date"><?=FormatDate("d.m.y", MakeTimeStamp($element['DATE_ACTIVE_FROM']))?></p>
        <div class="news-block">
            <?=$element['DETAIL_TEXT']?>

            <div style="margin-top:25px">
                <?php $APPLICATION->IncludeFile(
                    $APPLICATION->GetTemplatePath('gallery.php'),
                    compact('gallery'),
                    Array("MODE"=>"html")
                );?>
            </div>

            <?if(!empty($element['PICTURE'])): ?>

                <div style="margin-top:25px">
                    <div id="gallery">
                        <ul>
                            <?if(is_array($element['PICTURE'])): ?>
                                <?foreach ($element['PICTURE'] as $picId): ?>
                                    <?if(!empty($picId)): ?>
                                        <?$picture = CFile::GetFileArray($picId) ?>
                                        <li><a rel="prettyPhoto[gallery]" href="<?=$picture['SRC']?>" title="<?=$picture['DESCRIPTION'] ?>"><img width="161" height="119" src="<?=$picture['SRC']?>" style="margin-left: -14px; margin-top: -10.5px;"></a></li>
                                    <?endif; ?>
                                <?endforeach; ?>
                            <?endif; ?>
                        </ul>
                    </div>
                </div>
            <?endif; ?>

            <a href="<?=$news_url?>" class="link">Все новости</a>

            <div class="social-likes social-likes-detail" data-counters="no" id="share">
                <div class="social-likes-item facebook" title="Поделиться ссылкой на Фейсбуке">facebook</div>
                <div class="social-likes-item vkontakte" title="Поделиться ссылкой во Вконтакте">вконтакте</div>
                <div class="social-likes-item odnoklassniki" title="Поделиться ссылкой в Одноклассниках">одноклассники</div>
            </div>
            <div class="clear"></div>

        </div>
    </section>
    <?
} else {
    $limit = false;
    if ($_GET['limit']) $limit = $_GET['limit'];
    $limit = intval($limit);

    $arRiverNewsSection = array(
        1 => 1,
        2 => 2,
        3 => 3,
        4 => 4,
        5 => 5,
    );


    $filter = array(
        'ACTIVE' => 'Y',
        array(
            'LOGIC' => 'OR',
            array('SECTION_ID' => 8635),
            array('!PROPERTY_IN_PAVODOK_NEWS' => false),
            array("IBLOCK_ID"=>144)
        ),
    );

    if ($river_id = (int)$_GET['river_id']) {
        $arRiverNews = array(
            1 => array(56,58,55,61,57,62,60),
            2 => array(63),
            3 => array(74,83),
            4 => array(71,73),
            5 => array(65,64,70,69,66),
        );


        if (isset($arRiverNews[$river_id]) && !empty($arRiverNews[$river_id])) {
            if ($river_id == 3) {
                $filter[] = array(
                    'LOGIC' => 'OR',
                    array('IBLOCK_ID' => $arRiverNews[$river_id]),
                    array('SECTION_ID' => 4343),
                    array('IBLOCK_ID'=>144,"SECTION_CODE"=>$arRiverNewsSection[$river_id])
                );
            } else {
                $filter[] = array(
                    'LOGIC' => 'OR',
                    array("IBLOCK_ID"=>  $arRiverNews[$river_id]),
                    array('IBLOCK_ID'=>144,"SECTION_CODE"=>$arRiverNewsSection[$river_id])
                );
            }
        }
    }



    $itemsRs =
        CIBlockElement::GetList(
            array('DATE_ACTIVE_FROM' => 'desc'),
            $filter,
            array('ID', 'NAME'),
            array('nTopCount' => $limit, 'nPageSize' => 10, 'bShowAll' => false),
            array(
                'ID','NAME','CODE','SECTION_ID','DATE_ACTIVE_FROM',
            )
        );
    $items = array();
    $itemsRs->NavStart(0);
    while ($item = $itemsRs->GetNext()) {
        $item['url'] = $news_url.'?id='.$item['ID'];
        $item['date'] = FormatDate("d.m.y", MakeTimeStamp($item['ACTIVE_FROM']));
        $items[$item['ID']] = $item;
    }




    $navStr = $itemsRs->GetPageNavStringEx($navComponentObject, "Страницы:", ".default");

    ?>
    <?if($_GET['block']):?>
        <?if($_GET['new']):?>
            <div class="header-content">
                <h2>новости</h2>
                <a href="<?=$news_url?>">Все новости</a>
            </div>
            <div class="news-block">
                <?foreach($items as $arItem):?>
                    <div class="wrap">
                        <p class="date"><?=$arItem['date']?></p>
                        <p><a href="<?=$arItem['url']?>"><?=$arItem['NAME']?></a></p>
                    </div>
                <?endforeach?>
            </div>
        <?else:?>
            <div class="news-block-wrapper">
                <div class="news-block_title">Новости</div>
                <div class="news-block-list">
                    <?foreach($items as $arItem):?>
                        <div class="wrap">
                            <p class="date"><?=$arItem['date']?></p>
                            <p><a href="<?=$arItem['url']?>"><?=$arItem['NAME']?></a></p>
                        </div>
                    <?endforeach?>
                    <div class="news-block_link"><a href="<?=$news_url?>">Архив новостей</a></div>
                </div>
            </div>
        <?endif?>
    <?else:?>
        <section class="news">
            <h3>Новости</h3>
            <div class="news-block">
                <?foreach($items as $arItem):?>
                    <div class="wrap">
                        <p class="date"><?=$arItem['date']?></p>
                        <p><a href="<?=$arItem['url']?>"><?=$arItem['NAME']?></a></p>
                    </div>
                <?endforeach?>
            </div>
            <div class="page-list">
                <? echo $navStr; ?>
            </div>
        </section>
    <?endif?>
    <?
}
?>



