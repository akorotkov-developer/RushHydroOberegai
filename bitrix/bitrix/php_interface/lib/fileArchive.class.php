<?php
class FileArchive {

	const UPLOAD_PATH = '/upload/docs/';

	protected $path = null;

	public function __construct() {
		$this->path = $_SERVER['DOCUMENT_ROOT'].self::UPLOAD_PATH;
	}

	protected function getPropertyId($sectionId, $code) {
		global $DB;

		$rs 			= $DB->Query('SELECT p.ID id FROM b_iblock_property p LEFT JOIN b_iblock_section s ON (s.IBLOCK_ID = p.IBLOCK_ID) WHERE s.ID = '.$sectionId.' AND p.CODE = \''.$code.'\'');
		$id 			= ($prop = $rs->GetNext()) ? $prop['id'] : null;
		unset($rs);

		return $id;
	}

	protected function getSubsectionIds($sectionId) {
		global $DB;

		$ids 			= array();
		$onceIds 		= array(intval($sectionId));

		while ($onceIds && ($rs = $DB->Query('SELECT s.ID id FROM b_iblock_section s WHERE s.IBLOCK_SECTION_ID IN ('.implode(', ', $onceIds).')'))) {
			$onceIds = array();
			while ($s = $rs->GetNext()) {
				$onceIds[] = intval($s['id']);
			}
			unset($rs);

			$ids = array_merge($ids, $onceIds);
		}

		return $ids;
	}

	protected function getElementIds($sectionIds) {
		global $DB;

		$ids 			= array();

		$rs = $DB->Query('SELECT e.ID id FROM b_iblock_element e WHERE e.IBLOCK_SECTION_ID IN ('.implode(', ', $sectionIds).')');
		while ($e = $rs->GetNext()) {
			$ids[] = intval($e['id']);
		}
		unset($rs);

		return $ids;
	}

	protected function extractFilenames($text) {
		$names = array();

		$text = html_entity_decode($text, ENT_COMPAT, 'UTF-8');

		$doc = new DOMDocument;
		$doc->substituteEntities = true;
		$doc->loadHTML('<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /></head><body>'.$text.'</body></html>');
		$as = $doc->getElementsByTagName('a');
		for ($i = 0; $i < $as->length; $i++) {
			$href 		= $as->item($i)->attributes->getNamedItem('href')->value;
			$path 		= parse_url($href, PHP_URL_PATH);
			$pathinfo 	= pathinfo($path);

			$names[$pathinfo['basename']] = trim($as->item($i)->nodeValue) ?: $pathinfo['filename'];
		}

		return $names;
	}

	protected function getFilenames($sectionIds) {
		global $DB;

		$names 	= array();

		$rsS = $DB->Query('SELECT s.DESCRIPTION description FROM b_iblock_section s WHERE s.ID IN ('.implode(', ', $sectionIds).')');
		while ($s = $rsS->GetNext()) {
			$names = array_merge($names, $this->extractFilenames($s['description']));
		}
		unset($rsS);

		$rsE = $DB->Query('SELECT e.DETAIL_TEXT detail_text FROM b_iblock_element e LEFT JOIN b_iblock_section_element se ON (se.IBLOCK_ELEMENT_ID = e.ID) WHERE se.IBLOCK_SECTION_ID IN ('.implode(', ', $sectionIds).')');
		while ($e = $rsE->GetNext()) {
			$names = array_merge($names, $this->extractFilenames($e['detail_text']));
		}
		unset($rsE);

		return $names;
	}

	protected function getYear($name) {
		$m = null;
		if (!preg_match('/(\d{4,4})/', $name, $m)) return;

		return intval($m[1]);
	}

	protected function getMonth($name) {
		$months = array(
			'январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь', 
			'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december',
		);
		$digits = array('i', 'ii', 'iii', 'iv');

		$m = array();

		if (preg_match('/('.implode('|', $months).')/iu', $name, $m)) {
			return (array_search(mb_strtolower($m[1]), $months, true) + 1) % 12;
		}

		if (preg_match('/('.implode('|', $digits).')\s+квартал/iu', $name, $m)) {
			return (array_search(mb_strtolower($m[1]), $digits, true) + 1) * 3;
		}

		return 0;
	}

