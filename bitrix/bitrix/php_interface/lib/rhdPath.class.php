<?php
class RhdPath {
	
	protected static function getSection($siteId, $code, $parent = null) {
		$params = 
			array(
				'ACTIVE' => 'Y',
				'CODE' => $code,
				'IBLOCK_ID' => $siteId,
				'SECTION_ID' => $parent ? $parent['ID'] : null,
			);
		
		$section = 
			CIBlockSection::GetList(
				array(), 
				$params,
				false,
				array('UF_*')
			)->
			GetNext();
		
		if (!$section) {
			throw new RhdNotFoundException('section '.$code.' not found');
		}
		
		return $section;
	}
	
	public static function resolvePath($site, $path) {
		$path = preg_replace('/\/+/', '/', $path);
		$cacheKey = $site['CODE'].'__+__'.$path;
		
		if (
			true || !($sections = RhdMemcache::get($cacheKey))
		) {
			$sections = array();
			$parent = null;
			$section = null;
			
			$parts = explode('/', $path);
			if ($parts && $parts[0] === RhdHandler::getFilialNewsCode()) {
				$sections[RhdHandler::getFilialNewsCode()] = array('NAME' => 'Новости филиалов', 'CODE' => RhdHandler::getFilialNewsCode());
			}
			else {
				if ($parts && ($parts[0] === RhdHandler::getPurchasesSiteCode())) {
					$site = RhdHandler::getPurchasesIBlock();
					$sections[array_shift($parts)] = array('CODE' => $site['CODE'], 'NAME' => $site['NAME'], 'IBLOCK_ID' => $site['ID'], 'ID' => null);
				}
			
				foreach ($parts as $part) {
					if (!$part) continue;
							
					$videoarchiveRename = false;
					if (!defined('MOBILE_STRUCTURE') && ($part === 'vestnik')) {
						$parent = self::getSection(RhdHandler::getMainSiteId(), 'press');
						$site = RhdHandler::getMainSite();
					}

					if (strpos($path, 'press/video') !== false && $part === 'videoarchive' && intval(RhdHandler::getIBlockId()) !== 62) {
						$altSections  = self::resolvePath(RhdHandler::getMainSite(), 'press/about_sshges/');
						$parent = array_pop($altSections);  // self::getSection(RhdHandler::getMainSiteId(), 'press');
						$site = RhdHandler::getMainSite();
						$videoarchiveRename = true;
					}

					$section = self::getSection($site['ID'], $part, $parent);
					if ($videoarchiveRename) $section['NAME'] = 'Видеожурналы';
					
					$parent = $section;
							
					$sections[$part] = $section;
				}
			}
			
			RhdMemcache::set($cacheKey, $sections);
		}
		
		return $sections;
	}

	public static function build($sectionId) {
		$cacheKey = 'pathById_'.$sectionId;
		
		if (!($sections = RhdMemcache::get($cacheKey))) {
			
			$sections = array();
			while (
				$sectionId 
				&& ($section = CIBlockSection::GetByID($sectionId)->GetNext())
			) {
				$sections[$section['CODE']] = $section;
	
				if (empty($section['IBLOCK_SECTION_ID'])) {
					break;
				}
				$sectionId = $section['IBLOCK_SECTION_ID'];
			}
			$sections = array_reverse($sections, true);
			
			RhdMemcache::set($cacheKey, $sections);
		}
		
		return $sections;
	}
	
	public static function toString($path, $noTrailingSlash = false) {
		return implode('/', array_keys($path)).($noTrailingSlash ? '' : '/');
	}
	
	public static function createUrl($site, $path = null, $element = null, $noTrailingSlash = false, $skipSubfolders = false) {
		if (is_array($site)) {
			$site = $site['CODE'];
		}
		
		if (is_array($path)) {
			//var_dump($path);
			$path = self::toString($path, true);
		}
		
		if (is_array($element)) {
			$element = $element['ID'];
		}
		
		if ($site === RhdHandler::getPurchasesSiteCode()) {
			$site = RhdHandler::getMainSiteCode();
			$path = RhdHandler::getPurchasesSiteCode().'/'.$path;
		}

		if (in_array($site, array('international-eng', 'international-rus'))) {
			if ($site === 'international-rus' && !$skipSubfolders) {
				$path = $path ? 'rus/'.$path : 'rus';
			}
			$site = 'international';
		}
		
		$path = 'www.'.($site === RhdHandler::getMainSiteCode() ? '' : $site.'.').BASE_DOMAIN/*.$site*/.($path ? '/'.$path : '').($element ? '/'.$element.'.html' : ($noTrailingSlash ? '' : '/'));
		return 'http://'.preg_replace('/\/+/', '/', $path);
	}

	public static function createRelativeUrl($path = null, $element = null, $noTrailingSlash = false) {
		if (is_array($path)) {
			//var_dump($path);
			$path = self::toString($path, true);
		}
		
		if (is_array($element)) {
			$element = $element['ID'];
		}
		
		if ($site === RhdHandler::getPurchasesSiteCode()) {
			$site = RhdHandler::getMainSiteCode();
			$path = RhdHandler::getPurchasesSiteCode().'/'.$path;
		}
		
		return ($path ? '/'.$path : '').($element ? '/'.$element.'.html' : ($noTrailingSlash ? '' : '/'));
	}

}