<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';

try {
	$relativePath = $_REQUEST['path'];
	if (!su::startsWith($relativePath, '/'))	$relativePath = '/'.$relativePath;
	if (!su::endsWith($relativePath, '/')) 		$relativePath .= '/';
	$relativePath = 
		str_replace(
			array(chr(0), '../', './'),
			'',
			$relativePath
		);

	$path = $_SERVER['DOCUMENT_ROOT'].'/upload/storage'.$relativePath;
	

	if (
		!file_exists($path) 
		|| !is_dir($path)
	) throw new RhdNotFoundException('path not found');

	header('Content-Type: text/javascript; charset=UTF-8');
	$data = array();

	$dh = opendir($path);
	while ($item = readdir($dh)) {
		if (in_array($item, array('.', '..')) || is_dir($path.$item)) continue;

		$data[] = array(
			'name' => $item,
			'size' => filesize($path.$item),
			'url' => 'http://www.rushydro.ru/upload/storage'.$relativePath.rawurlencode($item),
		);
	}
	closedir($dh);

	outputJson($data, $_GET['callback']);
}
catch (RhdNotFoundException $e) {
	include $_SERVER['DOCUMENT_ROOT'].'/404.php';
	die();
}