	protected function getWeight($name) {
		$year 	= $this->getYear($name);
		$month 	= $this->getMonth($name);

		return $year.($month < 10 ? '0' : '').$month;
	}

	public function sortFiles($f1, $f2) {
		return strcmp($this->getWeight($f2['name']).$f2['name'], $this->getWeight($f1['name']).$f1['name']);
	}

	public function getFiles($sectionId) {
		global $DB;

		$files 			= array();
		$propId			= $this->getPropertyId($sectionId, 'FILES');
		$sectionIds 	= array_merge(
							array($sectionId), 
							$this->getSubsectionIds($sectionId)
						);
		$elementIds 	= $this->getElementIds($sectionIds);
		$names 			= $this->getFilenames($sectionIds);

		if (!$elementIds) return array();


		$sections = array();

		$rs = $DB->Query(
			'SELECT f.ID id, f.SUBDIR path, f.FILE_NAME name, f.DESCRIPTION description, se.IBLOCK_SECTION_ID sid '
			.'FROM b_iblock_element_property p '
				.'LEFT JOIN b_file f ON (p.VALUE = f.ID) '
				.'LEFT JOIN b_iblock_section_element se ON (p.IBLOCK_ELEMENT_ID = se.IBLOCK_ELEMENT_ID) '
			.'WHERE '
				.'(p.IBLOCK_ELEMENT_ID IN ('.implode(', ', $elementIds).') AND IBLOCK_PROPERTY_ID = '.$propId.' AND f.DESCRIPTION NOT LIKE \'%!%\') '
				.'OR (f.DESCRIPTION LIKE \'%+'.$sectionId.'%\')'
		);
		while ($f = $rs->GetNext()) {
			$pathinfo = pathinfo($f['name']);

			$f['description'] = preg_replace(array('/!/', '/\+\d+/'), array('', ''), $f['description']);

			if ($f['description'] || $names[$f['name']]) {
				$url 	= 'upload/'.$f['path'].'/'.$f['name'];
				$path 	= $_SERVER['DOCUMENT_ROOT'].'/'.$url;
				$url 	= RhdHandler::getSiteRoot().$url;

				$sections[intval($f['sid'])] = array();

				$files[] = array(
					'id'	=> intval($f['id']),
					'name'	=> trim($f['description'] ?: ($names[$f['name']] ?: $pathinfo['filename'])),
					'url'	=> $url,
					//'path'	=> $path,
					'size'	=> filesize($path),
					'type'	=> strtolower($pathinfo['extension']),
					'parent'=> &$sections[intval($f['sid'])],
				);
			}
		}
		unset($rs);

		foreach ($sections as $id => $section) {
			$section = CIBlockSection::GetByID($id)->GetNext();

			$sections[$id] = array(
				'id' => $id,
				'name' => $section['NAME'],
				'url' => RhdPath::createRelativeUrl(RhdPath::build($id)),

			);
		}

		usort($files, array($this, 'sortFiles'));

		return $files;
	}

	protected function createArchive($name, $files) {
		$zip = new ZipArchive;
		$zip->open($this->path.$name, ZipArchive::OVERWRITE);
		foreach ($files as $f) {
			$zip->addFile($f, pathinfo($f, PATHINFO_BASENAME));
		}
		$zip->close();
	}

	protected function prepareIds($ids) {
		$ids = array_map('intval', $ids);
		$ids = array_unique($ids);
		sort($ids);

		return $ids;
	}

	protected function createArchiveName($ids) {
		return 'rushydro_'.substr(md5(implode('_', $ids)), 0, 16).'.zip';
	}

	public function getArchive($ids) {
		global $DB;

		if (!$ids) return null;

		$ids = $this->prepareIds($ids);
		$name = $this->createArchiveName($ids);

		if (!file_exists($this->path.$name)) {
			$files = array();
			$rs = $DB->Query('SELECT f.SUBDIR path, f.FILE_NAME name FROM b_file f WHERE f.ID IN ('.implode(', ', $ids).')');
			while ($f = $rs->GetNext()) {
				$files[] = $_SERVER['DOCUMENT_ROOT'].'/upload/'.$f['path'].'/'.$f['name'];
			}
			unset($rs);

			if (!$files) return;

			$this->createArchive($name, $files);
		}

		return self::UPLOAD_PATH.$name;
	}



}