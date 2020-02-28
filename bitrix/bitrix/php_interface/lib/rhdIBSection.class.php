<?php

class RhdIBSection {

	protected $iblockId = null;
	protected $arFields = array();
	protected $properties = array();
	protected $fieldToId = array();
	protected $enumToId = array();
	
	/**
	 * @param array $arFields
	 * @return RhdIBSection
	 */
	public static function create(&$arFields) {
		return new self($arFields);
	}
	
	protected function __construct(&$arFields) {
		$this->arFields =& $arFields;
		$this->
			preloadIBlock()->
			preloadProperties();
	}
	
	protected function preloadIBlock() {
		if (isset($this->arFields['IBLOCK_ID'])) {
			$this->iblockId = $this->arFields['IBLOCK_ID'];
		}
		else {
			$section = CIBlockSection::GetByID($this->arFields['ID'] ?: $this->arFields['IBLOCK_SECTION_ID'])->Fetch();
			$this->iblockId = $section['IBLOCK_ID'];
		}
		
		return $this;
	}
	
	protected function preloadProperties() {	
		$rs = 
			CUserTypeEntity::GetList(
				array(), 
				array(
					'ENTITY_ID' => 'IBLOCK_'.$this->iblockId.'_SECTION',
				)
			);
			
		$enumIds = array();
		while ($prop = $rs->Fetch()) {
			$this->properties[$prop['ID']] = $prop;
			$this->fieldToId[$prop['FIELD_NAME']] = $prop['ID'];
			
			if ($prop['USER_TYPE_ID'] === 'enumeration') {
				$enumIds[] = $prop['ID'];
			}
		}

		foreach ($enumIds as $enumId) {
			$field = $this->properties[$enumId]['FIELD_NAME'];

			$rs =
				CUserTypeEnum::getList(
					array(),
					array(
						'USER_FIELD_ID' => $enumId,
					)
				);
				
			$this->properties[$enumId]['VALUES'] = array();
			while ($enum = $rs->Fetch()) {
				if ($enum['USER_FIELD_ID'] !== $enumId)
					continue;
				
				$this->properties[$enumId]['VALUES'][$enum['ID']] = $enum['XML_ID'];
				$this->enumToId[$enum['XML_ID']] = $enum['ID'];
			}
		}
		
		return $this;
	}
	
	public function getIBlockId() {
		return $this->iblockId;
	}
	
	public function getPropertyValue($field) {
		$propId = $this->fieldToId[$field];
		$value = $this->arFields[$field];

		if ($this->properties[$propId]['USER_TYPE_ID'] !== 'enumeration' || !$value) {
			return $value;
		}
		else {
			return $this->properties[$propId]['VALUES'][$value];
		}
	}
	
	public function setPropertyValue($field, $value) {
		$propId = $this->fieldToId[$field];
		
		if ($this->properties[$propId]['USER_TYPE_ID'] === 'enumeration') {
			$value = $this->enumToId[$value];
		}
		
		$this->arFields[$field] = $value;
		
		return $this;
	}
	
	public function dropPropertyValue($field) {
		$this->arFields[$field] = '';
		return $this;
	}
}