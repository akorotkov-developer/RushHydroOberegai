<?php

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$site = RhdHandler::getSite();
$lastSection = RhdHandler::getLastSection();
$langKey = RhdHandler::isEnglish() ? 'en' : 'ru';
if ($lastSection['ID'] == 9303) {
    $file = __DIR__.'/../../svedeniya-o-dokhodakh-password';
    $sessionFile = __DIR__.'/../../svedeniya-o-dokhodakh-session';
    $session = file_get_contents($sessionFile);
    if (!isset($_COOKIE['__auth_']) || $_COOKIE['__auth_'] !== $session) {
        $password = file_get_contents($file);
        if (
            !isset($_SERVER['PHP_AUTH_USER'])
            || !isset($_SERVER['PHP_AUTH_PW'])
            || $_SERVER['PHP_AUTH_USER'].':'.$_SERVER['PHP_AUTH_PW'] !== 'admin:'.$password
        ) {
            header('HTTP/1.0 401 Unauthorized');
            header('WWW-Authenticate: Basic realm="RusHydro"');
            $APPLICATION->RestartBuffer();
            die();
        }

        $session = md5(time().rand());
        file_put_contents($sessionFile, $session);
        setcookie('__auth_', $session);
        $password = substr(md5(time().time().rand()), 0, rand(10, 25));
        file_put_contents($file, $password);
        mail('svl@rushydro.ru', 'Сведения о доходах', 'Новый пароль: '.$password.' (IP: '.$_SERVER['REMOTE_ADDR'].')', 'From: РусГидро <noreply@rushydro.ru>');
    }
}

$iblockId = $site['ID'];
if (RhdHandler::isPurchases()) {
    $iblockId = RhdHandler::getPurchasesIBlockId();
}

if (strpos(RhdHandler::getJustPath(), 'vestnik') !== false) {
  $iblockId = RhdHandler::getMainSiteId();
}
?><h1 class="header_doc header_doc_nomargin"><?=strpos($lastSection['NAME'], 'href') ? strip_tags(html_entity_decode($lastSection['NAME'])) : $lastSection['NAME']?></h1>
<div class="clear"></div><?php

if ($lastSection['UF_NEED_DISCLAIMER']) { $type = in_array($lastSection['UF_DISCLAIMER_TYPE'], array('5', '7')) ? 'type2' : 'type1'; ?>
<div id="disclaimer1">
    <div align="justify">
        <?php echo $disclaimers[$langKey][$type][0]['text']; ?>
        <div style="padding-left:150px;">
            <div class="btn_sbmt"><i></i><span><?php echo $disclaimers[$langKey][$type][0]['accept']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$type][0]['accept']; ?>" onClick="$('#disclaimer1').hide();$('#disclaimer2').show();"></div>
            <div class="btn_sbmt" style="margin-left:20px;"><i></i><span><?php echo $disclaimers[$langKey][$type][0]['cancel']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$type][0]['cancel']; ?>" onClick="window.location='/'"></div>
        </div>
    </div>
    <br/>
    <br/>
</div>

<div id="disclaimer2" style="display:none">
        <div align="justify">
            <?php echo $disclaimers[$langKey][$type][1]['text']; ?>
            <div style="padding-left:230px;">
                <div class="btn_sbmt"><i></i><span><?php echo $disclaimers[$langKey][$type][1]['accept']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$type][1]['accept']; ?>" onClick="$('#disclaimer2').hide();$('#disclaimer_content').show(); $('body, html').animate({scrollTop: 100}, 300);"></div>
                <div class="btn_sbmt" style="margin-left:20px;"><i></i><span><?php echo $disclaimers[$langKey][$type][1]['cancel']; ?></span><input type="button" value="<?php echo $disclaimers[$langKey][$type][1]['cancel']; ?>" onClick="window.location='/'"></div>
            </div>
        </div>
    <br/>
    <br/>
</div><?php
}

if ($lastSection['UF_NEED_DISCLAIMER'])
    echo '<div id="disclaimer_content" style="display:none">';

?><?php
/*if (RhdHandler::getJustPath() === 'investors/disclosure/securities/2012-2013/') {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('calculator.php'),
        compact('gallery'),
        Array("MODE"=>"html")
    );
}*/

