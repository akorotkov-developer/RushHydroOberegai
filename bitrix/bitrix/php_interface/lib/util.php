<?php
function extractPropValues($iblockId, $prop) {
	$enumRs = CIBlockPropertyEnum::GetList(array(), array('PROPERTY_ID' => $prop, 'IBLOCK_ID' => $iblockId));
	$values = array();
	while ($item = $enumRs->GetNext()) {
		$values[$item['XML_ID']] = $item['VALUE'];
	}

	return $values;
}

function extractPropIds($iblockId, $prop) {
	$enumRs = CIBlockPropertyEnum::GetList(array(), array('PROPERTY_ID' => $prop, 'IBLOCK_ID' => $iblockId));
	$values = array();
	while ($item = $enumRs->GetNext()) {
		$values[$item['XML_ID']] = $item['ID'];
	}

	return $values;
}

function getElementProps($iblockId, $elementId) {
	$propsRs = CIBlockElement::GetProperty($iblockId, $elementId, array(), array());
	$props = array();
	while ($prop = $propsRs->Fetch()) {
		if (!isset($props[$prop['CODE']])) {
			$props[$prop['CODE']] = array();
		}
		if ($prop['VALUE']) {
			$props[$prop['CODE']][] = $prop;
		}
	}

	return $props;
}

