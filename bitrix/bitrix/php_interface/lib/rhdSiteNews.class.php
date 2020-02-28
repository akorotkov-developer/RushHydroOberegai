<?php
class RhdSiteNews {
	
	protected static $iblock = null;
	
	protected static function preloadIBlock() {
		if (self::$iblock) return;
		
		self::$iblock = CIBlock::GetList(array(), array('CODE' => 'sitenews', 'TYPE' => 'content'))->GetNext();
	}

	public static function add($icon, $icontext, $link, $linktext, $site = null) {
		self::preloadIBlock();
		
		$icon = str_replace(array('element_', 'section_'), array('', ''), $icon);
		//die($icon);
		$elem = array(
			'IBLOCK_ID' => self::$iblock['ID'],
			'NAME' => $icontext.': '.$linktext,
			'PROPERTY_VALUES' => array()
		);
		
		RhdIBElement::create($elem)->
			setPropertyValue('icon', $icon)->
			setPropertyValue('icontext', $icontext)->
			setPropertyValue('link', $link)->
			setPropertyValue('linktext', $linktext)->
			setPropertyValue('site', $site);
			
		$ibElement = new CIBlockElement;	
		
		$ibElement->Add($elem);
	}
	
}