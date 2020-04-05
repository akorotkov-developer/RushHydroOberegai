<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';

define('MOBILE_STRUCTURE', true);

CModule::IncludeModule('iblock');
try {
	$site		= CIBlock::GetByID(127)->GetNext();
	$sections 	= RhdPath::resolvePath($site, $_REQUEST['path']);
	$current	= $sections ? end($sections) : null;
	$codes = array_keys($sections);
	$indexedSections = array_values($sections);
	$parent 	= count($sections) >= 2 ? $indexedSections[count($sections) - 2] : null;
	unset($indexedSections);

	header('Content-Type: text/javascript; charset=UTF-8');

	if (!su::startsWith($_REQUEST['path'], '/')) $_REQUEST['path'] = '/'.$_REQUEST['path'];

	$data		= array(
		'id'		=> $current ? $current['ID'] : null,
		'name'		=> $current ? $current['NAME'] : $site['NAME'],
		'url'		=> $_REQUEST['path'],
		'metafunc'	=> null,
		'metaurl'	=> null,
		'before'	=> null,
		'content'	=> $current ? $current['DESCRIPTION'] : null,
		'after'		=> null,
		'parent' 	=> $current 
							? ($parent 
								? array('id' => $parent['ID'], 'name' => $parent['NAME'], 'url' => '/'.implode('/', array_slice($codes, 0, count($codes) - 1)).'/') 
								: array('id' => null, 'name' => $site['NAME'], 'url' => '/'))
							: null,
		'children' 	=> array(),
	);

	$m = null;
	if (preg_match('/(\[(FOLDER|GALLERY|CONTENT)\s+([^\]]+)\])/mi', $data['content'], $m)) {
		list($data['before'], $data['after']) = explode($m[1], $data['content']);
		$data['content']	= callMetafunction($m[2], $m[3], $_REQUEST);
		$data['metafunc']	= strtolower($m[2]);
		$data['metaurl']	= $m[3];
	}

	$rsChildren = 
			CIBlockSection::GetList(array('SORT' => 'ASC'), array(
					'IBLOCK_TYPE_ID' => 'content',
					'IBLOCK_ID' => $site['ID'], 
					'SECTION_ID' => $current ? $current['ID'] : null, 
					'ACTIVE' => 'Y'
				),
				false,
				array('*', 'UF_*')
			);

	if ($_REQUEST['children'] && ($childrenDepth = intval($_REQUEST['children'])) > 0) {
		while ($section = $rsChildren->GetNext()) {
			$data['children'][] = callMetafunction(
				'structure', 
				$_REQUEST['path'].'/'.$section['CODE'], 
				array_merge(
					$_REQUEST, 
					array('children' => $childrenDepth - 1)
				)
			);
		}
	}
	else {
		while ($child = $rsChildren->GetNext()) {
			$data['children'][] = array(
				'id'	=> $child['ID'],
				'name'	=> $child['NAME'],
				'url'	=> $_REQUEST['path'].$child['CODE'].'/'.($child['UF_QUERY_STRING'] ? '?'.$child['UF_QUERY_STRING'] : null),
				//'_donotuse' => $child,
			);
		}
	}

	outputJson($data, $_GET['callback']);
}
catch (RhdNotFoundException $e) {
	include $_SERVER['DOCUMENT_ROOT'].'/404.php';
	die();
}