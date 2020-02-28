<?php

function onIBElementUpdate(&$arFields) {
    $iblock = CIBlock::GetByID($arFields['IBLOCK_ID'])->Fetch();

    if($arFields["IBLOCK_ID"] == 140){
        return $arFields;
    }

    RhdHandler::initFromData(
        $arFields['IBLOCK_ID'],
        $arFields['IBLOCK_SECTION'][0],
        $arFields['ID']
    );

    $e = RhdIBElement::create($arFields);

    if ($e->getPropertyValue('PARSE_TAGS')) {
        $e->dropPropertyValue('PARSE_TAGS');

        /*$body = '';
        var_dump(RhdTag::grabTags($body));
        die();*/

        $tags =
            $arFields['TAGS']
                ? explode(',', $arFields['TAGS'])
                : array();

        $tags =
            array_merge(
                $tags,
                RhdTag::grabTags($arFields['DETAIL_TEXT'])
            );

        $tags =
            array_map(
                'trim',
                $tags
            );

        $tags =
            array_unique($tags);

        $length = 0;
        $trimmedTags = array();

        foreach ($tags as $tag) {
            $length += mb_strlen($tag) + 2;
            if ($length >= 255) break;

            $trimmedTags[] = $tag;
        }

        $arFields['TAGS'] = implode(', ', $trimmedTags);
    }
}

function afterIBElementUpdate(&$arFields) {
    /*RhdHandler::initFromData($arFields['IBLOCK_ID'], $arFields['IBLOCK_SECTION'][0], $arFields['ID']);

    var_dump(RhdHandler::getCurrentPath());
    die();*/
    if($arFields["IBLOCK_ID"] == 140){
        return $arFields;
    }
    $iblock = CIBlock::GetByID($arFields['IBLOCK_ID'])->Fetch();



    $sectionId = $arFields['IBLOCK_SECTION'][0];

    $rs = CIBlockSection::GetByID($sectionId);

    $sectionCode = '';

    while ($arSection = $rs->GetNext()){
        $sectionCode = $arSection['CODE'];
    }


    //if($arFields['PARENT_SECTION'])

    /*if ($iblock['IBLOCK_TYPE_ID'] !== 'site') {
        return;
    }*/

    RhdHandler::initFromData($arFields['IBLOCK_ID'], $arFields['IBLOCK_SECTION'][0], $arFields['ID']);

    $e = RhdIBElement::create($arFields);



    // сбрасываем флаг 'выносить в раздел "новое на сайте"'
    if ($icon = $e->getPropertyValue('SITE_NEWS_ICON')) {
        $text = $e->getPropertyValue('SITE_NEWS_TEXT');

        RhdSiteNews::add($icon, $text, RhdHandler::getCurrentPath(), $arFields['NAME'], RhdHandler::getSiteCode());

        /*$e->
            dropPropertyValue('SITE_NEWS_ICON')->
            dropPropertyValue('SITE_NEWS_TEXT');*/

        CIBlockElement::SetPropertyValuesEx($arFields['ID'], $arFields['IBLOCK_ID'], array('SITE_NEWS_ICON' => null, 'SITE_NEWS_TEXT' => null));
    }


    if ($e->getPropertyValue('SEND_TO_SUBSCRIBERS')) {
        CIBlockElement::SetPropertyValuesEx($arFields['ID'], $arFields['IBLOCK_ID'], array('SEND_TO_SUBSCRIBERS' => null));

        //$e->dropPropertyValue('SEND_TO_SUBSCRIBERS');

        $link = reset($e->getPropertyValue('LINK'));
        $link = $link['VALUE'];
        if (strpos($link, 'http://') === false) {
            $link = RhdPath::createUrl(RhdHandler::getMainSiteCode(), $link);
        }

        $addAddition = true;

        if (!in_array(RhdHandler::getSiteCode(), array('eng', 'purchases'))) {
            CModule::IncludeModule("subscribe");

            if($sectionCode=="forthcoming") {

                $addAddition = false;
                $body = "На странице о предстоящих общих собраниях акционеров появилась новая информация <br> <a href='".$link.'corporate/general-meeting/forthcoming/'."'>Ссылка</a> ";
                $subName = 'shareholder';

            }elseif ($iblock['IBLOCK_TYPE_ID'] !== 'site') {
                $body = "Добавлена информация в раздел \"Важное на сайте\":\n\n".$arFields['NAME']."\n\nПодробности по ссылке: $link";
                $subName = 'sitenews';
            }else {
                $body = $arFields['DETAIL_TEXT'];
                $body = preg_replace('/<table.+?<\/table>/sim', '', $body);
                $body = strip_tags($body);
                $body = html_entity_decode($body, ENT_COMPAT, 'utf-8');
                $body = str_replace("\r\n", "\n", $body);
                $body = preg_replace('/\n\s*\n\s*[\n]+/', "\n\n", $body);
                $body = dropMediaplayer($body);
                if (mb_strlen($body) > 800) {
                    $body = trim(mb_substr($body, 0, 800)).'...';
                }
                $body = $arFields['NAME']."\n\n".$body."\n\nСсылка на новость: ".RhdHandler::getCurrentPath();

                if (RhdHandler::isMainSite()) {
                    $subName = 'news';
                }
                else {
                    $subName = RhdHandler::getSiteCode();
                }
            }

            if ($subName) {
                $rsRubric = CRubric::GetList(array(), array('NAME' => $subName));
                $rubric = null;
                while ($rubric = $rsRubric->GetNext()) {
                    if ($rubric['NAME'] === $subName) {
                        break;
                    }

                    $rubric = null;
                }

                if ($rubric) {
                    if($addAddition)
                        $body .=
                            //"\n\n\n\n------------------------\nВы получили это письмо, т.к. подписались на новости РусГидро.";
                            "\n\n\n\n------------------------\nВы получили это письмо, т.к. подписались на новости РусГидро.\nВы можете в любой момент отменить Вашу подписку или изменить её параметры, пройдя по ссылке: #SUBSCRIBE_LINK#";//.RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'subscribe');

                    $posting = array(
                        'FROM_FIELD' => 'no_reply@rushydro.ru',
                        'SUBJECT'=> $arFields['NAME'],
                        'BODY' => $body,
                        'BODY_TYPE' => 'text',
                        'RUB_ID' => array($rubric['ID']),
                        'AUTO_SEND_TIME' => date('d.m.Y H:i:s'),
                        'CHARSET' => 'windows-1251',
                        'DIRECT_SEND' => 'Y',
                    );

                    $postingObject = new CPosting;
                    $id = $postingObject->Add($posting);
                    if ($id !== false) $postingObject->ChangeStatus($id, 'P');
                }

            }
        }
    }

}

