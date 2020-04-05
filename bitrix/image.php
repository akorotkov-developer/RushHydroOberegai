<?php
define('THUMB_CACHE', $_SERVER['DOCUMENT_ROOT'].'/upload/resize_cache/');

require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';

try {
	$path = dirname(__FILE__).$_GET['path'];
	if (!file_exists($path)) 
		throw new RhdNotFoundException('file is not found');

	$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
	$extToType = array(
		'jpg'	=> 'image/jpg',
		'jpeg'	=> 'image/jpg',
		'png'	=> 'image/png',
	);

	$size = array(
		'width'		=> 0,
		'height' 	=> 0,
	);
	list($size['width'], $size['height']) = explode(',', $_GET['size']);
	$size = array_map(function ($v) {
		return intval($v) > 800 ? 800 : intval($v);
	}, $size);

	$dest = THUMB_CACHE.md5($path).'_'.$size['width'].'x'.$size['height'].'.'.$ext;
	if (!file_exists($dest) && !CFile::ResizeImageFile($path, $dest, $size)) 
		throw new RhdNotFoundException('bad image');

	header('Content-Type: '.$extToType[$ext]);
	echo file_get_contents($dest);
}
catch (RhdNotFoundException $e) {
	include '404.php';
	die();
}