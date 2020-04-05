<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/main/include/prolog_before.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/bitrix/php_interface/client-init.php';

header('Content-Type: text/javascript; charset=UTF-8');

$site = RhdHandler::getSite();

$data = null;

switch ($_REQUEST['type']) {
	case 'list':
		$lastSection = RhdHandler::getLastSection();

		$filter = array('SECTION_ID' => $lastSection['ID']);
		if (RhdHandler::isIrNews()) {
			if (RhdHandler::isEnglish()) {
				$filter = array(
					'ACTIVE' => 'Y',
					'IBLOCK_ID' => RhdHandler::getIBlockId(),
					array(
						'LOGIC' => 'OR',
						'SECTION_ID' => array($lastSection['ID'], 7471),
						'=PROPERTY_IN_IR_NEWS_VALUE' => '1',
					)
				);
			}
			else {
				$filter = array(
					'ACTIVE' => 'Y',
					'IBLOCK_ID' => RhdHandler::getIBlockId(),
					array(
						'LOGIC' => 'OR',
						'SECTION_ID' => $lastSection['ID'],
						'=PROPERTY_IN_IR_NEWS_VALUE' => '1',
					)
				);
			}
		}

		if (RhdHandler::getJustPath() === 'branch/safety/tech_policy/news/') {
			$filter = array(
				'ACTIVE' => 'Y',
				'IBLOCK_ID' => RhdHandler::getIBlockId(),
				array(
					'LOGIC' => 'OR',
					'SECTION_ID' => $lastSection['ID'],
					'=PROPERTY_IN_TECHPOL_NEWS_VALUE' => '1',
				)
			);	
		}

		if (RhdHandler::getJustPath() === 'branch/safety/environmental/news/') {
			$filter = array(
				'ACTIVE' => 'Y',
				array(
					'LOGIC' => 'OR',
					'SECTION_ID' => $lastSection['ID'],
					'PROPERTY_IN_ENVSAFE_NEWS_VALUE' => 1,
				)
			);
		}

		if ($lastSection['ID'] == '7726') {
			$filter = array(
				'ACTIVE' => 'Y',
				'SECTION_ID' => array($lastSection['ID'], 5064),
			);
		}

		if ($lastSection['UF_ENABLE_ARCHIVE'] || RhdHandler::isAtNews() || RhdHandler::getJustPath() === 'press/interview/') {
			$dates = array();

			$firstItem = getBorderItem($filter, false);
			$lastItem = getBorderItem($filter, true);

			$firstDate = getMonthAndYear($firstItem['DATE_ACTIVE_FROM']);
			$lastDate = getMonthAndYear($lastItem['DATE_ACTIVE_FROM']);

			for ($year = $firstDate['year']; $year <= $lastDate['year']; $year++) {
				$dates[$year] = array();
				  
				for ($month = 1; $month <= 12; $month++) {
					if ($year === $firstDate['year'] && $month < $firstDate['month']) {
						continue;
					}
				  
					if ($year === $lastDate['year'] && $month > $lastDate['month']) {
					 	break;
				 	}
				  
					$dates[$year][] = $month;
			 	}
			}

			$currentDate = $lastDate;

			if (isset($_GET['date'])) {
				list($year, $month) = explode('-', $_GET['date']);
				if (
					$year
					&& $month
					&& is_numeric($year)
					&& is_numeric($month)
					&& ($year = intval($year))
					&& ($month = intval($month))
					&& (
						($year > $firstDate['year'] || ($year === $firstDate['year'] && $month >= $firstDate['month']))
						&& ($year < $lastDate['year'] || ($year === $lastDate['year'] && $month <= $lastDate['month']))
					)
				) {
					$currentDate = compact('month', 'year');
				}
			}

			if (isset($_GET['withImages']) && intval($_GET['withImages'])) {
				$filter['!PROPERTY_GALLERY'] = false;
			}

			if (isset($_GET['months']) && intval($_GET['months'])) {
				$_GET['since'] = strtotime('-'.intval($_GET['months']).'months');
			}

			if (isset($_GET['since']) && intval($_GET['since'])) {
				$sinceFilter = intval($_GET['since']);
			}

			$isLastMonth = ($currentDate['month'] === 12);
			$dateFrom = mktime(0, 0, 0, $currentDate['month'], 1, $currentDate['year']);
			$dateTo = mktime(0, 0, 0, $isLastMonth ? 1 : $currentDate['month'] + 1, 1, $isLastMonth ? $currentDate['year'] + 1 : $currentDate['year']);

			if ($hasLimit = isset($_GET['limit']) && is_numeric($_GET['limit'])) {
				$limit = intval($_GET['limit']);
				$limit = $limit < 0 || $limit > 100 ? 20 : $limit;
				$currentDate = null;
			}
			else {
				$limit = null;
			}
			$additionalFilter = 
				$hasLimit || $sinceFilter
					? array(
						'ACTIVE' => 'Y',
					)
					: array(
						'ACTIVE' => 'Y',
						'><DATE_ACTIVE_FROM' => 
						array(
							date('d.m.Y H:i:s', $dateFrom),
							date('d.m.Y H:i:s', $dateTo),
						)
					);

			$filter['CHECK_PERMISSIONS'] = 'N';
			$filter['!CODE'] = '_files';

			$itemsRs = 
				CIBlockElement::GetList(
					array('DATE_ACTIVE_FROM' => 'desc'), 
					array_merge(
						$filter,
						$additionalFilter
					),
					array('ID', 'NAME'),
					$hasLimit ? array('nTopCount' => $limit) : false,
					array(
						'ID','NAME','CODE','SECTION_ID','DATE_ACTIVE_FROM',
						//'PROPERTY_SHOW_DATE',
						//'PROPERTY_SHOW_DISCLAIMER',
						//'PROPERTY_IN_ENVSAFE_NEWS',
						//'PROPERTY_IN_TECHPOL_NEWS',
						'PROPERTY_GALLERY',
					)
				);
			$items = array();

			while ($item = $itemsRs->GetNext()) {
				$d = date_create_from_format('d.m.Y H:i:s', $item['ACTIVE_FROM']) ?: date_create_from_format('d.m.Y', $item['ACTIVE_FROM']);
				if (
					$sinceFilter
					&& ($d->getTimestamp() < $sinceFilter)
				) {
					break;
				}
				$item['NAME'] = parseText($item['NAME']);
				$items[$item['ID']] = array(
					'type' => 'element',
					'id' => $item['ID'], 
					'name' => $item['~NAME'],
					'url' => grabLinkFromTitle($item['NAME']) ?: '/'.RhdHandler::getJustPath().$item['ID'].'.html',
					'created' => $item['ACTIVE_FROM'],
				);
			}
			$items = array_values($items);
			$supported = true;
		}
		else {
			$dates = array();
			$lastDate = null;
			$currentDate = null;
			$items = array();
			//$supported = false;

			$filter['!CODE'] = '_files';
			//$filter['ACTIVE'] = 'Y';

			$itemsRs = 
				CIBlockElement::GetList(
					array('DATE_ACTIVE_FROM' => 'desc'), 
					array_merge(
						$filter,
						array()
					),
					false,
					false,
					array(
						'*',
						//'PROPERTY_SHOW_DATE',
						//'PROPERTY_SHOW_DISCLAIMER',
						'PROPERTY_IN_ENVSAFE_NEWS',
						'PROPERTY_IN_TECHPOL_NEWS',
						'PROPERTY_GALLERY',
					)
				);
			$items = array();

			while ($item = $itemsRs->GetNext()) {
				if (
					$sinceFilter
					&& (date_create_from_format('d.m.Y H:i:s', $item['DATE_CREATE'])->getTimestamp() <= $sinceFilter)
				) {
					//var_dump($item['TIMESTAMP_X'], date_create_from_format('d.m.Y H:i:s', $item['TIMESTAMP_X'])->getTimestamp());
					continue;
				}
				$item['NAME'] = parseText($item['NAME']);
				$items[$item['ID']] = array(
					'type' => 'element',
					'id' => $item['ID'], 
					'name' => $item['~NAME'],
					'url' => grabLinkFromTitle($item['NAME']) ?: '/'.RhdHandler::getJustPath().$item['ID'].'.html',
					'created' => $item['DATE_ACTIVE_FROM'],
				);
			}
			$items = array_values($items);
			$supported = true;
		}

		$timestamp = time();
		$yearAgo = strtotime('-1year', $timestamp);

		$data = array(
			'type'			=> 'section',
			'code'			=> $lastSection['CODE'],
			'url'			=> '/'.RhdHandler::getJustPath(),
			'title'			=> strip_tags($lastSection['NAME']),
			'content'		=> RhdHandler::isAtNews() ? null : stripArgs($lastSection['DESCRIPTION']),
			'children'		=> $items,
			'filter'		=> compact('supported', 'timestamp', 'dates', 'currentDate', 'lastDate', 'limit'),
			'_donotuse'		=> null,
		);
		break;

	case 'detail':
		global $disclaimers;

		$element 			= RhdHandler::getElement();
		$props 				= getElementProps($element['IBLOCK_ID'] ?: $site['ID'], $element['ID']);

		$disclaimerType 	= (int)end(explode(' ', $element['PROPERTY_DISCLAIMER_VALUE']));
		if ($disclaimerType) $disclaimerType = 'type'.$disclaimerType;

		$disclaimerType 	= in_array($element['PROPERTY_DISCLAIMER_ENUM_ID'], array(23224, 23221)) ? 'type2' : 'type1';

		$data = array(
			'type'			=> 'element',
			'created'		=> $element['DATE_ACTIVE_FROM'],//DateTime::createFromFormat('d.m.Y H:i:s', $element['DATE_ACTIVE_FROM'])->getTimestamp(),
			'title'			=> strip_tags($element['~NAME']),
			'content' 		=> stripArgs($element['DETAIL_TEXT']),
			'attachments' 	=> getMobileFileArray($props),
			'images'		=> createMobileGallery($props),
			'tags'			=> array_map('trim', explode(',', $element['TAGS']) ?: array()),
			'disclaimers'	=> $props['NEED_DISCLAIMER'][0]['VALUE_ENUM'] ? $disclaimers['ru'][$disclaimerType] : array(),
		);
		break;
}

outputJson($data, $_GET['callback']);