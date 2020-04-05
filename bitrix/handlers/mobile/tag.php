<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

header('Content-Type: text/javascript; charset=UTF-8');

CModule::IncludeModule('search');

