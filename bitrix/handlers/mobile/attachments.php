<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

header('Content-Type: text/javascript; charset=UTF-8');

$lastSection = RhdHandler::getLastSection();

$data = array();

if ($lastSection['ID']) {
	$fa = new FileArchive;
	$data = $fa->getFiles($lastSection['ID']);
}
else {
	$data = array();
}

outputJson($data, $_GET['callback']);