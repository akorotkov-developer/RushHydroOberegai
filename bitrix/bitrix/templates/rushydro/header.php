<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

$siteCode = RhdHandler::getSiteCode();
$siteHeaderFile = __DIR__.'/header_'.$siteCode.'.php';
$defaultHeaderFile = __DIR__.'/header_default.php';

//require_once __DIR__.'/header_default.php';
require_once file_exists($siteHeaderFile) ? $siteHeaderFile : $defaultHeaderFile;