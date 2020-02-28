<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

$siteCode = RhdHandler::getSiteCode();
$siteFooterFile = __DIR__.'/footer_'.$siteCode.'.php';
$defaultFooterFile = __DIR__.'/footer_default.php';

//require_once __DIR__.'/footer_default.php';
require_once file_exists($siteFooterFile) ? $siteFooterFile : $defaultFooterFile;