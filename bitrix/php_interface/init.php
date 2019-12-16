<?
/*
You can place here your functions and event handlers

AddEventHandler("module", "EventName", "FunctionName");
function FunctionName(params)
{
	//code
}
*/
require_once dirname(__FILE__).'/su.php';
require_once dirname(__FILE__).'/wunderground.php';
require_once dirname(__FILE__).'/ReCaptcha.php';
require_once dirname(__FILE__).'/vote.php';

define('VOTING_ENABLED', false);
define('WUNDERGROUND_KEY', '77a59e96c83d38fe');
define('LIKE_SALT', 'Hl5349HHllg34#$&');
define('SALT_COOKIE', '__utmj');
define('PAGE_DESCRIPTION','Акция ПАО «РусГидро» «оБЕРЕГАй» имеет уже десятилетнюю историю. Впервые она была проведена на Нижегородской ГЭС осенью 2005 года. Затем в 2006 году акция прошла на других ГЭС Волжско-Камского каскада. В 2007 году акцию впервые провели в ЮФО и на Дальнем востоке.');
define('PAGE_TITLE', ' - Благотворительная экологическая акция ОАО «РусГидро» «оБЕРЕГАй»');

function wrap_number($number, $cases = null) {
    $rawNumber = (int) $number;
    $number = (string) $number;
    $number = str_split($number);
    $result = '';
    foreach ($number as $index => $digit) {
        $result .= '<span'.($index === 0 ? ' class="first"' : '').'>'.$digit.'</span>';
    }
    return $result.($cases ? ' '.su::caseForNumber($rawNumber, $cases) : '');
}

function normalize_picture_url($pic){
    if(!$pic) $pic = '/st/i/logo-soc_new.jpg';
        if(is_numeric($pic)){
            $pic = CFile::GetPath($pic);
        }
        if (substr($pic, 0, 1) == '/') {
            if (defined('SITE_SERVER_NAME') && strlen(SITE_SERVER_NAME) > 0)
                $pic = 'http://' . SITE_SERVER_NAME . $pic;
            else
                $pic = 'http://' . COption::GetOptionString('main', 'server_name', $GLOBALS['SERVER_NAME']) . $pic;
    }
    return $pic;
}

function isBlackout(){
    //return false;
    return time() <= MakeTimeStamp('01 00 00 15 12 2019','SS MI HH DD MM YYYY');
}


AddEventHandler('main', 'OnEpilog', '_Check404Error');

function _Check404Error(){
    if (defined('ERROR_404') && ERROR_404 == 'Y') {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/header.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/404.php';
        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/footer.php';
    }
}

AddEventHandler('iblock', 'OnBeforeIBlockElementAdd', array('OnlyOneMainVideo','OnlyOneMainVideoHandler'));
AddEventHandler('iblock', 'OnBeforeIBlockElementUpdate', array('OnlyOneMainVideo','OnlyOneMainVideoHandler'));
AddEventHandler('runetsoft.settings', 'OnBeforeSettingsUpdate', array('ClearMemberCache','ClearCacheHandler'));

Class OnlyOneMainVideo
{

    function OnlyOneMainVideoHandler(&$arFields)
    {

        $arIBlock = CIBlock::GetList(array(), array("ID" => $arFields['IBLOCK_ID']))->Fetch();

        if ($arIBlock['CODE'] != 'video')
            return ;

        foreach ($arFields['PROPERTY_VALUES'] as $propId => $prop) {

            if (self::getCodeValue($propId) === 'MAIN') {

                foreach ($prop as $val) {

                    if ($val['VALUE'] == 'Y') {

                        $rsElements = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $arIBlock['ID'], 'PROPERTY_MAIN' => "Y"));

                        $count = $rsElements->SelectedRowsCount();

                        if ($count > 0) {
                            $arElement = $rsElements->Fetch();
                            global $APPLICATION;
                            $APPLICATION->ThrowException('Видео на главной странице уже есть: ' . $arElement['NAME'] . " (" . $arElement["ID"] . ")");
                            return false;
                        }

                        break;
                    }
                }
            }
        }
    }

    function getCodeValue($propId = '')
    {
        if ($propId === '') {
            return false;
        }
        $propInfoRes = CIBlockProperty::GetByID($propId);
        $propInfo = $propInfoRes->GetNext();
        $code = $propInfo['CODE'];

        return $code;
    }
}


class ClearMemberCache{

    function ClearCacheHandler(&$arFields){

        if(\COption::GetOptionString( "runetsoft.settings", "UF_VOTING") != $arFields['UF_VOTING']){

            global $CACHE_MANAGER;

            $CACHE_MANAGER->ClearByTag("iblock_id_39");
        }
    }



}
?>
