<?php
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';

CModule::IncludeModule('iblock');

$filter = array('IBLOCK_ID' => 136, 'IBLOCK_TYPE' => 'content');
if (!empty($_REQUEST['after'])) {
    $filter['>DATE_ACTIVE_FROM'] = $_REQUEST['after'];
}

$rsItems = CIBlockElement::GetList(array('ACTIVE_FROM' => 'ASC'), $filter);

$items = array();
while ($arItem = $rsItems->GetNext()) {
    $items[] = array('date' => $arItem['ACTIVE_FROM'], 'text' => $arItem['PREVIEW_TEXT']);
}

header('Content-Type: application/json');
echo json_encode($items);