if (
    RhdHandler::getJustPath() === 'investors/informatsiya-ob-oferte-aktsioneram-rao-es-vostoka/calculator/'
    || RhdHandler::getJustPath() === 'investors/calculator/'
) {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('calculator_vostok.php'),
        compact('gallery'),
        Array("MODE"=>"html")
    );
}


if (
    RhdHandler::getJustPath() === 'corporate/general-meeting/forthcoming/godovoe-obshchee-sobranie-aktsionerov-pao-rusgidro-gosa-27-iyunya-2018-goda/voprosy-aktsionerov-k-gosa-po-itogam-2017-goda/'
) {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('form_closed_2017.php'),
        array(),
        Array("MODE"=>"html")
    );
}

if (RhdHandler::getJustPath() === 'activity/gsep/calendar/' || RhdHandler::getJustPath() === 'Sustainability/gsep/calendar/') {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('calendar.php'),
        array(),
        Array("MODE"=>"html")
    );
}

if (
    RhdHandler::getJustPath() === 'Sustainability/gsep/management_committee_meeting/registration/'
    || RhdHandler::getJustPath() === 'Sustainability/gsep/project_committee_meeting/registration/'
    || RhdHandler::getJustPath() === 'Sustainability/gsep/policy_committee_meeting/registration/'
) {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('gsep_form_irkutsk.php'),
        array(),
        Array("MODE"=>"html")
    );
}
if (
    RhdHandler::getJustPath() === 'Sustainability/gsep/management_committee_meeting_spb/registration/'
    || RhdHandler::getJustPath() === 'Sustainability/gsep/project_committee_meeting_spb/registration/'
    || RhdHandler::getJustPath() === 'Sustainability/gsep/policy_committee_meeting_spb/registration/'
) {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('gsep_form_spb.php'),
        array(),
        Array("MODE"=>"html")
    );
}
if (
    RhdHandler::getJustPath() === 'Sustainability/gsep/management-summit-meeting/registration/'
) {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('gsep_form_moscow.php'),
        array(),
        Array("MODE"=>"html")
    );
}

if (RhdHandler::getJustPath() === "sustainable_development/alms_charity/") {
    $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath('alms_charity.php'),
        array(),
        Array("MODE"=>"html")
    );
} else {
    if (!RhdHandler::isAtNews()) {
        if (!RhdMemcache::get('_parsed_sec___' . $lastSection['ID']) && $lastSection['ID']) {
            $item = CIBlockSection::GetByID($lastSection['ID'])->Fetch();

            global $DB;
            $lastSection['DESCRIPTION'] = parseText($item['DESCRIPTION']);
//\/\/\/\/\/\/\/\/\
            //$DB->Query('UPDATE b_iblock_section SET DESCRIPTION = \''.$DB->ForSql($lastSection['DESCRIPTION']).'\' WHERE ID = \''.$DB->ForSql($lastSection['ID']).'\'');
//\/\/\/\/\/\/\/\/\/
            RhdMemcache::set('_sparsed_sec___' . $lastSection['ID'], true);
        }

        $lastSection['DESCRIPTION'] = addMediaplayer($lastSection['DESCRIPTION']);

        //$lastSection['DESCRIPTION'] = parseText($lastSection['DESCRIPTION']);
        if (strpos($lastSection['DESCRIPTION'], 'videoplayer') === false) {
            RhdHandler::$ogDesc = su::cutOnSpace(strip_tags($lastSection['DESCRIPTION']), 150);
        }
        echo $lastSection['DESCRIPTION'];


        //Показать форму "Сделать предложение"
        if ($lastSection["UF_FEEDBACK_FORM"] == 1) {
            $APPLICATION->IncludeComponent("rushydro:form.result.new", "comments", array(
                "WEB_FORM_ID" => "6",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "USE_EXTENDED_ERRORS" => "Y",
                "FORM_CAPTION" => "",
                "SEF_MODE" => "N",
                "SEF_FOLDER" => "/",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "LIST_URL" => '/' . RhdHandler::getJustPath(),
                "EDIT_URL" => '/' . RhdHandler::getJustPath(),
                "SUCCESS_URL" => '/' . RhdHandler::getJustPath(),
                "CHAIN_ITEM_TEXT" => "",
                "CHAIN_ITEM_LINK" => "",
                "VARIABLE_ALIASES" => array(
                    "WEB_FORM_ID" => "WEB_FORM_ID",
                    "RESULT_ID" => "RESULT_ID",
                )
            ),
                false
            );
        }

    }
}

