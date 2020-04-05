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

	$size = !empty($_REQUEST['size']) ? htmlspecialchars($_REQUEST['size']) : null;

	$dh = opendir($path);
	$html = '<div id="gallery-wrapper"><ul class="photogallery">';

	$items = array();

	while ($item = readdir($dh)) {
		if (in_array($item, array('.', '..')) || is_dir($path.$item) || preg_match('/\.txt$/', $item)) continue;
		$name = rawurldecode(pathinfo(rawurlencode($item), PATHINFO_FILENAME));

		$m = null;
		if (preg_match('/^(\d+)\.(.*)$/', $name, $m)) {
			$weight = intval($m[1]);
			$name = $m[2];
		}
		else {
			$weight = 999;
		}

		$items[] = array(
			'name' => $name,
			'file' => $item,
			'weight' => $weight,
			'description' => file_exists($path.$name.'.txt') ? file_get_contents($path.$name.'.txt') : null,
		);
	}

	usort($items, function($item1, $item2) {
		return ($item1['weight'] === $item2['weight']) ? strcmp($item1['name'], $item2['name']) : ($item1['weight'] > $item2['weight']);
	});

	foreach ($items as $item) {
		$html .= '<li><a href="http://www.rushydro.ru/upload/storage'.$relativePath.rawurlencode($item['file']).($size ? '?size='.$size : '').'"><span data-encoded-name="'.rawurlencode($item['name']).'" data-description="'.htmlspecialchars($item['description']).'">'.$item['name'].'</span></a></li>';
	}

	$html .= '</ul></div>';
	closedir($dh);

	$data['html'] = $html;

	outputJson($data, $_GET['callback']);
}
catch (RhdNotFoundException $e) {
	include $_SERVER['DOCUMENT_ROOT'].'/404.php';
	die();
}