function onIBSectionUpdate(&$arFields) {
    if (defined('SECTION_PROCESSING_BEFORE')) return;
    define('SECTION_PROCESSING_BEFORE', true);

    $s = RhdIBSection::create($arFields);

    RhdHandler::initFromData($s->getIBlockId(), $arFields);

    if (isset($arFields['CODE']) && empty($arFields['CODE'])) {
        $arFields['CODE'] = strtoupper(substr(md5(microtime(true)), 0, 10));
    }

    if ($icon = $s->getPropertyValue('UF_SITE_NEWS_ICON')) {
        $text = $s->getPropertyValue('UF_SITE_NEWS_TEXT');

        RhdSiteNews::add($icon, $text, RhdHandler::getCurrentPath(), $arFields['NAME'], RhdHandler::getSiteCode());

        $s->
        dropPropertyValue('UF_SITE_NEWS_ICON')->
        dropPropertyValue('UF_SITE_NEWS_TEXT');
    }
}

function afterIBSectionUpdate(&$arFields) {
    if (!$arFields['UF_SECTION_LINK'] || defined('SECTION_PROCESSING_AFTER')) return;
    define('SECTION_PROCESSING_AFTER', true);

    $section =
        CIBlockSection::GetList(
            array(),
            array(
                'IBLOCK_ID' => RhdHandler::getOppositeSiteId(),
                'ID' => $arFields['UF_SECTION_LINK'],
            ),
            false,
            array(
                'ID',
                'UF_*',
            )
        )->
        GetNext();

    $obSection = new CIBlockSection;
    $result = $obSection->Update($arFields['UF_SECTION_LINK'], array("UF_SECTION_LINK"=>$arFields['ID']));
}

function beforeIndexHandler($arFields) {
    CModule::IncludeModule('iblock');

    if ($arFields['MODULE_ID'] === 'iblock') {
        $ids = array();
        $id = $arFields['ITEM_ID'];
        if (substr($id, 0, 1) === 'S') {
            // dealing with section
            $id = substr($arFields['ITEM_ID'], 1);
        }
        else {
            // dealing with element

            $el = CIBlockElement::GetByID($id)->GetNext();
            $id = $el['IBLOCK_SECTION_ID'];
            unset($el);

            $ids[] = $id;
        }

        while ($id && ($section = CIBlockSection::GetByID($id)->GetNext())) {
            $id = $section['IBLOCK_SECTION_ID'];
            if ($id) $ids[] = $id;
        }

        //var_dump($ids);

        $arFields["PARAMS"]["iblock_section"] = $ids;
    }

    return $arFields;
}

function beforePostingMail($arFields)
{


    $rs = CSubscription::GetByEmail($arFields["EMAIL"]);
    if($ar = $rs->Fetch())
    {
        $arFields['BODY'] =
            str_replace(
                '#SUBSCRIBE_LINK#',
                RhdPath::createUrl(RhdHandler::getMainSiteCode(), 'subscribe').'?ID='.$ar['ID'].'&CONFIRM_CODE='.$ar['CONFIRM_CODE'],
                $arFields['BODY']
            );
    }

    return $arFields;
}
