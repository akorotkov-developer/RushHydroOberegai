<?php

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$siteCode = RhdHandler::getSiteCode();
$siteFile = __DIR__.'/handlers/main_'.$siteCode.'.php';

if (!RhdHandler::isFilial()) {
    $defaultFile =__DIR__.'/handlers/main.php';
} else {
    $defaultFile =__DIR__.'/handlers/main.filial.php';
}
//if($_COOKIE["dev"] == "Y"){var_dump($defaultFile);die();}

require file_exists($siteFile) ? $siteFile : $defaultFile;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
