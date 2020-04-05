<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

global $USER;

if (!$USER->IsAuthorized()) {

    if($_GET['success'] == 'y')
        echo "Форма успешно отправлена. При подтверждении статуса акционера Вам на электронную почту поступит соответствующее сообщение";

    if ($_GET['register'] == "yes") {

        $APPLICATION->IncludeComponent(
            "bitrix:main.register",
            "auction",
            Array(
                "USER_PROPERTY_NAME" => "",
                "SHOW_FIELDS" => array("LAST_NAME","NAME","SECOND_NAME","PERSONAL_PHONE","PERSONAL_BIRTHDAY"),
                "REQUIRED_FIELDS" => array("UF_PAS_NUM", "PERSONAL_PHONE","PERSONAL_BIRTHDAY","NAME","LAST_NAME","SECOND_NAME",),
                "AUTH" => "Y",
                "USE_BACKURL" => "Y",
                "SUCCESS_PAGE" => "/corporate/general-meeting/forum-dlya-aktsionerov/?success=y",
                "SET_TITLE" => "Y",
                "USER_PROPERTY" => array("UF_PAS_NUM", "UF_DOC", "UF_AGREE")
            ),
            false
        );

    }elseif($_GET['forgot_password'] == "yes"){

        $APPLICATION->SetTitle("Восстановление пароля");

        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.forgotpasswd",
            ".default",
            Array()
        );

    }else{

        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.form",
            ".default",
            array(
                "REGISTER_URL" => "",
                "FORGOT_PASSWORD_URL" => "",
                "PROFILE_URL" => "",
                "SHOW_ERRORS" => "Y",
            )
        );
    }

} else {
        $APPLICATION->IncludeComponent("bitrix:forum", ".default", array(
            "THEME" => "blue",
            "SHOW_TAGS" => "Y",
            "SHOW_AUTH_FORM" => "Y",
            "SHOW_NAVIGATION" => "Y",
            "TMPLT_SHOW_ADDITIONAL_MARKER" => "",
            "SMILES_COUNT" => "100",
            "USE_LIGHT_VIEW" => "Y",
            "FID" => array(
                0 => "9",
            ),
            "FILES_COUNT" => "5",
            "SEF_MODE" => "N",
            "SEF_FOLDER" => "/corporate/general-meeting/forum-dlya-aktsionerov/",
            "CACHE_TYPE" => "A",
            "CACHE_TIME" => "3600",
            "CACHE_TIME_USER_STAT" => "60",
            "FORUMS_PER_PAGE" => "10",
            "TOPICS_PER_PAGE" => "10",
            "MESSAGES_PER_PAGE" => "10",
            "TIME_INTERVAL_FOR_USER_STAT" => "10",
            "IMAGE_SIZE" => "500",
            "SET_TITLE" => "Y",
            "USE_RSS" => "Y",
            "RSS_COUNT" => "30",
            "SHOW_VOTE" => "N",
            "SHOW_RATING" => "N",
            "SHOW_SUBSCRIBE_LINK" => "N",
            "SHOW_LEGEND" => "Y",
            "SHOW_STATISTIC" => "Y",
            "SHOW_NAME_LINK" => "Y",
            "SHOW_FORUMS" => "Y",
            "SHOW_FIRST_POST" => "N",
            "SHOW_AUTHOR_COLUMN" => "N",
            "PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
            "PATH_TO_ICON" => "/bitrix/images/forum/icon/",
            "PAGE_NAVIGATION_TEMPLATE" => "forum",
            "PAGE_NAVIGATION_WINDOW" => "5",
            "WORD_WRAP_CUT" => "23",
            "WORD_LENGTH" => "50",
            "SEO_USER" => "N",
            "USER_PROPERTY" => array(),
            "HELP_CONTENT" => "",
            "RULES_CONTENT" => "",
            "CHECK_CORRECT_TEMPLATES" => "Y",
            "RSS_CACHE" => "1800",
            "PATH_TO_AUTH_FORM" => "",
            "DATE_FORMAT" => "d.m.Y",
            "DATE_TIME_FORMAT" => "d.m.Y H:i:s",
            "SEND_MAIL" => "E",
            "SEND_ICQ" => "A",
            "SET_NAVIGATION" => "Y",
            "SET_PAGE_PROPERTY" => "Y",
            "SHOW_FORUM_ANOTHER_SITE" => "Y",
            "RSS_TYPE_RANGE" => array(
                0 => "RSS1",
                1 => "RSS2",
                2 => "ATOM",
            ),
            "RSS_TN_TITLE" => "",
            "RSS_TN_DESCRIPTION" => "",
            "VARIABLE_ALIASES" => array(
                "FID" => "FID",
                "TID" => "TID",
                "MID" => "MID",
                "UID" => "UID",
            )
        ),
            false
        );

}

?>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>