function createGallery($props) {
	$gallery = array();
	if (!empty($props['GALLERY'])) {
		$props['GALLERY'] = sortByKey($props['GALLERY'], 'DESCRIPTION', '|');
		foreach ($props['GALLERY'] as $prop) {
			$imgProp = CFile::GetByID($prop['VALUE'])->GetNext();

			$w = $imgProp['WIDTH'];
			$h = $imgProp['HEIGHT'];

			list($w, $h) =
				($h > $w)
					? array(150, 150 * $h / $w)
					: array(120 * $w / $h, 120);

			$img = CFile::ResizeImageGet($prop['VALUE'], array('width' => $w, 'height' => $h), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			//var_dump($prop);
			$path = CFIle::GetPath($prop['VALUE']);
			if (!RhdHandler::$ogImage) RhdHandler::$ogImage = 'http://www.rushydro.ru'.$path;
			$prop['DESCRIPTION'] = descWithoutSortNumb($prop['DESCRIPTION'], '|');
			$gallery[] = array('DESCRIPTION' => $prop['DESCRIPTION'], 'HTML' => '<a rel="prettyPhoto[gallery]" href="'.$path.'" title="'.htmlspecialchars($prop['DESCRIPTION']).'"><img width="'.$img['width'].'" height="'.$img['height'].'" src="'.$img['src'].'" /></a>');
		}
	}

	return $gallery;
}

/**
 * сортировка по ключу
 *
 * @param array $arr
 * @param string $field поле с разделителем
 * @param string $delimiter def |
 *
 * @return mixed
 */
function sortByKey($arr, $field, $delimiter = '|') {
	$delimiterExists = false;
	foreach ( $arr as $key => $el ) {
		if ( strpos($el[$field], $delimiter) === false ) {
			continue;
		} else {
			$delimiterExists = true;
			$el[$field]      = explode($delimiter, $el[$field]);
			if ( ! empty($el[$field][1]) ) {
				$arr[$key]['SORT'] = (int) htmlspecialchars(trim($el[$field][1]));
			}
		}
	}
	if ( $delimiterExists ) {
		if ( ! file_exists('sortFunc') ) {
			function sortFunc($a, $b) {
				if ( $a['SORT'] == $b['SORT'] ) {
					return 0;
				}

				return $a['SORT'] > $b['SORT'] ? 1 : - 1;
			}
		}

		usort($arr, 'sortFunc');
	}

	return $arr;
}

/**
 * отброска всего после разделителя
 *
 * @param string $field
 * @param string $delimiter def |
 *
 * @return mixed
 */
function descWithoutSortNumb($field, $delimiter = '|') {
	$explode = explode($delimiter, $field);

	return $explode[0];
}

function getFileArray($props) {
	if (empty($props['FILES'])) return array();

	$files = array();
	foreach ($props['FILES'] as $prop) {
		$data = CFile::GetByID($prop['VALUE'])->GetNext();
		$path = CFile::GetPath($prop['VALUE']);
		$login = null;
		$password = null;
		$passwordProtected = isFilePasswordProtected($data['DESCRIPTION'], $login, $password);
		$files[] =
			array(
				'ID' => $data['ID'],
				'ORIGINAL_NAME' => $data['ORIGINAL_NAME'],
				'FILE_NAME' => $data['FILE_NAME'],
				'PATH' => $path,
				'DESCRIPTION' => $data['DESCRIPTION'],
				'PASSWORD_PROTECTED' => $passwordProtected,
				'LOGIN' => $login,
				'PASSWORD' => $password,
			);
	}

	return $files;
}

function createMobileGallery($props) {
	$gallery = array();
	if (!empty($props['GALLERY'])) {
		foreach ($props['GALLERY'] as $prop) {
			$imgProp = CFile::GetByID($prop['VALUE'])->GetNext();

			$w = $imgProp['WIDTH'];
			$h = $imgProp['HEIGHT'];

			list($w, $h) =
				($h > $w)
					? array(150, 150 * $h / $w)
					: array(120 * $w / $h, 120);

			$img = CFile::ResizeImageGet($prop['VALUE'], array('width' => $w, 'height' => $h), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			//var_dump($prop);
			$gallery[] = array(
				'full_size_url' => 'http://www.rushydro.ru'.CFIle::GetPath($prop['VALUE']),
				//'thumb_url' => 'http://www.rushydro.ru'.$img['src'],
				'description' => $prop['DESCRIPTION'],
			);
		}
	}

	return $gallery;
}

function getMobileFileArray($props) {
	if (empty($props['FILES'])) return array();

	$files = array();
	foreach ($props['FILES'] as $prop) {
		$data = CFile::GetByID($prop['VALUE'])->GetNext();
		$path = CFile::GetPath($prop['VALUE']);

		$login = null;
		$password = null;
		$passwordProtected = isFilePasswordProtected($data['DESCRIPTION'], $login, $password);
		if ($passwordProtected) continue;

		$files[] =
			array(
				'name' => $data['ORIGINAL_NAME'],
				'url' => 'http://www.rushydro.ru'.$path,
				'description' => $data['DESCRIPTION'],
				'size' => filesize($_SERVER['DOCUMENT_ROOT'].$path),
				'type' => strtolower(pathinfo($path, PATHINFO_EXTENSION)),
			);
	}

	return $files;
}

function isFilePasswordProtected($description, &$login, &$password) {
	$result = (bool) preg_match('/L: *(.*) *; *P: *(.*) */i', $description, $matches);
	if ($result && $matches) {
		$login = $matches[1];
		$password = $matches[2];
	}

	return $result;
}

function getBorderItem($filter, $last = false) {
	if (!is_array($filter)) {
		$filter = array('SECTION_ID' => $filter);
	}
	$filter['>DATE_ACTIVE_FROM'] = '0';
	return
		CIBlockElement::GetList(
			array('DATE_ACTIVE_FROM' => ($last ? 'desc': 'asc')),
			$filter,
			false,
			array('nTopCount' => 1),
			array('*')
		)->
		GetNext();
}

function getMonthAndYear($date) {
	$month = null;
	$year = null;
	preg_replace('/\d\.(\d+)\.(\d+)/e', '($month = (int) "\\1") && ($year = (int) "\\2")', $date);
	return compact('month', 'year');
}

function grabLinkFromTitle(&$title) {
	$title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
	$link = null;
	preg_replace('/href="([^"]+)"/ie', '$link=\'\\1\';', $title);
	$title = strip_tags($title);
	return $link;
}

function parseTitle($text) {
	//$text = html_entity_decode($text, ENT_COMPAT, 'UTF-8');
	$text = parseText($text);
	return $text;
}

function parseText($text, $dropMediaplayer = false) {
	$text =
		str_ireplace(
			array(
				'style="height: 25px; background-color: rgb(0, 65, 128);"',
				'style="background-color: rgb(0, 65, 128); height: 30px;"',
				'style="height: 30px; background-color: rgb(0, 65, 128);"',
				'style="background-color: rgb(0, 65, 128); height: 50px;"',
				'style="background-color: rgb(0, 65, 128); height: 25px;"',
				'style="height: 40px; background-color: rgb(0, 65, 128);"',
				'style="background-color: rgb(0, 65, 128); height: 22px;"',
				'style="background-color: rgb(0, 65, 128); height: 26px;"',
				'style="background-color: rgb(0, 65, 128);"',
				'style="background-color: rgb(0, 65, 128); text-align: left;"',
				'style="background-color: rgb(0, 65, 128); text-align: center;"',
				'background-color: rgb(0, 65, 128); style="height: 30px;"',
				'style="height: 15px; background-color: rgb(0, 65, 128);"',
				'style="TEXT-ALIGN: left; BACKGROUND-COLOR: rgb(0,65,128)"',

				'style="background-color: rgb(180, 183, 210); height: 30px;"',
				'style="height: 30px; background-color: rgb(180, 183, 210);"',
				'style="background-color: rgb(180, 183, 210); height: 50px;"',
				'style="background-color: rgb(180, 183, 210); height: 25px;"',
				'style="background-color: rgb(180, 183, 210); height: 20px;"',
				'style="background-color: rgb(180, 183, 210); height: 26px;"',
				'style="height: 40px; background-color: rgb(180, 183, 210);"',
				'style="HEIGHT: 50px; BACKGROUND-COLOR: rgb(180,183,210)"',
				'style="BACKGROUND-COLOR: rgb(180,183,210); HEIGHT: 50px"',
				'style="BACKGROUND-COLOR: rgb(180,183,210); HEIGHT: 30px"',
				'style="BACKGROUND-COLOR: #b4b7d2; HEIGHT: 50px"',
				'style="BACKGROUND-COLOR: #b4b7d2; HEIGHT: 20px"',
				'style="TEXT-ALIGN: left; BACKGROUND-COLOR: rgb(180,183,210)"',
				'style="BACKGROUND-COLOR: rgb(180,183,210)" 22?=""',
				'style="BACKGROUND-COLOR: rgb(180,183,210); HEIGHT: 25px"',
				'style="BACKGROUND-COLOR: rgb(180,183,210)" 25px;?="" height:=""',
				'style="BACKGROUND-COLOR: rgb(180,183,210)"',
				'style="background-color: rgb(180, 183, 210)"',

				'style="BACKGROUND-COLOR: #b4b7d2; HEIGHT: 30px"',
				'style="BORDER-BOTTOM: #e9b761 1px solid; BORDER-LEFT: #e9b761 1px solid; WIDTH: 150px; BORDER-TOP: #e9b761 1px solid; BORDER-RIGHT: #e9b761 1px solid"',
				'style="BORDER-BOTTOM: #e9b761 1px solid; BORDER-LEFT: #e9b761 1px solid; WIDTH: 300px; BORDER-TOP: #e9b761 1px solid; BORDER-RIGHT: #e9b761 1px solid"',

				'www.rushydro.ru/company/management/',

				'border: 1px solid rgb(0, 65, 128);',
				'border: 1px solid rgb(0, 0, 0);',
				'background-color: rgb(180, 183, 210);',
				'style="BORDER-BOTTOM: 1px solid; TEXT-ALIGN: center; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"',
				'style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"',
				'style="BORDER-BOTTOM: 1px solid; TEXT-ALIGN: left; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"',
				'style="BORDER-BOTTOM: 1px solid; TEXT-ALIGN: right; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"',
				'style="BORDER-BOTTOM: #004180 1px solid; BORDER-LEFT: #004180 1px solid; BORDER-TOP: #004180 1px solid; BORDER-RIGHT: #004180 1px solid"',
				'style="BORDER-BOTTOM: #004180 1px solid; TEXT-ALIGN: center; BORDER-LEFT: #004180 1px solid; BORDER-TOP: #004180 1px solid; BORDER-RIGHT: #004180 1px solid"',
				'style="BORDER-BOTTOM: #004180 1px solid; TEXT-ALIGN: right; BORDER-LEFT: #004180 1px solid; BORDER-TOP: #004180 1px solid; BORDER-RIGHT: #004180 1px solid"',

				'rel="gallery1"',

				'class=MsoNormalTable style="MARGIN: auto auto auto 5.4pt; BORDER-COLLAPSE: collapse; mso-table-layout-alt: fixed; mso-yfti-tbllook: 1184; mso-padding-alt: 0cm 5.4pt 0cm 5.4pt" cellSpacing=0 cellPadding=0 width=1341',

				'style="border: 1px solid rgb(233, 183, 97); text-align: center;"',
			),
			array(
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',
				'class="tbl_h"',

				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',
				'class="tr_tbl_bg"',

				'class="tr_tbl_bg"',
				'',
				'',

				'www.rushydro.ru/corporate/',

				'',
				'',
				'background-color: #f0f4f5;',
				'style="text-align:left"',
				'style="text-align:left"',
				'style="text-align:left"',
				'style="text-align:left"',
				'',
				'',
				'',

				'rel="prettyPhoto[gallery]"',

				'',

				'style="text-align: center;"',
			),
			$text
		);

	if (RhdHandler::isMainSite()) {
		$text =
			str_replace(
				array(
					'"/company/management/',
					'corporate/board/committees',
					'www.rushydro.ru/press/news-materials/material',
					'/rushydro.ru/press/news-materials/material',
				),
				array(
					'"/corporate/',
					'corporate/committees',
					'www.rushydro.ru/press/material',
					'/rushydro.ru/press/material',
				),
				$text
			);
	}

	$text =
		str_replace(
			array('╚', 			'╩',		'⌠', '■', '▓', '╧', 		'╘',		'═',		'╥',		'√',		'',		'≈'),
			array('&laquo;',	'&raquo;',	'"', '"', '’', '&mdash;',	'&copy;', 	'&nbsp;',	'&middot;',	'&mdash;',	'&bull;',	'—'),
			$text
		);

	$text =
		preg_replace(
			array(
				// парсим ссылки на загруженные файлы и файлы старого дизайна

				// - с относительными путями
				'/(\.\.\/)+(file|images|pic)\//',
				// - с путями с именем сайта
				//'/http:\/\/(.*)rushydro\.ru\/(file|images|pic)\//',
				// - с путями от корня
				'/="\/(file|images|pic)\//im',

				// парсим ссылки на разделы/документы с путями от корня
				'/="\/([^\"]+)"/im',

				// парсим адреса сайтов
				'/http:\/\/www\.([^\.]+)\.rushydro\.ru\//ime',
				'/http:\/\/www\.rushydro\.ru\//im',

				// удаляем свойства с префиксом mce_.
				'/mce_[a-z0-9]+="[^\"]+"/im'
			),
			array(
				'/\\2/',
				//'/\\2/',
				'="'.RhdHandler::getSiteRoot(false, true).'\\1/',

				'="'.RhdHandler::getSiteRoot(false, true).'\\1"',
				'RhdPath::createUrl("\\1")',
				RhdPath::createUrl('www'),

				'',
			),
			$text
		);


	if ($dropMediaplayer) {
		$text = dropMediaplayer($text);
	}
	/*$text =
		$dropMediaplayer
		  ? dropMediaplayer($text)
		  : addMediaplayer($text);*/

	$e2i = new email2img;
	$text = $e2i->parse($text);

	return $text;
}

function getWordWithEnding($word, $number, $endings = array('', 'а', 'ов')) {
	$twoDigits = round($number) % 100;
	if ($twoDigits > 10 && $twoDigits < 20) {
		return $word.$endings[2];
	}

	$number = round($number) % 10;
	if ($number === 1) {
		$ending = $endings[0];
	}
	else if ($number > 1 && $number < 5) {
		$ending = $endings[1];
	}
	else {
		$ending = $endings[2];
	}

	return $word.$ending;
}

function dropMediaplayer($text) {
	$text = preg_replace('/\[mediaplayer([^\]]+)\]/im', '', $text);
	return $text;
}

function addMediaplayer($bodytext, $n=1) {
	$new_bodytext = $bodytext;
	if(preg_match('/\[mediaplayer ([^\]]+)\]/ims', $bodytext, $media)) {

		$player_austart = '';
		$player_file = '';
		if(preg_match('/file=([^ \]]+)/ims', $media[1], $mm)) {
			$player_file = trim($mm[1]);
		}
		/*if(preg_match('/size=(\d+)x(\d+)/ims', $media[1], $mm)) {
			$player_width = (int)$mm[1];
			$player_height = (int)$mm[2] + 20;
		}
		if(preg_match('/image=([^ \]]+)/ims', $media[1], $mm)) {
			$player_image = trim($mm[1]);
		}
		if(preg_match('/style=([^ \]]+)/ims', $media[1], $mm)) {
			$player_style = trim($mm[1]);
		}*/
		if(preg_match('/autostart/ims', $media[1], $mm)) {
			//$player_autostart = 'true';
			$player_austart = ',"auto":"play"';
		}
		if(preg_match('/poster=([^ \]]+)/ims', $media[1], $mm)) {
			$player_image = ',"poster":"'.trim($mm[1]).'"';
		}

		if (!IS_MOBILE) {
			$player_code = '
			<div id="videoplayer'.$n.'" style="text-align:center;">
			</div>
			<script type="text/javascript">
				var flashvars = {"st":"'.RhdHandler::getSiteRoot().'player/styles.txt","file":"'.$player_file.'","uid":"videoplayer'.$n.'"'.$player_austart.$player_image.'};var params = {wmode:"transparent", allowFullScreen:"true", allowScriptAccess:"always",id:"videoplayer'.$n.'"}; new swfobject.embedSWF("'.RhdHandler::getSiteRoot().'player/uppod-new.swf", "videoplayer'.$n.'", "620", "350", "9.0.115.0", "'.RhdHandler::getSiteRoot().'player/expressInstall.swf", flashvars, params);
			</script>	
			<noscript>		
				<p style="text-align:center; padding:30px 30px 0; font-size:1.2em;">В Вашем браузере отключен JavaScript. Для корректной работы сайта рекомендуется его включить в настройках Вашего браузера.</p>
			</noscript>
		';
		} else {
			$player_code = '<video src="'.$player_file.'" type="video/mp4" controls width="620" height="350"></video>';
		}


		$new_bodytext = preg_replace('/\[mediaplayer ([^\]]+)\]\s*/ims', $player_code, $bodytext, 1);
		$new_bodytext = addMediaplayer($new_bodytext, $n+1);
	}
	return $new_bodytext;
}



function stripArgs($text) {
	$text = preg_replace('/\[mediaplayer[^\]]+\]/', '', $text);

	// remove some attributes
	$text = preg_replace('/\s*(style|id|valign|cellpadding|cellspacing|alt|target|title|size|border)="[^"]+"/ims', '', $text);

	// remove tag and its content
	foreach (array('script', 'noscript', 'object',) as $tag) {
		$text = preg_replace('/<'.$tag.'.+<\/\s*'.$tag.'>/Umis', '', $text);
	}

	// remove tag, extract its content
	foreach (array('b', 'font',) as $tag) {
		$text = preg_replace('/<(\s\/\s*)*'.$tag.'[^>]*>/Umis', '', $text);
	}

	// remove empty tag
	foreach (array('b', 'strong', 'i', 'div', 'span', 'p',) as $tag) {
		$text = preg_replace('/<'.$tag.'[^>]*>[\s\r\n]*(<\s*\/*\s*br\s*\/*\s*>)*[\s\r\n]*<\/\s*'.$tag.'>/Umis', '', $text);
	}

	// remove table with attachments
	//$text = preg_replace('/<table.+icon_(pdf|doc|tif|xls|zip).+<\s*\/\s*table>/Umis', '', $text);

	// minify whitespaces
	$text = preg_replace('/[\s\r\n]+/ms', ' ', $text);

	// create absolute urls
	$text = preg_replace('/(src|href)="\//i', '\\1="http://www.rushydro.ru/', $text);

	// M A G I C
	$text = trim($text);

	return $text;
}


function outputJson($data, $callback = null) {

	$data = json_encode($data);
	$data = preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", $data);

	/*require_once 'Services/JSON.php';

	$json = new Services_JSON;
	$data = $json->encode($data);*/

	if (!headers_sent()) {
		header('Content-Type: application/json');
	}

	echo isset($callback) ? $callback.'('.$data.');' : $data;
}

function callMetafunction($func, $path, $params = array()) {
	// При Сталине такого не было.

	unset($params['path']);
	unset($params['type']);
	unset($params['PHPSESSID']);

	$url = 'http://m.'.SITE_SERVER_NAME.'/'.strtolower($func).''.$path.'?'.http_build_query($params);
	return json_decode(file_get_contents($url), true);
}