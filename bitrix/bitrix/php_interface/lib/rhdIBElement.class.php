<?php

class RhdIBElement {

	protected $iblockId = null;
	protected $arFields = array();
	protected $properties = array();
	protected $codeToId = array();
	protected $enumToId = array();
	
	/**
	 * @param array $arFields
	 * @return RhdIBElement
	 */
	public static function create(&$arFields) {
		return new self($arFields);
	}
	
	protected function __construct(&$arFields) {
		$this->iblockId = $arFields['IBLOCK_ID'];
		$this->arFields =& $arFields;
		
		$this->preloadProperties();
	}
	
	protected function preloadProperties() {	
		$codes = array();
		
		$rs = 
			CIBlockProperty::GetList(
				array(), 
				array(
					'ACTIVE' => 'Y', 
					'IBLOCK_ID' => $this->iblockId
				)
			);
		
		while ($prop = $rs->Fetch()) {
			$this->properties[$prop['ID']] = $prop;
			$this->codeToId[$prop['CODE']] = $prop['ID'];
			
			if ($prop['PROPERTY_TYPE'] === 'L') {
				$codes[] = $prop['CODE'];
			}
		}
		
		
		$rs = 
			CIBlockPropertyEnum::GetList(
				array(), 
				array(
					'IBLOCK_ID' => (string) $this->iblockId, 
					'PROPERTY_ID' => $codes
				)
			);
			
		while ($enum = $rs->GetNext()) {
			if (!isset($this->properties[$enum['PROPERTY_ID']]['VALUES'])) {
				$this->properties[$enum['PROPERTY_ID']]['VALUES'] = array();
			}
			$this->properties[$enum['PROPERTY_ID']]['VALUES'][$enum['ID']] = $enum['XML_ID'];
			$this->enumToId[$enum['XML_ID']] = $enum['ID'];
		}
		
		return $this;
	}
	
	public function getPropertyValue($code) {
		$id = $this->codeToId[$code];
		
		if (!isset($this->arFields['PROPERTY_VALUES'][$id])) {
			return null;
		}
		
		$prop = $this->properties[$id];
		$value = $this->arFields['PROPERTY_VALUES'][$id];
		
		if (isset($value['n0'])) {
			return $value['n0']['VALUE'];
		}
		
		if ($value && $prop['PROPERTY_TYPE'] === 'L') {
			$convertedValue = 0;
			
			if ($prop['MULTIPLE'] === 'Y') {
				$convertedValue = array();
				foreach ($value as $k => $v) {
					if ($this->properties[$id]['VALUES'][$v['VALUE']]) {
						$convertedValue[] = $this->properties[$id]['VALUES'][$v['VALUE']];
					}
				}
			}
			else {
				$value = array_shift($value);
				$convertedValue = $this->properties[$id]['VALUES'][$value['VALUE']];
			}
			
			$value = $convertedValue ?: 0;
		}
		
		return $value;
	}
	
	public function dropPropertyValue($code) {
		$id = $this->codeToId[$code];
		unset($this->arFields['PROPERTY_VALUES'][$id]);
		
		return $this;
	}
	
	public function setPropertyValue($code, $value) {
		$id = $this->codeToId[$code];
		
		if ($value && $this->properties[$id]['PROPERTY_TYPE'] === 'L') {
			if (!is_array($value)) {
				$value = array($value);
			}
			if (!isset($this->arFields['PROPERTY_VALUES'])) {
				$this->arFields['PROPERTY_VALUES'] = array();
			}
			$this->arFields['PROPERTY_VALUES'][$id] = array();
			foreach ($value as $v) {
				$this->arFields['PROPERTY_VALUES'][$id][] = array('VALUE' => $this->enumToId[$v]);
			}
		}
		else {
			$this->arFields['PROPERTY_VALUES'][$id] = $value;
		}
		
		return $this;
	}

}