if (RhdHandler::getJustPath() != "sustainable_development/alms_charity/") {


    if ($filesElement = CIBlockElement::GetList(array(), array('SECTION_ID' => $lastSection['ID'], 'CODE' => '_files'))->GetNext()) {
        $props = getElementProps($iblockId, $filesElement['ID']);
        $gallery = createGallery($props);

        $APPLICATION->IncludeFile(
            $APPLICATION->GetTemplatePath('gallery.php'),
            compact('gallery'),
            Array("MODE" => "html")
        );
    }

    if (RhdHandler::getLastSectionCode() !== RhdHandler::getPurchasesSiteCode()) {
        $filter = array('SECTION_ID' => $lastSection['ID']);
        if (RhdHandler::getLastSectionCode() === 'hydrorezhim') {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    '=PROPERTY_IN_SSHGES_HYDROLOGY_VALUE' => '1',
                )
            );
        }

        if (RhdHandler::isBogesNews()) {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    '=PROPERTY_IN_BOGES_NEWS_VALUE' => '1',
                )
            );
        }

        if (RhdHandler::isFilialNews()) {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_SHOW_IN_MAIN_NEWS_VALUE' => 1,
                )
            );
        }

        if (RhdHandler::isOrgVlNews()) {
            $filter = array(
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => RhdHandler::getIBlockId(),
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_IN_VZ_S_ORG_VL_VALUE' => 1,
                )
            );
        }

        if (RhdHandler::isEastNews()) {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_IN_EAST_NEWS_VALUE' => '1',
                )
            );
        }

        if (RhdHandler::isIrNews()) {
            if (RhdHandler::isEnglish()) {
                $filter = array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => RhdHandler::getIBlockId(),
                    array(
                        'LOGIC' => 'OR',
                        'SECTION_ID' => array($lastSection['ID'], 7471),
                        '=PROPERTY_IN_IR_NEWS_VALUE' => '1',
                    )
                );
            } else {
                $filter = array(
                    'ACTIVE' => 'Y',
                    'IBLOCK_ID' => RhdHandler::getIBlockId(),
                    array(
                        'LOGIC' => 'OR',
                        'SECTION_ID' => $lastSection['ID'],
                        '=PROPERTY_IN_IR_NEWS_VALUE' => '1',
                    )
                );
            }
        }

        if (RhdHandler::isEcoNews()) {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    '=PROPERTY_IN_ECO_NEWS_VALUE' => '1',
                )
            );
        }

        if (RhdHandler::isPavodokNews()) {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    '=PROPERTY_IN_PAVODOK_NEWS_VALUE' => '1',
                )
            );
        }

        if (RhdHandler::getJustPath() === 'branch/safety/tech_policy/news/') {
            $filter = array(
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => RhdHandler::getIBlockId(),
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    '=PROPERTY_IN_TECHPOL_NEWS_VALUE' => '1',
                )
            );
        }

        if (RhdHandler::getJustPath() === 'branch/safety/environmental/news/') {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_IN_ENVSAFE_NEWS_VALUE' => 1,
                )
            );
        }

        if (RhdHandler::isAtNews() && in_array(RhdHandler::getSiteCode(), array('pauzhet', 'vmgeopp'))) {
            $filter = array(
                'ACTIVE' => 'Y',
                'SECTION_ID' => array($lastSection['ID'], 6408),
            );
        }

        if ($lastSection['ID'] == '7726') {
            $filter = array(
                'ACTIVE' => 'Y',
                'SECTION_ID' => array($lastSection['ID'], 5064),
            );
        }

        if ($lastSection['UF_TAGS']) {
            $tags = explode(',', $lastSection['UF_TAGS']);
            foreach ($tags as $index => $tag) {
                $tags[$index] = '%' . trim($tag) . '%';
            }
            $filter = array(
                'ACTIVE' => 'Y',
                //'IBLOCK_ID' 	=> RhdHandler::getIBlockId(),
                'TAGS' => $tags,
            );
        }

        /*if ($lastSection['ID'] == '8869') {
            $filter = array(
                'ACTIVE' => 'Y',
                array(
                    'LOGIC' => 'OR',
                    'SECTION_ID' => $lastSection['ID'],
                    'PROPERTY_SHOW_IN_HYDROLOGY_VALUE' => 1,
                )
            );
        }*/
        //var_dump($filter);
        /*
            $day['bvu1'] = (int) trim($day['PROPERTY_BVU1']);
            $day['bvu2'] = (int) trim($day['PROPERTY_BVU2']);
            $day['pritokvb'] = (int) trim($day['PROPERTY_PRITOKVB']);
            $day['levelvb'] = (float) str_replace(",",".", trim($day['PROPERTY_LEVELVB']));
            $day['levelnb'] = (float) str_replace(",",".", trim($day['PROPERTY_LEVELNB']));
            $day['rashod'] = (float) str_replace(",",".", trim($day['PROPERTY_RASHOD']));
            $day['rashodga'] = (float) str_replace(",",".", trim($day['PROPERTY_RASHODGA']));
            $day['rashodev'] = (float) str_replace(",",".", trim($day['PROPERTY_RASHODEV']));
            $day['rashodbv'] = (float) str_replace(",",".", trim($day['PROPERTY_RASHODDV']));
        */

        if ($lastSection['CODE'] === 'hydrology') {
            $hydrologyItemsRs =
                CIBlockElement::GetList(
                    array('DATE_ACTIVE_FROM' => 'asc'),
                    array('=IBLOCK_ID' => RhdHandler::getHydrologyIBlockId()),
                    false,
                    false,
                    array(
                        'IBLOCK_ID',
                        'DATE_ACTIVE_FROM',
                        'PROPERTY_BUV1',
                        'PROPERTY_BUV2',
                        'PROPERTY_PRITOKVB',
                        'PROPERTY_LEVELVB',
                        'PROPERTY_LEVELNB',
                        'PROPERTY_RASHOD',
                        'PROPERTY_RASHODGA',
                        'PROPERTY_RASHODEV',
                        'PROPERTY_RASHODBV',
                    )
                );

            $hydrologyItems = array();
            while ($item = $hydrologyItemsRs->GetNext()) {
                $hydrologyItems[] = $item;
                //var_dump($item);die();
            }
            unset($hydrologyItemsRs);
            $APPLICATION->IncludeFile(
                $APPLICATION->GetTemplatePath('hydrology.php'),
                compact('hydrologyItems'),
                Array("MODE" => "html")
            );
        }

        if ($lastSection['UF_ENABLE_ARCHIVE'] || RhdHandler::isAtNews()) {

            if (!RhdHandler::isEnglish()) {
                $monthNames = array(
                    1 => 'январь',
                    2 => 'февраль',
                    3 => 'март',
                    4 => 'апрель',
                    5 => 'май',
                    6 => 'июнь',
                    7 => 'июль',
                    8 => 'август',
                    9 => 'сентябрь',
                    10 => 'октябрь',
                    11 => 'ноябрь',
                    12 => 'декабрь',
                );
            } else {
                $monthNames = array(
                    1 => 'january',
                    2 => 'february',
                    3 => 'march',
                    4 => 'april',
                    5 => 'may',
                    6 => 'june',
                    7 => 'july',
                    8 => 'august',
                    9 => 'september',
                    10 => 'october',
                    11 => 'november',
                    12 => 'december',
                );
            }

            $cacheKey = '_archive_section' . RhdHandler::getIBlockId() . '_' . $lastSection['ID'] . (isset($_GET['archive']) ? md5($_GET['archive']) : '');

            if (!($cached = RhdMemcache::get($cacheKey))) {
                $dates = array();

                $firstItem = getBorderItem($filter, false);
                $lastItem = getBorderItem($filter, true);

                $firstDate = getMonthAndYear($firstItem['DATE_ACTIVE_FROM']);
                $lastDate = getMonthAndYear($lastItem['DATE_ACTIVE_FROM']);

                $hasMonths = false;

                for ($year = $firstDate['year']; $year <= $lastDate['year']; $year++) {
                    $dates[$year] = array();

                    for ($month = 1; $month <= 12; $month++) {
                        if ($year === $firstDate['year'] && $month < $firstDate['month']) {
                            continue;
                        }

                        if ($year === $lastDate['year'] && $month > $lastDate['month']) {
                            break;
                        }

                        $dates[$year][] = $month;
                        $hasMonths = true;
                    }
                }

                $currentDate = $lastDate;

                if (isset($_GET['archive'])) {
                    list($year, $month) = explode('-', $_GET['archive']);
                    if (
                        $year
                        && $month
                        && is_numeric($year)
                        && is_numeric($month)
                        && ($year = intval($year))
                        && ($month = intval($month))
                        && (
                            ($year > $firstDate['year'] || ($year === $firstDate['year'] && $month >= $firstDate['month']))
                            && ($year < $lastDate['year'] || ($year === $lastDate['year'] && $month <= $lastDate['month']))
                        )
                    ) {
                        $currentDate = compact('month', 'year');
                    }
                }

                $isLastMonth = ($currentDate['month'] === 12);
                $dateFrom = mktime(0, 0, 0, $currentDate['month'], 1, $currentDate['year']);
                $dateTo = mktime(0, 0, 0, $isLastMonth ? 1 : $currentDate['month'] + 1, 1, $isLastMonth ? $currentDate['year'] + 1 : $currentDate['year']);

                $itemsRs =
                    CIBlockElement::GetList(
                        array('DATE_ACTIVE_FROM' => 'desc'),
                        array_merge(
                            $filter,
                            array(
                                'ACTIVE' => 'Y',
                                '><DATE_ACTIVE_FROM' =>
                                    array(
                                        date('d.m.Y H:i:s', $dateFrom),
                                        date('d.m.Y H:i:s', $dateTo),
                                    )
                            )
                        ),
                        false,
                        false,
                        array(
                            '*',
                            'PROPERTY_SHOW_DATE',
                            'PROPERTY_SHOW_DISCLAIMER',
                            'PROPERTY_IN_ENVSAFE_NEWS',
                            'PROPERTY_IN_TECHPOL_NEWS',
                        )
                    );
                $items = array();
                $titles = array();
                while ($item = $itemsRs->GetNext()) {
                    $item['NAME'] = parseText($item['NAME']);
                    if ($filter['TAGS'] && in_array($item['NAME'], $titles)) continue;
                    $titles[] = $item['NAME'];
                    $items[] =
                        array_merge(
                            array(
                                'URL' => grabLinkFromTitle($item['NAME']) ?: RhdPath::createUrl($site, RhdHandler::getJustPath(), $item['ID'])
                            ),
                            $item
                        );
                }

                RhdMemcache::set($cacheKey, compact('monthNames', 'dates', 'currentDate', 'items', 'hasMonths'));
            } else {
                extract($cached);
            }

            $APPLICATION->IncludeFile(
                $APPLICATION->GetTemplatePath('list.news.php'),
                compact('monthNames', 'dates', 'currentDate', 'items', 'hasMonths'),
                Array("MODE" => "html")
            );
        } else {
            $cacheKey = 'section_____' . RhdHandler::getIBlockId() . '_' . $lastSection['ID'] . '_' . $_GET['PAGEN_1'];

            if (!($cached = RhdMemcache::get($cacheKey))) {
                $itemsRs =
                    CIBlockElement::GetList(
                        array('DATE_ACTIVE_FROM' => 'desc'),
                        array_merge(
                            array(
                                'ACTIVE' => 'Y',
                            ),
                            $filter
                        ),
                        false,
                        array(
                            'bShowAll' => false,
                            'nPageSize' => 25,
                        ),
                        array(
                            '*',
                            'PROPERTY_SHOW_DATE',
                            'PROPERTY_SHOW_DISCLAIMER',
                            'PROPERTY_IN_ENVSAFE_NEWS',
                            'PROPERTY_IN_TECHPOL_NEWS',
                            'PROPERTY_SHOW_IN_HYDROLOGY',
                        )
                    );
                $items = array();
                while ($item = $itemsRs->GetNext()) {
                    $item['NAME'] = parseText($item['NAME']);
                    $items[] =
                        array_merge(
                            array(
                                'URL' => grabLinkFromTitle($item['NAME']) ?: RhdPath::createUrl($site, RhdHandler::getJustPath(), $item['ID'])
                            ),
                            $item
                        );
                }

                ob_start();
                $APPLICATION->IncludeComponent(
                    "bitrix:system.pagenavigation",
                    "",
                    array(
                        "NAV_RESULT" => $itemsRs,
                    )
                );
                $pagination = ob_get_clean();

                RhdMemcache::set($cacheKey, compact('items', 'pagination'));
            } else {
                extract($cached);
            }

            $APPLICATION->IncludeFile(
                $APPLICATION->GetTemplatePath('list.items.php'),
                compact('items', 'pagination'),
                Array("MODE" => "html")
            );
        }
    }

    $APPLICATION->IncludeComponent(
        "rushydro:catalog.section.list",
        "list_razdel",
        array(
            "IBLOCK_ID" => $iblockId,
            "SECTION_ID" => $lastSection ? $lastSection['ID'] : null,
            'TOP_DEPTH' => 1,
        )
    );

    if ($lastSection['UF_NEED_DISCLAIMER'])
        echo '</div>';

    if ($lastSection['ID'] == 8329) {
        $APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "rsk_faq",
            array(
                "IBLOCK_ID" => "126",
                "SECTION_ID" => null,
                'TOP_DEPTH' => 1,
                "CACHE_TIME" => 'N',
            )
        );

        $APPLICATION->IncludeComponent("bitrix:news.list", "rsk_faq", array(
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => "126",
            "NEWS_COUNT" => "20",
            "SORT_BY1" => "ACTIVE_FROM",
            "SORT_ORDER1" => "DESC",
            "SORT_BY2" => "SORT",
            "SORT_ORDER2" => "ASC",
            "FILTER_NAME" => "",
            "FIELD_CODE" => array(
                0 => "NAME",
                1 => "",
            ),
            "PROPERTY_CODE" => array(
                'QUESTION', 'ANSWER'
            ),
            "CHECK_DATES" => "Y",
            "DETAIL_URL" => "",
            "AJAX_MODE" => "N",
            "AJAX_OPTION_JUMP" => "N",
            "AJAX_OPTION_STYLE" => "Y",
            "AJAX_OPTION_HISTORY" => "N",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "36000000",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
            "PREVIEW_TRUNCATE_LEN" => "",
            "ACTIVE_DATE_FORMAT" => "d.m.Y",
            "SET_TITLE" => "N",
            "SET_STATUS_404" => "N",
            "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            "ADD_SECTIONS_CHAIN" => "N",
            "HIDE_LINK_WHEN_NO_DETAIL" => "N",
            "PARENT_SECTION" => $_REQUEST['topic'],
            "PARENT_SECTION_CODE" => "",
            "DISPLAY_TOP_PAGER" => "N",
            "DISPLAY_BOTTOM_PAGER" => "Y",
            "PAGER_TITLE" => "Новости",
            "PAGER_SHOW_ALWAYS" => "N",
            "PAGER_TEMPLATE" => "",
            "PAGER_DESC_NUMBERING" => "N",
            "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
            "PAGER_SHOW_ALL" => "Y",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "AJAX_OPTION_ADDITIONAL" => ""
        ),
            false
        );

        $APPLICATION->IncludeComponent(
            "rushydro:rsk.faq.form",
            "",
            array()
        );
    }

    if (
        RhdHandler::getJustPath() === 'activity/invest/pricing_audit/2016/proekty-kholding-rao-energeticheskie-sistemy-vostoka/stroitelstvo-gtu-tets-v-g-vladivostoke-pos-zmeinka-stadiya-obin/'
        || RhdHandler::getJustPath() === 'activity/invest/pricing_audit/2016/proekty-kholding-rao-energeticheskie-sistemy-vostoka/stroitelstvo-gtu-tets-v-g-artyeme-pos-sinyaya-sopka-stadiya-obin/'
    ) {

        $_REQUEST['form_hidden_9'] = $lastSection['NAME'];
        $APPLICATION->IncludeComponent("rushydro:form.result.new", "comments", array(
            "WEB_FORM_ID" => "2",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "USE_EXTENDED_ERRORS" => "Y",
            "SEF_MODE" => "N",
            "SEF_FOLDER" => "/",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "LIST_URL" => '/' . RhdHandler::getJustPath(),
            "EDIT_URL" => '/' . RhdHandler::getJustPath(),
            "SUCCESS_URL" => '/' . RhdHandler::getJustPath(),
            "CHAIN_ITEM_TEXT" => "",
            "CHAIN_ITEM_LINK" => "",
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            )
        ),
            false
        );
    }
    if (
        RhdHandler::getJustPath() === 'activity/invest/pricing_audit/podat-predlozhenie/'
    ) {
        $APPLICATION->IncludeComponent("rushydro:form.result.new", "comments", array(
            "WEB_FORM_ID" => "6",
            "IGNORE_CUSTOM_TEMPLATE" => "N",
            "USE_EXTENDED_ERRORS" => "Y",
            "FORM_CAPTION" => "",
            "SEF_MODE" => "N",
            "SEF_FOLDER" => "/",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "LIST_URL" => '/' . RhdHandler::getJustPath(),
            "EDIT_URL" => '/' . RhdHandler::getJustPath(),
            "SUCCESS_URL" => '/' . RhdHandler::getJustPath(),
            "CHAIN_ITEM_TEXT" => "",
            "CHAIN_ITEM_LINK" => "",
            "VARIABLE_ALIASES" => array(
                "WEB_FORM_ID" => "WEB_FORM_ID",
                "RESULT_ID" => "RESULT_ID",
            )
        ),
            false
        );
    }
    if (
        RhdHandler::getJustPath() === 'corporate/general-meeting/forthcoming/zadat-vopros/'
    ) {

        $APPLICATION->IncludeComponent("rushydro:form.result.new", "gosa_2019",
            Array(
                "SEF_MODE" => "N",
                "WEB_FORM_ID" => 9,
                "LIST_URL" => '/' . RhdHandler::getJustPath(),
                "EDIT_URL" => '/' . RhdHandler::getJustPath(),
                "SUCCESS_URL" => '/' . RhdHandler::getJustPath(),
                "CHAIN_ITEM_TEXT" => "",
                "CHAIN_ITEM_LINK" => "",
                "IGNORE_CUSTOM_TEMPLATE" => "N",
                "USE_EXTENDED_ERRORS" => "Y",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "3600",
                "CACHE_NOTES" => "",
                "VARIABLE_ALIASES" => Array(
                    "WEB_FORM_ID" => "WEB_FORM_ID",
                    "RESULT_ID" => "RESULT_ID"
                )
            ),
            false
        );
    }

    if (RhdHandler::isFotoBank()) {
        if ($lastSection['UF_PHOTOBANK']) {
            $gallery = array();
            $rsEl = CIBlockElement::GetList(array("SORT" => "DESC"), array(
                'IBLOCK_ID' => 132,
                'SECTION_ID' => $lastSection['UF_PHOTOBANK']
            ), false, false, array('IBLOCK_ID', 'DETAIL_PICTURE', 'NAME', 'PREVIEW_PICTURE', 'PROPERTY_ORIGINAL_PHOTO'));
            while ($photo = $rsEl->GetNext()) {
                $original = '/attach' . CFile::GetPath($photo['PROPERTY_ORIGINAL_PHOTO_VALUE']);
                $gallery[] = array(
                    'HTML' => '<a rel="prettyPhoto[gallery]" href="' . CFile::GetPath($photo['DETAIL_PICTURE']) . '" title="' . $photo['NAME'] . '"><img src="' . CFile::GetPath($photo['PREVIEW_PICTURE']) . '" /></a>',
                    'DESCRIPTION' => str_replace('_', ' ', $photo['NAME']),
                    'ORIGINAL_LINK' => $original
                );
            }

            $APPLICATION->IncludeFile(
                $APPLICATION->GetTemplatePath('gallery.php'),
                compact('gallery'),
                Array("MODE" => "html")
            );
        }
    }
}
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
